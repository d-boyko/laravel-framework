@props(['post' => null])

<x-form action="{{ $attributes }}" method="POST">
    <x-form-item>
        <x-label required>
            {{ __('Name of the post') }}
            <x-input name="title" value="{{ $post->title ?? '' }}" autofocus></x-input>
        </x-label>
    </x-form-item>

    <x-form-item>
        <x-label required>
            {{ __('Content') }}
            <x-trix name="content" value="{{ $post->content ?? '' }}"></x-trix>
        </x-label>
    </x-form-item>

    <x-button type="submit">
        {{ $slot }}
    </x-button>
</x-form>
