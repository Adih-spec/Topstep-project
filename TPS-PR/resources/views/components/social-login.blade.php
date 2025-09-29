@props(['provider'])

@php
    $providers = [
        'facebook' => ['btn' => 'btn-primary', 'icon' => 'facebook-logo.svg'],
        'google'   => ['btn' => 'btn-outline-danger', 'icon' => 'google-logo.svg'],
        'apple'    => ['btn' => 'btn-dark', 'icon' => 'apple-logo.svg'],
    ];
@endphp

<a href="#" class="btn {{ $providers[$provider]['btn'] }} d-flex align-items-center justify-content-center">
    <img src="https://preskool.dreamstechnologies.com/html/template/assets/img/icons/{{ $providers[$provider]['icon'] }}"
         alt="{{ ucfirst($provider) }}" class="me-2" style="height:20px;">
    {{ ucfirst($provider) }}
</a>
