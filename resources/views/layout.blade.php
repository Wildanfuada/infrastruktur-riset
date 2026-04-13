<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/svg+xml/png">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    @vite(['resources/css/app.css', 'resources/js/app.js']) 
</head>
<body>
    <div x-data="{ open: false }" 
         @keydown.escape="open = false"
         class="w-full" 
         :style="open && 'overflow: hidden'">
        <nav class="navbar">
            <div class="navbar-brand">GIS RISET JATENG</div>
            <div class="navbar-nav">
                <a href="{{ route('beranda.index') }}" class="{{ request()->routeIs('beranda.index') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('infrastruktur.map') }}" class="{{ request()->routeIs('infrastruktur.map') ? 'active' : '' }}">Infrastruktur</a>
                <a href="{{ route('sdm.map') }}" class="{{ request()->routeIs('sdm.map') ? 'active' : '' }}">SDM</a>
                
                @auth
                <a href="{{ route('infrastruktur.index') }}" class="{{ request()->routeIs('infrastruktur.*') ? 'active' : '' }}">Data Infrastruktur</a>
                <a href="{{ route('sdm.index') }}" class="{{ request()->routeIs('sdm.*') ? 'active' : '' }}">Data SDM</a>

                <div class="navbar-user">
                    <div class="user-dropdown" @click="open = !open">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <div class="dropdown-menu" x-show="open" @click.away="open = false">
                            <a href="{{ route('profile.edit') }}">Profil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endauth
            </div>

            <button class="navbar-toggle" @click="open = !open">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            @guest
            <div class="navbar-nav-guest">
                <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
            </div>
            @endguest
        </nav>

        <!-- Mobile Menu Backdrop -->
        <div class="navbar-backdrop" x-show="open" @click.self="open = false" style="display: none;"></div>

        <!-- Mobile Menu -->
        <div class="navbar-mobile" x-show="open" style="display: none;">
            <div class="mobile-nav-header">
                <button class="mobile-close" @click="open = false" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="mobile-nav-content">
                <a href="{{ route('beranda.index') }}" class="mobile-link {{ request()->routeIs('beranda.index') ? 'active' : '' }}" @click="open = false">Beranda</a>
                <a href="{{ route('infrastruktur.map') }}" class="mobile-link {{ request()->routeIs('infrastruktur.map') ? 'active' : '' }}" @click="open = false">Infrastruktur</a>
                <a href="{{ route('sdm.map') }}" class="mobile-link {{ request()->routeIs('sdm.map') ? 'active' : '' }}" @click="open = false">SDM</a>

                @auth
                <div class="mobile-divider"></div>
                <a href="{{ route('infrastruktur.index') }}" class="mobile-link {{ request()->routeIs('infrastruktur.*') ? 'active' : '' }}" @click="open = false">Data Infrastruktur</a>
                <a href="{{ route('sdm.index') }}" class="mobile-link {{ request()->routeIs('sdm.*') ? 'active' : '' }}" @click="open = false">Data SDM</a>

                <div class="mobile-divider"></div>
                <div class="mobile-user-section">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-email">{{ Auth::user()->email }}</div>
                </div>
                <a href="{{ route('profile.edit') }}" class="mobile-link" @click="open = false">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mobile-link logout-btn" @click="open = false">Logout</button>
                </form>
                @endauth

                @guest
                <div class="mobile-divider"></div>
                <a href="{{ route('login') }}" class="mobile-link" @click="open = false">Login</a>
                @endguest
            </div>
        </div>
        <div>
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/modal-detail.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @stack('scripts')
</body>
</html>
