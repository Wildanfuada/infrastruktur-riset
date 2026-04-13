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
                                <div>Lokasi : <span class="coord-value">{{ $item->lokasi ?? 'N/A' }}</span></div>
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

    <!-- Detail Modal untuk Map -->
    <div id="detailModalMap" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <button onclick="closeDetailModal()" class="modal-close-btn" title="Tutup">×</button>
            <h2 id="mapModalTitle">Detail Laboratorium</h2>
            <hr>
            <p><strong>Lembaga:</strong> <span id="mapModalLembaga">-</span></p>
            <p><strong>Jenis Akreditasi:</strong> <span id="mapModalAkreditasi">-</span></p>
            <p><strong>Terakreditasi:</strong> <span id="mapModalTerakreditasi">-</span></p>
            <p><strong>Fasilitas:</strong></p>
            <div id="mapModalFasilitas" style="background: #f4f4f4; padding: 10px; border-radius: 5px; min-height: 60px;">-</div>
            <p><strong>Lokasi:</strong> <span id="mapModalLokasi">-</span></p>
            <p><strong>Biaya Pengujian:</strong> <span id="mapModalBiaya">-</span></p>
            <p><strong>Contact Person:</strong> <span id="mapModalContact">-</span></p>
            <p><strong>Latitude:</strong> <span id="mapModalLatitude">-</span></p>
            <p><strong>Longitude:</strong> <span id="mapModalLongitude">-</span></p>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    let mapInstance = null;
    let markersMap = {};
    let allMarkers = [];
    let infrastrukturData = {};

    document.addEventListener('DOMContentLoaded', function () {
        const locations = @json($infrastruktur);

        // Simpan data infrastruktur untuk akses detail
        locations.forEach(item => {
            infrastrukturData[item.nama_laboratorium] = item;
        });

        // Inisialisasi Peta
        mapInstance = L.map('map', {
            maxBounds: L.latLngBounds(L.latLng(-9.0, 104.0), L.latLng(-5.5, 116.0)), // Diperbaiki sedikit urutan L/B nya
            maxBoundsViscosity: 1.0
        }).setView([-7.15, 110.0], 8);

        // Base Layer (Peta Dasar)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 18,
            minZoom: 7,
        }).addTo(mapInstance);

        // Filter lokasi yang valid
        const validLocations = locations.map(item => ({
            latitude: item.latitude,
            longitude: item.longitude,
            nama_laboratorium: item.nama_laboratorium,
            lokasi: item.lokasi
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
                    <div style="min-width: 200px;">
                        <strong style="font-size: 14px; color: #1f2937;">${loc.nama_laboratorium || 'Nama tidak tersedia'}</strong>
                        <hr style="margin: 8px 0; border: 0; border-top: 1px solid #e5e7eb;">
                        <div style="font-size: 12px; color: #6b7280; margin-bottom: 10px;">
                            Lokasi: ${loc.lokasi || '-'}
                        </div>
                        <button onclick="showDetailModal('${loc.nama_laboratorium}')" style="width: 100%; padding: 6px 12px; background-color: #3b82f6; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 12px; font-weight: 500;">Lihat Detail</button>
                    </div>
                `;
                
                marker.bindPopup(popupContent);
                
                // Tambah event listener untuk marker
                marker.on('click', function() {
                    marker.openPopup();
                });
                
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

    // Fungsi untuk menampilkan detail modal dari marker
    function showDetailModal(namaLaboratorium) {
        const item = infrastrukturData[namaLaboratorium];
        
        if (!item) {
            alert('Data tidak ditemukan');
            return;
        }

        // Isi data modal
        document.getElementById('mapModalTitle').innerText = item.nama_laboratorium || 'Detail Laboratorium';
        document.getElementById('mapModalLembaga').innerText = item.lembaga || '-';
        document.getElementById('mapModalAkreditasi').innerText = item.jenis_akreditasi || '-';
        document.getElementById('mapModalTerakreditasi').innerText = item.terakreditasi ? 'Ya' : 'Tidak';
        document.getElementById('mapModalFasilitas').innerText = item.fasilitas || '-';
        document.getElementById('mapModalLokasi').innerText = item.lokasi || '-';
        document.getElementById('mapModalBiaya').innerText = item.biaya_pengujian || '-';
        document.getElementById('mapModalContact').innerText = item.contact_person || '-';
        document.getElementById('mapModalLatitude').innerText = item.latitude || '-';
        document.getElementById('mapModalLongitude').innerText = item.longitude || '-';

        // Tampilkan modal
        document.getElementById('detailModalMap').style.display = 'flex';
    }

    // Fungsi untuk menutup detail modal
    function closeDetailModal() {
        document.getElementById('detailModalMap').style.display = 'none';
    }

    // Tutup modal jika area luar kotak diklik
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('detailModalMap');
        if (event.target == modal) {
            closeDetailModal();
        }
    });


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