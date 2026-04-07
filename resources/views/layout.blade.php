<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/svg+xml/png">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">GIS RISET JATENG</div>
        <div class="navbar-nav">
            <a href="{{ route('beranda.index') }}" class="{{ request()->routeIs('beranda.index') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('infrastruktur.map') }}" class="{{ request()->routeIs('infrastruktur.map') ? 'active' : '' }}">Lokasi infrastruktur</a>
            <a href="{{ route('sdm.map') }}" class="{{ request()->routeIs('sdm.map') ? 'active' : '' }}">Lokasi SDM</a>
            <a href="{{ route('infrastruktur.index') }}" class="{{ request()->routeIs('infrastruktur.*') ? 'active' : '' }}">Infrastruktur</a>
            <a href="{{ route('sdm.index') }}" class="{{ request()->routeIs('sdm.*') ? 'active' : '' }}">SDM</a>
        </div>
    </nav>
    <div>
        @yield('content')
    </div>
    <script src="{{ asset('js/modal-detail.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @stack('scripts')
</body>
</html>
