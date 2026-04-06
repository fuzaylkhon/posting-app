<?php

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

new class extends Component
{
    public string $title = '';
    public string $body = '';
    public string $theme = Post::THEME_NATURE;
    public bool   $is_published = false;

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'body' => ['required', 'string', 'min:10'],
            'theme'  => ['required', 'string', 'in:' . implode(',', Post::THEMES)],
            'is_published' => ['boolean'],
        ];
    }

    public function save(): void
    {
        $validated = $this->validate();

        Auth::user()->posts()->create($validated);

        $this->reset('title', 'body', 'theme', 'is_published');

        $this->dispatch('post-created');
        $this->dispatch('close-modal', name: 'create-post');
    }
};
?>

<flux:modal name="create-post" class="w-full max-w-lg">
    <form class="space-y-6" wire:submit.prevent="save">

        <div>
            <flux:heading size="lg">Create new Post</flux:heading>
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
            @error('theme')
            <flux:error>{{ $message }}</flux:error>
            @enderror
        </flux:field>

        <flux:field>
            <flux:label>Body</flux:label>
            <flux:textarea
                wire:model="body"
                placeholder="Write something..."
                rows="6"
                :invalid="$errors->has('body')" />
            @error('body')
            <flux:error>{{ $message }}</flux:error>
            @enderror
        </flux:field>

        <flux:field variant="inline">
            <flux:label>Publish</flux:label>
            <flux:switch wire:model="is_published" />
        </flux:field>

        <div class="flex gap-2">
            <flux:modal.close>
                <flux:button variant="ghost">Cancel</flux:button>
            </flux:modal.close>
            <flux:button
                type="submit"
                variant="primary">
                Save
            </flux:button>
        </div>
    </form>
</flux:modal>