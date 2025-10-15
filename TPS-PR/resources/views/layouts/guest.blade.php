<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('adminAssets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('adminAssets/css/bootstrap.min.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('adminAssets/plugins/icons/feather/feather.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Select2 CSS (optional) -->
    <link rel="stylesheet" href="{{ asset('adminAssets/plugins/select2/css/select2.min.css')}}">

    <!-- Animation & Extras (optional) -->
    <link rel="stylesheet" href="{{ asset('MainAssets/plugins/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('MainAssets/plugins/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('MainAssets/plugins/venobox/venobox.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('adminAssets/css/style.css')}}">

    <!-- Vite for Laravel -->
    @vite(['resources/js/app.js'])

    @livewireStyles
</head>
<body class="account-page">
    <div class="main-wrapper">
        {{ $slot }}
    </div>

    @livewireScripts


	<!-- jQuery -->
	<script src="https://preskool.dreamstechnologies.com/html/template/assets/js/jquery-3.7.1.min.js" type="5ca06f06e343dd8e19b209a1-text/javascript"></script>

	<!-- Bootstrap Core JS -->
	<script src="https://preskool.dreamstechnologies.com/html/template/assets/js/bootstrap.bundle.min.js" type="5ca06f06e343dd8e19b209a1-text/javascript"></script>

	<!-- Feather Icon JS -->
	<script src="https://preskool.dreamstechnologies.com/html/template/assets/js/feather.min.js" type="5ca06f06e343dd8e19b209a1-text/javascript"></script>

	<!-- Slimscroll JS -->
	<script src="https://preskool.dreamstechnologies.com/html/template/assets/js/jquery.slimscroll.min.js" type="5ca06f06e343dd8e19b209a1-text/javascript"></script>

	<!-- Select2 JS -->
	<script src="https://preskool.dreamstechnologies.com/html/template/assets/plugins/select2/js/select2.min.js" type="5ca06f06e343dd8e19b209a1-text/javascript"></script>

	<!-- Custom JS -->
	<script src="https://preskool.dreamstechnologies.com/html/template/assets/js/script.js" type="5ca06f06e343dd8e19b209a1-text/javascript"></script>

    <script src="https://preskool.dreamstechnologies.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="5ca06f06e343dd8e19b209a1-|49" defer></script>

    @stack('scripts')
</body>
</html>
