<?php

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Post;
use Flux\Flux;

new class extends Component
{

    public ?Post $post = null;

    public string $title   = '';
    public string $body = '';
    public string $theme  = '';
    public bool   $is_published = false;

    #[On('onPostEditClick')]
    public function openEdit(int|string $postId): void
    {
        $this->post = Post::findOrFail($postId);

        $this->fill($this->post->only('title', 'body', 'theme', 'is_published'));

        $this->resetValidation();

        Flux::modal('edit-post')->show();
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'body' => ['required', 'string', 'min:10'],
            'theme' => ['required', 'string', 'in:' . implode(',', Post::THEMES)],
            'is_published' => ['boolean'],
        ];
    }

    public function save(): void
    {
        $validated = $this->validate();

        $this->post->update($validated);

        $this->dispatch('post-updated');
        Flux::modal('edit-post')->close();
    }
};
?>

<flux:modal name="edit-post" class="w-full max-w-lg">

    @if ($post)
    <form class="space-y-6" wire:submit="save">

        <div>
            <flux:heading size="lg">Edit Post</flux:heading>
        </div>

        <flux:input
            wire:model="title"
            label="Title"
            placeholder="Something new"
            :invalid="$errors->has('title')"
            :description="$errors->first('title')" />

        <flux:field>
            <flux:label>Theme</flux:label>
            <flux:radio.group wire:model="theme" variant="segmented">
                @foreach ([
                Post::THEME_NATURE => ['sun', 'Nature'],
                Post::THEME_POETRY => ['paint-brush', 'Poetry'],
                Post::THEME_SCIENCE => ['light-bulb', 'Science'],
                ] as $value => [$icon, $label])
                <flux:radio :value="$value" :label="$label" :icon="$icon" />
                @endforeach
            </flux:radio.group>
            @error('theme') <flux:error>{{ $message }}</flux:error> @enderror
        </flux:field>

        <flux:field>
            <flux:label>Body</flux:label>
            <flux:textarea
                wire:model="body"
                placeholder="Write something..."
                rows="6"
                :invalid="$errors->has('body')" />
            @error('body') <flux:error>{{ $message }}</flux:error> @enderror
        </flux:field>

        <flux:field variant="inline">
            <flux:label>Publish</flux:label>
            <flux:switch wire:model="is_published" />
        </flux:field>

        <div class="flex gap-2">
            <flux:modal.close>
                <flux:button variant="ghost">Cancel</flux:button>
            </flux:modal.close>
            <flux:button type="submit" variant="primary">
                Update
            </flux:button>
        </div>

    </form>
    @endif

</flux:modal>