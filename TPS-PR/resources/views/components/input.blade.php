@props([
    'disabled' => false,
    'icon' => 'ti ti-mail',
    'type' => 'text',
    'name' => '',
    'placeholder' => '',
    'value' => '',
    'required' => false,
    'autocomplete' => '',
])

<div class="position-relative mb-3">
    @if($type != 'password' && $icon)
        <span class="position-absolute top-50 start-0 translate-middle-y ps-3">
            <i class="{{ $icon }}"></i>
        </span>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        {{ $autocomplete ? 'autocomplete='.$autocomplete : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->merge(['class' => 'form-control ' . ($icon && $type != 'password' ? 'ps-5 ' : '') . ($errors->has($name) ? 'is-invalid' : '')]) }}
    >

    @if($type === 'password')
        <span class="toggle-password position-absolute top-50 end-0 translate-middle-y pe-3" style="cursor:pointer;">
            <i class="ti ti-eye-off"></i>
        </span>
    @endif

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<!-- End of Input Field Component -->