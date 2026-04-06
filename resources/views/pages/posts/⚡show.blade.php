<?php

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\{Computed, Layout, Title};

new #[Layout('layouts.guest')]
#[Title('Post')]
class extends Component
{
    public $postId;

    #[Computed]
    public function post()
    {
        $post = Post::find($this->postId);
        if (! $post->is_published && Auth::id() !== $post->user_id) {
            abort(404);
        }
        return $post;
    }

    public function mount($id): void
    {
        $this->postId = $id;
    }
};
?>

<div class="w-full mx-auto py-10 space-y-6">

    <div class="flex items-center justify-between">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('home') }}" wire:navigate>Home</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>{{ $this->post->title }}</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <div class="flex items-center gap-2">
            @if (!$this->post->is_published)
            <flux:badge color="zinc" size="sm">Draft</flux:badge>
            @else
            <flux:badge color="green" size="sm">Published</flux:badge>
            @endif
        </div>
    </div>

    <flux:separator />

    <div class="space-y-2">
        <div class="flex items-center gap-2">
            <flux:badge size="sm">{{ ucfirst($this->post->theme) }}</flux:badge>
            <flux:text class="text-xs text-zinc-400">{{ $this->post->created_at->diffForHumans() }}</flux:text>
        </div>
        <flux:heading size="xl">{{ $this->post->title }}</flux:heading>
    </div>

    <flux:text class="leading-relaxed whitespace-pre-wrap">{{ $this->post->body }}</flux:text>

</div>
