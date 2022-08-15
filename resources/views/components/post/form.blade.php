@props(['post' => null])

{{ session('message') }}

<x-form {{ $attributes }}>
    <x-form-item>
        <x-label required>{{ __('Name of the posts') }}</x-label>
        <x-input name="title" autofocus></x-input>
        <x-error name="title"></x-error>
{{--        @if($errors->has('title'))--}}
{{--            <div class="small text-danger pt-1">--}}
{{--                {{ $errors->first('title') }}--}}
{{--            </div>--}}
{{--        @endif--}}
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __('Post content') }}</x-label>
        <x-trix name="content"></x-trix>
        <x-error name="content"></x-error>
    </x-form-item>

    {{ $slot }}
</x-form>
