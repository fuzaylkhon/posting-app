<?php

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\{Computed, On};
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function posts()
    {
        return Auth::user()->posts()->latest()->get();
    }

    #[Computed]
    public function totalUserPosts()
    {
        return Auth::user()->posts()->latest()->get()->count();
    }

    #[On('post-created')]
    #[On('post-updated')]
    public function refreshPosts()
    {
        unset($this->posts, $this->totalUserPosts);
    }
};
?>

@placeholder
<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="w-full flex items-center justify-between">
        <flux:text class="text-2xl">Your Posts</flux:text>
        <flux:modal.trigger name="create-post">
            <flux:button variant="primary">Create</flux:button>
        </flux:modal.trigger>
    </div>
    @for ($i=0;$i<10;$i++)
        <flux:skeleton.group animate="shimmer">
        <flux:skeleton.line class="mb-2 w-1/4" />
        <flux:skeleton.line />
        <flux:skeleton.line />
        <flux:skeleton.line class="w-3/4" />
        </flux:skeleton.group>
        @endfor
</div>
@endplaceholder

<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="w-full flex items-center justify-between">
        <flux:text class="text-2xl">Your Posts</flux:text>
        <flux:modal.trigger name="create-post">
            <flux:button variant="primary" href="" wire:link>Create</flux:button>
        </flux:modal.trigger>
    </div>
    <div class="w-full mb-2">
        <flux:text class="mt-2">{{ number_format($this->totalUserPosts) }} posts</flux:text>
    </div>
    <div class="grid grid-cols-3 gap-4">
        @forelse ($this->posts as $post)
        <livewire:posts.post-card :key="$post->id . '+' . $post->updated_at" :post="$post" />
        @empty
        <flux:text class="text-center py-12 text-zinc-400">
            No posts here yet.
            Create your first one!
        </flux:text>
        @endforelse
    </div>
    <livewire:posts.create />
    <livewire:posts.edit />
</div>
