@extends('layout')
@section('title', 'Tambah data Infrastruktur Riset')
@section('content')
<div class="main-content">
    <div class="container">
        <h1 class="title-sheet">Tambah Data Infrastruktur Riset</h1>
        <p class="subtitle">Isikan data lengkap infrastruktur riset baru</p>

        <form action="{{ route('infrastruktur.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_laboratorium" class="required">Nama Laboratorium</label>
                <input type="text" id="nama_laboratorium" name="nama_laboratorium" 
                    placeholder="Nama laboratorium" required
                    value="{{ old('nama_laboratorium') }}">
            </div>

            <div class="form-group">
                <label for="lembaga" class="required">Lembaga/Institusi</label>
                <input type="text" id="lembaga" name="lembaga" 
                    placeholder="Nama lembaga atau institusi" required
                    value="{{ old('lembaga') }}">
            </div>

            <div class="form-group">
                <label for="jenis_akreditasi">Jenis Akreditasi</label>
                <input type="text" id="jenis_akreditasi" name="jenis_akreditasi" 
                    placeholder="Jenis akreditasi"
                    value="{{ old('jenis_akreditasi') }}">
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="terakreditasi" name="terakreditasi" value="1">
                    <label for="terakreditasi">Terakreditasi</label>
                </div>
            </div>

            <div class="form-group">
                <label for="fasilitas" class="required">Fasilitas</label>
                <textarea id="fasilitas" name="fasilitas" 
                        placeholder="Deskripsikan fasilitas yang tersedia..." required>{{ old('fasilitas') }}</textarea>
            </div>

            <div class="form-group">
                <label for="lokasi" class="required">Lokasi</label>
                <textarea id="lokasi" name="lokasi" 
                    placeholder="Contoh: Kota Semarang, Jawa Tengah" required>{{ old('lokasi') }}</textarea>
            </div>

            <div class="form-group">
                <label for="biaya_pengujian" class="required">Biaya Pengujian</label>
                <textarea id="biaya_pengujian" name="biaya_pengujian" 
                    placeholder="Contoh: Rp 1.000.000">{{ old('biaya_pengujian') }}</textarea>
            </div>

            <div class="form-group">
                <label for="contact_person" class="required">Contact Person</label>
                <textarea id="contact_person" name="contact_person" 
                    placeholder="Nama dan kontak person"
                    required>{{ old('contact_person') }}</textarea>
            </div>

            @include('partials.map-picker')

            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" id="latitude" name="latitude" 
                    placeholder="Contoh: -6.200000" value="{{ old('latitude') }}">
            </div>

            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" id="longitude" name="longitude" 
                    placeholder="Contoh: 106.816666" value="{{ old('longitude') }}">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Simpan Data</button>
                <a href="{{ route('infrastruktur.index') }}" class="btn-back">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection