@props(['required' => false])

{{--{{ $required ? '1': '0' }}--}}

<label {{ $attributes->class([
    'mb-1', ($required ? 'required' : ''),
]) }}>
    {{ $slot }}
</label>
