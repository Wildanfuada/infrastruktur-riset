<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('logo.svg') }}" type="image/svg+xml">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Infrastruktur Riset</div>
        <div class="navbar-nav">
            <a href="{{ route('dashboard.index') }}" class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('infrastruktur.index') }}" class="{{ request()->routeIs('infrastruktur.*') ? 'active' : '' }}">Infrastruktur</a>
            <a href="{{ route('sdm.index') }}" class="{{ request()->routeIs('sdm.*') ? 'active' : '' }}">SDM</a>
        </div>
    </nav>
    <div class="main-content">
        @yield('content')
    </div>
</body>
</html>
