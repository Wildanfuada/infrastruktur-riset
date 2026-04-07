@extends('layout')

@section('title', 'Beranda')

@section('content')
<div class="main-content">    
    <h1>Dashboard</h1>
    <div class="dashboard-row" style="display: flex; gap: 32px; flex-wrap: wrap; margin-bottom: 32px;">
        <!-- Infrastruktur Riset Summary Card -->
        <div class="dashboard-card" style="flex: 1 1 350px; background: #f4f8fb; border-radius: 14px; box-shadow: 0 2px 8px rgba(44,62,80,0.07); padding: 32px 28px; min-width: 320px;">
            <h2 style="margin-bottom: 18px; color: #1a202c;">Infrastruktur Riset</h2>
            <div class="summary" style="display: flex; gap: 18px;">
                <div class="summary-item" style="flex:1; text-align:center;">
                    <h2>{{ $totalInfrastruktur }}</h2>
                    <p>Total</p>
                </div>
                <div class="summary-item" style="flex:1; text-align:center;">
                    <h2 style="color:#27ae60;">{{ $terakreditasi }}</h2>
                    <p>Terakreditasi</p>
                </div>
                <div class="summary-item" style="flex:1; text-align:center;">
                    <h2 style="color:#c0392b;">{{ $tidakTerakreditasi }}</h2>
                    <p>Tidak Terakreditasi</p>
                </div>
            </div>
            <a href="{{ route('infrastruktur.map') }}" class="btn-add" style="margin-top: 24px; display:inline-block;">Jelajah Infrastruktur</a>
        </div>

        <!-- SDM Summary Card -->
        <div class="dashboard-card" style="flex: 1 1 350px; background: #f4f8fb; border-radius: 14px; box-shadow: 0 2px 8px rgba(44,62,80,0.07); padding: 32px 28px; min-width: 320px;">
            <h2 style="margin-bottom: 18px; color: #1a202c;">SDM</h2>
            <div class="summary" style="display: flex; gap: 18px;">
                <div class="summary-item" style="flex:1; text-align:center;">
                    <h2>{{ $totalSDM }}</h2>
                    <p>Total</p>
                </div>
                <div class="summary-item" style="flex:1; text-align:center;">
                    <h2 style="color:#27ae60;">0</h2>
                    <p>SDM Aktif</p>
                </div>
                <div class="summary-item" style="flex:1; text-align:center;">
                    <h2 style="color:#c0392b;">0</h2>
                    <p>SDM Tidak Aktif</p>
                </div>
            </div>
            <a href="{{ route('sdm.map') }}" class="btn-add" style="margin-top: 24px; display:inline-block; background:#3498db;">Cari pakar/peneliti</a>
        </div>
    </div>
</div>
@endsection