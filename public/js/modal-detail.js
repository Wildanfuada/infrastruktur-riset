// Modal Detail Infrastruktur
function showModalInfrastruktur(button) {
    // Ambil data dari atribut tombol yang diklik
    const nama = button.getAttribute('data-nama');
    const lembaga = button.getAttribute('data-lembaga');
    const akreditasi = button.getAttribute('data-akreditasi');
    const fasilitas = button.getAttribute('data-fasilitas');
    const lokasi = button.getAttribute('data-lokasi');
    const biaya = button.getAttribute('data-biaya');
    const contact = button.getAttribute('data-contact');
    const latitude = button.getAttribute('data-latitude');
    const longitude = button.getAttribute('data-longitude');

    // Masukkan ke dalam elemen modal
    document.getElementById('modalTitle').innerText = nama;
    document.getElementById('modalLembaga').innerText = lembaga;
    document.getElementById('modalAkreditasi').innerText = akreditasi;
    document.getElementById('modalLokasi').innerText = lokasi;
    document.getElementById('modalFasilitas').innerText = fasilitas;
    document.getElementById('modalBiaya').innerText = biaya;
    document.getElementById('modalContact').innerText = contact;
    document.getElementById('modalLatitude').innerText = latitude;
    document.getElementById('modalLongitude').innerText = longitude;

    // Tampilkan modal
    document.getElementById('detailModal').style.display = 'flex';
}

// Modal Detail SDM
function showModalSDM(button) {
    // Ambil data dari atribut tombol yang diklik
    const nama = button.getAttribute('data-nama');
    const alamat = button.getAttribute('data-alamat');
    const laboratorium = button.getAttribute('data-laboratorium');
    const kepakaran = button.getAttribute('data-kepakaran');
    const instansi = button.getAttribute('data-instansi');
    const email = button.getAttribute('data-email');
    const kontak = button.getAttribute('data-kontak');
    const latitude = button.getAttribute('data-latitude');
    const longitude = button.getAttribute('data-longitude');

    // Masukkan ke dalam elemen modal
    document.getElementById('modalNama').innerText = nama;
    document.getElementById('modalAlamat').innerText = alamat;
    document.getElementById('modalLaboratorium').innerText = laboratorium;
    document.getElementById('modalKepakaran').innerText = kepakaran;
    document.getElementById('modalInstansi').innerText = instansi;
    document.getElementById('modalEmail').innerText = email;
    document.getElementById('modalContact').innerText = kontak;
    document.getElementById('modalLatitude').innerText = latitude;
    document.getElementById('modalLongitude').innerText = longitude;

    // Tampilkan modal
    document.getElementById('detailModal').style.display = 'flex';
}

// Fungsi wrapper untuk backward compatibility
function showModal(button) {
    // Deteksi jika ada atribut SDM atau Infrastruktur
    if (button.getAttribute('data-laboratorium')) {
        showModalSDM(button);
    } else {
        showModalInfrastruktur(button);
    }
}

function closeModal() {
    document.getElementById('detailModal').style.display = 'none';
}

// Menutup modal jika area luar kotak diklik
window.onclick = function(event) {
    const modal = document.getElementById('detailModal');
    if (event.target == modal) {
        closeModal();
    }
}