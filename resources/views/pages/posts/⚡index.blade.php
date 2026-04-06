<?php

use Livewire\Component;
use Livewire\Attributes\{Layout, Title, Url};
use App\Models\Post;

new #[Layout('layouts.guest')]
#[Title('Posts')]
class extends Component
{
    #[Url(as: 'q', history: true)]
    public string $search = '';

    #[Url(as: 'theme', history: true)]
    public string $theme = 'all';

    #[Url(as: 'sort')]
    public string $sort = 'latest';

    public int   $perPage = 30;
    public int   $page    = 0;
    public array $posts   = [];
    public bool  $hasMore = true;
    public int   $total   = 0;

    public function mount(): void
    {
        $this->loadMore();
    }

    public function updatedSearch()
    {
        $this->resetFilters();
    }
    public function updatedTheme()
    {
        $this->resetFilters();
    }
    public function updatedSort()
    {
        $this->resetFilters();
    }

    public function clearFilters(): void
    {
        $this->search = '';
        $this->theme  = 'all';
        $this->sort   = 'latest';
        $this->resetFilters();
    }

    public function loadMore(): void
    {
        $this->page++;

        $paginator = Post::query()
            ->where('is_published', true)
            ->when($this->search, fn($q) => $q->where('title', 'like', '%' . $this->search . '%'))
            ->when($this->theme !== 'all', fn($q) => $q->where('theme', $this->theme))
            ->when($this->sort === 'oldest', fn($q) => $q->oldest(), fn($q) => $q->latest())
            ->paginate($this->perPage, page: $this->page);

        $this->total   = $paginator->total();
        $this->hasMore = $paginator->hasMorePages();

        $this->posts = array_merge(
            $this->posts,
            $paginator->items()
        );
    }

    private function resetFilters(): void
    {
        $this->reset([
            'page',
            'posts',
            'hasMore',
        ]);

        $this->page = 0;
        $this->hasMore = true;

        // IMPORTANT: small delay-like behavior
        $this->dispatch('$refresh');

        $this->loadMore();
    }
}
?>

<div class="size-full">
    <div class="w-full mb-6 space-y-4">
        <div class="relative w-full">
            <flux:input
                class="w-full"
                icon="magnifying-glass"
                placeholder="Search posts"
                wire:model.live.debounce.400ms="search"
                type="search" />
        </div>

        <div class="flex flex-wrap items-center justify-between gap-3">
            <flux:radio.group wire:model.live="theme" variant="segmented">
                @foreach ([
                'all' => ['list-bullet', 'All'],
                'nature' => ['sun', 'Nature'],
                'poetry' => ['paint-brush', 'Poetry'],
                'science' => ['light-bulb', 'Science'],
                ] as $v => [$icon, $label])
                <flux:radio :value="$v" :label="$label" :icon="$icon" />
                @endforeach
            </flux:radio.group>

            <div class="inline-flex items-center gap-2">
                <flux:radio.group wire:model.live="sort" variant="segmented">
                    <flux:radio value="latest" label="Latest" icon="arrow-up" />
                    <flux:radio value="oldest" label="Oldest" icon="arrow-down" />
                </flux:radio.group>
                <flux:button wire:click="clearFilters" variant="danger">Clear filters</flux:button>
            </div>
        </div>
    </div>

    <div class="w-full mb-8">
        <flux:text class="mt-2">{{ number_format($total) }} posts</flux:text>
    </div>
    <div class="w-full grid grid-cols-3 gap-4 m-4">
        @forelse ($posts as $post)
        <livewire:posts.post-card :key="$post->id" :post="$post" />
        @empty
        <div class="col-span-3 text-center py-12">
            <flux:text>No posts found.</flux:text>
        </div>
        @endforelse

        @if ($hasMore)
        <div
            class="col-span-3 flex justify-center items-center p-4"
            wire:intersect="loadMore">
            <flux:icon.loading />
        </div>
        @endif
    </div>
    <livewire:posts.edit />
</div>