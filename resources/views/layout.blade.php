<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Infrastruktur Riset')</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <style>
        .sidebar {
            width: 220px;
            background: #2c3e50;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding: 32px 0 0 0;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 12px rgba(44,62,80,0.07);
            z-index: 10;
        }
        .sidebar .brand {
            color: #fff;
            font-size: 1.35rem;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 36px;
            text-align: center;
        }
        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 18px;
            padding: 0 0 0 0;
        }
        .sidebar-nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            opacity: 0.92;
            padding: 12px 32px;
            border-left: 4px solid transparent;
            transition: background 0.2s, border-color 0.2s, opacity 0.2s;
        }
        .sidebar-nav a.active, .sidebar-nav a:hover {
            background: #22313a;
            border-left: 4px solid #27ae60;
            opacity: 1;
        }
        .main-content {
            margin-left: 220px;
            padding: 40px 30px 30px 30px;
            min-height: 100vh;
            background: #f8f9fa;
        }
        @media (max-width: 900px) {
            .sidebar { width: 60px; padding: 18px 0 0 0; }
            .sidebar .brand { font-size: 1rem; margin-bottom: 18px; }
            .sidebar-nav a { font-size: 0.85rem; padding: 10px 10px; }
            .main-content { margin-left: 60px; padding: 25px 10px 10px 10px; }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="brand">Infrastruktur Riset</div>
        <nav class="sidebar-nav">
            <a href="{{ route('dashboard.index') }}" class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('infrastruktur.index') }}" class="{{ request()->routeIs('infrastruktur.*') ? 'active' : '' }}">Infrastruktur</a>
            <a href="{{ route('sdm.index') }}" class="{{ request()->routeIs('sdm.*') ? 'active' : '' }}">SDM</a>
        </nav>
    </div>
    <div class="main-content">
        @yield('content')
    </div>
</body>
</html>
