@props(['value'])

<label {{ $attributes->merge(['class' => 'form-labe']) }}>
    {{ $value ?? $slot }}
</label>
