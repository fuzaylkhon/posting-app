<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    #[Computed]
    public function isPostByUser()
    {
        return Auth::id() === $this->post->user_id;
    }

    public function onEditClick(): void
    {
        $this->dispatch('onPostEditClick', postId: $this->post->id);
    }
};
?>


<flux:card size="sm" class="size-full flex flex-col justify-between items-start gap-2 hover:bg-zinc-50 dark:hover:bg-zinc-700">
    <flux:heading class="flex items-center gap-2">
        {{ $post->title }}
    </flux:heading>
    <flux:text class="mt-2">{{ $post->excerpt }}</flux:text>
    <div class="flex justify-between w-full items-center">
        @if($this->isPostByUser)
        <flux:button wire:click="onEditClick" variant="primary" color="blue">
            Edit
        </flux:button>
        @endif
        <flux:button
            href="/posts/{{ $post->id }}"
            icon:trailing="arrow-up-right" wire:navigate>
            View More
        </flux:button>
    </div>
</flux:card>
