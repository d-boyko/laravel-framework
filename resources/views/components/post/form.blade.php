@props(['post' => null])

<x-form {{ $attributes }}>
    <x-form-item>
        <x-label required>{{ __('Name of the posts') }}</x-label>
        <x-input name="title" value="{{ $post->title ?? '' }}" autofocus></x-input>
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __('Post content') }}</x-label>
        <x-trix name="content" value="{{ $post->content ?? '' }}"></x-trix>
    </x-form-item>

    {{ $slot }}
</x-form>
