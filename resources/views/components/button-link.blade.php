<a {{ $attributes }}>
    <x-button size="sm">
        {{ $slot }}
    </x-button>
</a>

@isset($right)
    {{ $right }}
@endisset
