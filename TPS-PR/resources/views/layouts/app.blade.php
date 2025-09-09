<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="py-6 px-4 sm:px-6 lg:px-8">
                @yield('content')
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <!-- Bootstrap Bundle with Popper (needed for modals, dropdowns, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".country-select").forEach(countrySelect => {
        let stateSelect = countrySelect.closest(".row").querySelector(".state-select");
        let citySelect = countrySelect.closest(".row").querySelector(".city-select");

        let selectedCountry = countrySelect.dataset.selected || "";
        let selectedState   = stateSelect.dataset.selected || "";
        let selectedCity    = citySelect.dataset.selected || "";

        // === Load Countries ===
        fetch("https://countriesnow.space/api/v0.1/countries/positions")
            .then(res => res.json())
            .then(data => {
                data.data.forEach(c => {
                    let option = document.createElement("option");
                    option.value = c.name;
                    option.textContent = c.name;
                    if (c.name === selectedCountry) option.selected = true;
                    countrySelect.appendChild(option);
                });

                if (selectedCountry) loadStates(selectedCountry, stateSelect, selectedState, citySelect, selectedCity);
            });

        // === Load States on Country change ===
        countrySelect.addEventListener("change", function () {
            loadStates(this.value, stateSelect, "", citySelect, "");
        });

        // === Load Cities on State change ===
        stateSelect.addEventListener("change", function () {
            loadCities(countrySelect.value, this.value, citySelect, "");
        });
    });

    // === Function: Load States ===
    function loadStates(country, stateSelect, selectedState, citySelect, selectedCity) {
        stateSelect.innerHTML = '<option value="">-- Select State --</option>';
        citySelect.innerHTML = '<option value="">-- Select City --</option>';

        fetch("https://countriesnow.space/api/v0.1/countries/states", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ country })
        })
        .then(res => res.json())
        .then(data => {
            if (data.data && data.data.states) {
                data.data.states.forEach(s => {
                    let option = document.createElement("option");
                    option.value = s.name;
                    option.textContent = s.name;
                    if (s.name === selectedState) option.selected = true;
                    stateSelect.appendChild(option);
                });

                if (selectedState) loadCities(country, selectedState, citySelect, selectedCity);
            }
        });
    }

    // === Function: Load Cities ===
    function loadCities(country, state, citySelect, selectedCity) {
        citySelect.innerHTML = '<option value="">-- Select City --</option>';

        fetch("https://countriesnow.space/api/v0.1/countries/state/cities", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ country, state })
        })
        .then(res => res.json())
        .then(data => {
            if (data.data) {
                data.data.forEach(city => {
                    let option = document.createElement("option");
                    option.value = city;
                    option.textContent = city;
                    if (city === selectedCity) option.selected = true;
                    citySelect.appendChild(option);
                });
            }
        });
    }
});
</script>
</body>
</html>
