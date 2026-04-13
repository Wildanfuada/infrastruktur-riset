@extends('layout')
@section('title', 'Edit data SDM')
@section('content')
<div class="main-content">
    <div class="container">
        <h1 class="title-sheet">Edit Data SDM</h1>
        <form action="{{ route('sdm.update', $sdm->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $sdm->nama) }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $sdm->alamat) }}">
            </div>
            <div class="form-group">
                <label for="laboratorium">laboratorium:</label>
                <input type="text" name="laboratorium" id="laboratorium" class="form-control" value="{{ old('laboratorium', $sdm->laboratorium) }}" required>
            </div>
            <div class="form-group">
                <label for="kepakaran">kepakaran:</label>
                <input type="text" name="kepakaran" id="kepakaran" class="form-control" value="{{ old('kepakaran', $sdm->kepakaran) }}" required>
            </div>
            <div class="form-group">
                <label for="instansi">Instansi:</label>
                <input type="text" name="instansi" id="instansi" class="form-control" value="{{ old('instansi', $sdm->instansi) }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $sdm->email) }}">
            </div>
            <div class="form-group">
                <label for="kontak">Kontak:</label>
                <input type="text" name="kontak" id="kontak" class="form-control" value="{{ old('kontak', $sdm->kontak) }}">
            </div>
            <div class="form-group">
                <label for="latitude">Latitude:</label>
                <input type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude', $sdm->latitude) }}">
            </div>
            <div class="form-group">
                <label for="longitude">Longitude:</label>
                    <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude', $sdm->longitude) }}">
            </div>
            <div class="form-actions"> 
            <button type="submit" class="btn-submit">Perbarui Data</button>
                <a href="{{ route('sdm.index') }}" class="btn-back">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection