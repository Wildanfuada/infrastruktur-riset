@extends('layout')
@section('title', 'Beranda')
@section('content')
<div class="main-content">    
    <h1 class="title-sheet">Dashboard GIS</h1>
    
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
                <div class="summary-item danger">
                    <h3>{{ $tidakTerakreditasi }}</h3>
                    <p>Belum Terakreditasi</p>
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
                <h2>SDM Ipteks</h2>
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