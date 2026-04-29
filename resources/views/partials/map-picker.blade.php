<div class="form-group">
    <label>Lokasi (Pilih di Peta)</label>
    <div style="position: relative; width: 100%; height: 400px; margin-bottom: 15px;">
        <div id="map" style="width: 100%; height: 100%; border: 2px solid #ddd; border-radius: 5px; display: block;"></div>
    </div>
    <p style="font-size: 12px; color: #666; margin-bottom: 15px;">*Klik pada peta untuk memilih lokasi</p>
</div>

<script>
function initializeMap() {
    if (typeof L === 'undefined') {
        console.error('Leaflet library not loaded');
        setTimeout(initializeMap, 500);
        return;
    }

    let mapInstance;
    let currentMarker;

    try {
        // Inisialisasi Peta
        mapInstance = L.map('map', {
            maxBounds: L.latLngBounds(L.latLng(-9.0, 104.0), L.latLng(-5.5, 116.0)),
            maxBoundsViscosity: 1.0
        }).setView([-7.15, 110.0], 8);

        // Base Layer (Peta Dasar)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 18,
            minZoom: 7,
        }).addTo(mapInstance);

        setTimeout(function() {
            mapInstance.invalidateSize();
        }, 100);

        // Fungsi untuk menampilkan marker pada koordinat tertentu
        function setMarker(lat, lng) {
            if (currentMarker) {
                mapInstance.removeLayer(currentMarker);
            }
            currentMarker = L.marker([lat, lng], {
                draggable: true
            }).addTo(mapInstance);

            // Update input fields
            document.getElementById('latitude').value = lat.toFixed(6);
            document.getElementById('longitude').value = lng.toFixed(6);

            // Saat marker di-drag
            currentMarker.on('dragend', function(e) {
                let newLat = e.target.getLatLng().lat;
                let newLng = e.target.getLatLng().lng;
                document.getElementById('latitude').value = newLat.toFixed(6);
                document.getElementById('longitude').value = newLng.toFixed(6);
            });
        }

        //pencarian lokasi dengan geocoder
        let geocoder = L.Control.geocoder({
            defaultMarkGeocode: false,
            placeholder: 'Cari lokasi...',
            errorMessage: 'Lokasi tidak ditemukan'

        }).on('markgeocode', function(e) {
            let bbox = e.geocode.bbox;
            let center = e.geocode.center;

            mapInstance.fitBounds(bbox);
            setMarker(center.lat, center.lng);
        }).addTo(mapInstance);


        // Event ketika peta di-klik
        mapInstance.on('click', function(e) {
            setMarker(e.latlng.lat, e.latlng.lng);
        });

        // Jika ada nilai latitude dan longitude sebelumnya (edit mode)
        let existingLat = document.getElementById('latitude').value;
        let existingLng = document.getElementById('longitude').value;
        if (existingLat && existingLng) {
            setMarker(parseFloat(existingLat), parseFloat(existingLng));
            mapInstance.setView([parseFloat(existingLat), parseFloat(existingLng)], 15);
        }
    
        //input manual untuk latitude dan longitude
        let latInput = document.getElementById('latitude');
        let lngInput = document.getElementById('longitude');

        function updateMapFromInput() {
            let lat = parseFloat(latInput.value);
            let lng = parseFloat(lngInput.value);

            // Jika input adalah angka yang valid, update peta
            if (!isNaN(lat) && !isNaN(lng) && lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180) {
                setMarker(lat, lng);
            }
        }

        // Jalankan fungsi saat user mengetik (real-time update)
        if(latInput && lngInput) {
            latInput.addEventListener('input', updateMapFromInput);
            lngInput.addEventListener('input', updateMapFromInput);

            latInput.addEventListener('change', updateMapFromInput);
            lngInput.addEventListener('change', updateMapFromInput);
        
            function handleEnterKey(e) {
                if (e.key === 'Enter') {
                    e.preventDefault(); // Mencegah form submit jika berada dalam form
                    updateMapFromInput();
                }
            }

            latInput.addEventListener('keydown', handleEnterKey);
            lngInput.addEventListener('keydown', handleEnterKey);
        }

        console.log('Map initialized successfully');
    } catch (error) {
        console.error('Error initializing map:', error);
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeMap);
} else {
    initializeMap();
}
</script>