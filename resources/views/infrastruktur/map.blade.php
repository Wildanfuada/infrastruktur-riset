@extends('layout')
@section('title', 'Infrastruktur Riset')
@section('content')

<div class="main-content">
    
    <button class="mobile-toggle-btn" onclick="toggleSidebar()">
        ☰
    </button>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

    <div class="map-container">
        <div id="map"></div>
    </div>

    <div class="sidebar-fixed" id="sidebar">
        
        <div class="sidebar-header" style="display: none;">
            <h3>Daftar Lokasi</h3>
            <button class="close-btn" onclick="closeSidebar()">✕</button>
        </div>

        <div class="search-container">
            <input
                type="text"
                id="searchInput"
                class="search-input"
                placeholder="Cari lokasi infrastruktur..."
                onkeyup="filterLocations()"
            >
        </div>

        <div class="location-list-container">
            <h3 class="location-list-title">Daftar Laboratorium</h3>
            
            @if($infrastruktur->count())
                <div id="locationsList">
                    @foreach($infrastruktur as $item)
                        <div
                            class="location-item"
                            data-name="{{ strtolower($item->nama_laboratorium ?? '') }}"
                            onclick="panToLocation({{ $item->latitude ?? 0 }}, {{ $item->longitude ?? 0 }}, '{{ addslashes($item->nama_laboratorium ?? '') }}')"
                        >
                            <div class="location-name">{{ $item->nama_laboratorium ?? 'Nama Tidak Tersedia' }}</div>
                            <div class="location-coords">
                                <div>Lat: <span class="coord-value">{{ $item->latitude ?? 'N/A' }}</span></div>
                                <div>Lng: <span class="coord-value">{{ $item->longitude ?? 'N/A' }}</span></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="text-align: center; color: #9ca3af; padding: 3rem 0; font-size: 0.95rem;">
                    <p>Belum ada data lokasi.</p>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    let mapInstance = null;
    let markersMap = {};
    let allMarkers = [];

    document.addEventListener('DOMContentLoaded', function () {
        const locations = @json($infrastruktur);

        // Inisialisasi Peta
        mapInstance = L.map('map', {
            maxBounds: L.latLngBounds(L.latLng(-9.0, 104.0), L.latLng(-5.5, 116.0)), // Diperbaiki sedikit urutan L/B nya
            maxBoundsViscosity: 1.0
        }).setView([-7.15, 110.0], 8);

        // Base Layer (Peta Dasar)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 18,
            minZoom: 6,
        }).addTo(mapInstance);

        // Filter lokasi yang valid
        const validLocations = locations.map(item => ({
            latitude: item.latitude,
            longitude: item.longitude,
            nama_laboratorium: item.nama_laboratorium
        })).filter(function (loc) {
            return loc.latitude !== null && loc.longitude !== null && loc.latitude !== '' && loc.longitude !== '';
        });

        // Menambahkan Marker
        if (validLocations.length > 0) {
            allMarkers = validLocations.map(function (loc) {
                const lat = parseFloat(loc.latitude);
                const lng = parseFloat(loc.longitude);
                
                const marker = L.marker([lat, lng]).addTo(mapInstance);
                
                const popupContent = `
                    <div style="min-width: 150px;">
                        <strong style="font-size: 14px; color: #1f2937;">${loc.nama_laboratorium || 'Nama tidak tersedia'}</strong>
                        <hr style="margin: 8px 0; border: 0; border-top: 1px solid #e5e7eb;">
                        <div style="font-size: 12px; color: #6b7280;">
                            Lat: ${lat}<br>
                            Lng: ${lng}
                        </div>
                    </div>
                `;
                
                marker.bindPopup(popupContent);
                markersMap[loc.nama_laboratorium] = marker;
                
                return marker;
            });

            // Zoom otomatis agar semua marker terlihat
            if (allMarkers.length > 1) {
                const group = L.featureGroup(allMarkers);
                mapInstance.fitBounds(group.getBounds().pad(0.1));
            } else {
                mapInstance.setView([parseFloat(validLocations[0].latitude), parseFloat(validLocations[0].longitude)], 12);
            }
        } else {
            L.popup({ closeOnClick: false, autoClose: false })
                .setLatLng([-7.15, 110.0])
                .setContent('Belum ada koordinat laboratorium yang dapat ditampilkan.')
                .openOn(mapInstance);
        }
    });

    // Fungsi Pencarian Sidebar
    function filterLocations() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const items = document.querySelectorAll('.location-item');

        items.forEach(function (item) {
            const name = item.getAttribute('data-name');
            if (name.includes(filter)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Fungsi Mengarahkan Kamera saat Item Diklik
    function panToLocation(lat, lng, name) {
        if (!mapInstance || !lat || !lng) return;

        // Arahkan Peta
        mapInstance.setView([parseFloat(lat), parseFloat(lng)], 14);

        // Buka Popup Marker
        if (markersMap[name]) {
            markersMap[name].openPopup();
        }

        // Jika sedang di tampilan mobile, tutup otomatis sidebar setelah memilih lokasi
        if (window.innerWidth <= 768) {
            closeSidebar();
        }
    }

    // Fungsi Tampilan Sidebar Mobile
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        sidebar.classList.add('open');
        overlay.classList.add('active');
    }

    function closeSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        sidebar.classList.remove('open');
        overlay.classList.remove('active');
    }

    // Reset layout saat browser di-resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            closeSidebar();
        }
        // Perbaiki bug peta abu-abu jika jendela berubah ukuran
        if (mapInstance) {
            setTimeout(() => mapInstance.invalidateSize(), 200);
        }
    });
</script>
@endpush