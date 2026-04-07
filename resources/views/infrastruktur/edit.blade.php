@extends('layout')
@section('title', 'Edit data Infrastruktur Riset')
@section('content')
<div class="main-content">
    <div class="container">
        <h1>Edit Data Infrastruktur Riset</h1>
        <p class="subtitle">Perbarui informasi infrastruktur riset</p>

        <form action="{{ route('infrastruktur.update', $infrastruktur->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_laboratorium" class="required">Nama Laboratorium</label>
                <input type="text" id="nama_laboratorium" name="nama_laboratorium" 
                    placeholder="Nama laboratorium" required
                    value="{{ $infrastruktur->nama_laboratorium }}">
            </div>

            <div class="form-group">
                <label for="lembaga" class="required">Lembaga/Institusi</label>
                <input type="text" id="lembaga" name="lembaga" 
                    placeholder="Nama lembaga atau institusi" required
                    value="{{ $infrastruktur->lembaga }}">
            </div>

            <div class="form-group">
                <label for="jenis_akreditasi">Jenis Akreditasi</label>
                <input type="text" id="jenis_akreditasi" name="jenis_akreditasi" 
                    placeholder="Contoh: ISO 9001"
                    value="{{ $infrastruktur->jenis_akreditasi ?? '' }}">
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="terakreditasi" name="terakreditasi" value="1"
                        {{ $infrastruktur->terakreditasi ? 'checked' : '' }}>
                    <label for="terakreditasi">Terakreditasi</label>
                </div>
            </div>

            <div class="form-group">
                <label for="fasilitas" class="required">Fasilitas</label>
                <textarea id="fasilitas" name="fasilitas" 
                        placeholder="Deskripsikan fasilitas yang tersedia..." required>{{ $infrastruktur->fasilitas }}</textarea>
            </div>

            <div class="form-group">
                <label for="lokasi" class="required">Lokasi</label>
                <textarea id="lokasi" name="lokasi" 
                        placeholder="Contoh: Jakarta, DKI Jakarta" required>{{ $infrastruktur->lokasi }}</textarea>
            </div>

            <div class="form-group">
                <label for="biaya_pengujian">Biaya Pengujian</label>
                <textarea id="biaya_pengujian" name="biaya_pengujian" 
                        placeholder="Contoh: Rp 1.000.000">{{ $infrastruktur->biaya_pengujian ?? '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="contact_person">Contact Person</label>
                <textarea id="contact_person" name="contact_person" 
                        placeholder="Nama dan kontak person"
                        required>{{ $infrastruktur->contact_person ?? '' }}</textarea>
            </div>

            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" id="latitude" name="latitude" 
                    placeholder="Contoh: -6.200000" 
                    value="{{ $infrastruktur->latitude ?? '' }}">
            </div>

            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" id="longitude" name="longitude" 
                    placeholder="Contoh: 106.816666" 
                    value="{{ $infrastruktur->longitude ?? '' }}">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Perbarui Data</button>
                <a href="{{ route('infrastruktur.index') }}" class="btn-back">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection