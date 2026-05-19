@extends('layout')
@section('title', 'Beranda')
@section('content')
<div class="main-content">    
    <h1 class="title-sheet">Beranda</h1>
    
    <div class="alert-info">
        <p>Selamat datang di Sistem Informasi Geografis Riset Jateng, platform inovatif yang memetakan potensi riset dan inovasi di Jawa Tengah.</p>
        <p>Pemerintah Provinsi Jawa Tengah menghadirkan SIG Riset Jateng sebagai platform digital untuk memetakan seluruh potensi riset dan inovasi daerah.</p>
        <p>Di dalam portal ini, data sebaran infrastruktur riset beserta status akreditasinya disatukan dengan profil kompetensi para peneliti serta tenaga ahli (SDM Iptek).</p>
        <p>Melalui visualisasi yang transparan dan akurat, dashboard ini berfungsi memudahkan akses informasi sekaligus menjadi jembatan kolaborasi antara akademisi, industri,
             dan pemerintah demi mendorong kemajuan iptek di Jawa Tengah.</p>
    </div>

    <div class="dashboard-row">
        <!-- Infrastruktur Riset Summary Card -->
        <div class="dashboard-card">
            <div style="display: flex; align-items: center; margin-bottom: 28px;">
                <div class="icon-box sky">📊</div>
                <h2>Infrastruktur Riset</h2>
            </div>
            
            <div class="summary">
                <div class="summary-item">
                    <h3>{{ $totalInfrastruktur }}</h3>
                    <p>Total</p>
                </div>
                <div class="summary-item emerald">
                    <h3>{{ $terakreditasi }}</h3>
                    <p>Terakreditasi</p>
                </div>
            </div>
            
            <a href="{{ route('infrastruktur.map') }}" class="btn-add">
                <span>Jelajahi Infrastruktur</span>
                <span>→</span>
            </a>
        </div>

        <!-- SDM Summary Card -->
        <div class="dashboard-card">
            <div style="display: flex; align-items: center; margin-bottom: 28px;">
                <div class="icon-box emerald">👥</div>
                <h2>SDM Iptek</h2>
            </div>
            
            <div class="summary">
                <div class="summary-item emerald">
                    <h3>{{ $totalSDM }}</h3>
                    <p>Total</p>
                </div>
            </div>
            
            <a href="{{ route('sdm.map') }}" class="btn-add emerald">
                <span>Cari Pakar/Peneliti</span>
                <span>→</span>
            </a>
        </div>
    </div>
</div>
@endsection