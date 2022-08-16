<input type="hidden" {{ $attributes }} id="{{ $name }}">

<trix-editor input="{{ $name }}"></trix-editor>

@once
    @push('js')
        <script src="/js/trix.js"></script>
    @endpush

    @push('css')
        <link rel="stylesheet" href="/css/trix.css">
    @endpush
@endonce
