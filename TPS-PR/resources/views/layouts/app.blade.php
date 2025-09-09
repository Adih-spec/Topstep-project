<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title', config('app.name'))</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { background: #f5f6fa; }
        .sidebar { min-height: 100vh; background: #2c3e50; color: #fff; }
        .sidebar h4 { color: #ecf0f1; }
        .sidebar a { 
            color: #ecf0f1; 
            display: block; 
            padding: 10px; 
            text-decoration: none; 
            border-radius: 5px;
            margin-bottom: 5px;
        }
        .sidebar a:hover, 
        .sidebar a.active { background: #34495e; }
        .content { padding: 20px; flex: 1; }
    </style>

    {{-- Page-specific styles --}}
    @stack('styles')
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h4 class="mb-4">{{ config('app.name') }}</h4>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('roles.index') }}" class="{{ request()->routeIs('roles.*') ? 'active' : '' }}">Manage Roles</a>
            <a href="{{ route('permissions.index') }}" class="{{ request()->routeIs('permissions.*') ? 'active' : '' }}">Manage Permissions</a>
        </div>

        <!-- Main Content -->
        <div class="content">
            {{-- Works with both @extends and x-app-layout --}}
            @yield('content')
            {{ $slot ?? '' }}
        </div>
    </div>

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
    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Page-specific scripts --}}
    @stack('scripts')
</body>
</html>
