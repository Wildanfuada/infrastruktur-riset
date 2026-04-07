@extends('layout')
@section('title', 'Tambah data SDM')
@section('content')
<div class="main-content">
    <div class="container">
        <h1>Tambah Data SDM</h1>
        <form action="{{ route('sdm.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama" class="required">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Nama lengkap" required value="{{ old('nama') }}">
            </div>
            <div class="form-group">
                <label for="laboratorium" class="required">laboratorium</label>
                <input type="text" id="laboratorium" name="laboratorium" placeholder="Nama lembaga atau institusi" required value="{{ old('laboratorium') }}">
            </div>
            <div class="form-group">
                <label for="kepakaran" class="required">kepakaran</label>
                <input type="text" id="kepakaran" name="kepakaran" placeholder="Jabatan atau posisi" required value="{{ old('kepakaran') }}">
            </div>
            <div class="form-group">
                <label for="instansi" class="required">Instansi</label>
                <input type="text" id="instansi" name="instansi" placeholder="Bidang keahlian atau spesialisasi" required value="{{ old('bidang_keahlian') }}">
            </div>
            <div class="form-group">
                <label for="email" class="required">Email</label>
                <input type="email" id="email" name="email" placeholder="Alamat email" required value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="kontak" class="required">Kontak</label>
                <input type="text" id="kontak" name="kontak" placeholder="Nomor telepon atau kontak person" required value="{{ old('kontak') }}">
            </div>
            <div class="form-group">
                 <label for="latitude">Latitude</label>
                 <input type="text" id="latitude" name="latitude" placeholder="Contoh: -6.200000" value="{{ old('latitude') }}">
            </div>
            <div class="form-group">
                 <label for="longitude">Longitude</label>
                 <input type="text" id="longitude" name="longitude" placeholder="Contoh: 106.816666" value="{{ old('longitude') }}">
            </div>
            <div class="form-actions">
                 <button type="submit" class="btn-submit">Simpan</button>
                 <a href="{{ route('sdm.index') }}" class="btn-back">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection