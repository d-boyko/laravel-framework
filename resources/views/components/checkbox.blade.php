@php($id = \Illuminate\Support\Str::uuid())


<div class="mb-3">
    <div class="form-check">
        <input class="form-check-input" {{ $attributes->merge([
    "value" => 1,
]) }} name="Remember" id="{{ $id }}">
        <label class="form-check-label" for="{{ $id }}">
            {{ $slot }}
        </label>
    </div>
</div>
