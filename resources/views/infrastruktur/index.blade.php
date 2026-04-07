@extends('layout')
@section('title', 'Infrastruktur Riset')
@section('content')
<div class="main-content">
    <div class="container">
        <h1>Daftar Infrastruktur Riset</h1>

        <a href="{{ route('infrastruktur.create') }}" class="btn-add">+ Tambah Data</a>

        <form action="{{ route('infrastruktur.index') }}" method="GET" class="filter-form">
            <h3>Filter Data</h3>       
            <div class="filter-row">
                <div class="filter-group">
                    <label>Nama Laboratorium</label>
                    <input type="text" name="nama_lab" placeholder="Cari nama..." value="{{ request('nama_lab') }}">
                </div>
                <div class="filter-group">
                    <label>Lembaga</label>
                    <select name="lembaga">
                        <option value="">-- Semua --</option>
                        @foreach($list_lembaga as $l)
                            <option value="{{ $l }}" {{ request('lembaga') == $l ? 'selected' : '' }}>{{ $l }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-group">
                    <label>Jenis Akreditasi</label>
                    <select name="jenis_akreditasi">
                        <option value="">-- Semua --</option>
                        @foreach($list_akreditasi as $a)
                            <option value="{{ $a }}" {{ request('jenis_akreditasi') == $a ? 'selected' : '' }}>{{ $a }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-group">
                    <label>Terakreditasi</label>
                    <select name="status">
                        <option value="">-- Semua --</option>
                        <option value="ya" {{ request('status') == 'ya' ? 'selected' : '' }}>Ya</option>
                        <option value="tidak" {{ request('status') == 'tidak' ? 'selected' : '' }}>Tidak</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Fasilitas</label>
                    <input type="text" name="fasilitas" placeholder="Cari fasilitas..." value="{{ request('fasilitas') }}">
                </div>
                <div class="filter-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" placeholder="Cari lokasi..." value="{{ request('lokasi') }}">
                </div>
            </div>
            <div class="filter-actions">
                <button type="submit" class="btn-submit">Terapkan Filter</button>
                <a href="{{ route('infrastruktur.index') }}" class="btn-back">Reset</a>
            </div>
        </form>

        <div class="table-wrapper">
            <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Laboratorium</th>
                    <th>Lembaga</th>
                    <th>Jenis Akreditasi</th>
                    <th>Terakreditasi</th>
                    <th>Fasilitas</th>
                    <th>Lokasi</th>
                    <th>Biaya Pengujian</th>
                    <th>Contact Person</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($infrastruktur as $item)
                <tr>
                    <td>{{$infrastruktur->firstItem() + $loop->index}}</td>
                    <td><strong>{{ $item->nama_laboratorium }}</strong></td>
                    <td>{{ $item->lembaga }}</td>
                    <td>{{ $item->jenis_akreditasi ?? '-' }}</td>
                    <td>
                        @if($item->terakreditasi)
                            <span class="badge yes">Ya</span>
                        @else
                            <span class="badge no">Tidak</span>
                        @endif
                    </td>
                    <td class="muted">{{ Str::limit($item->fasilitas, 50) }}</td>
                    <td class="muted">{{ $item->lokasi }}</td>
                    <td class="muted">{{ $item->biaya_pengujian }}</td>
                    <td class="muted">{{ $item->contact_person }}</td>
                    <td>
                        <div class="actions">
                            <button class="btn btn-detail" type="button" 
                                onclick="showModal(this)"
                                data-nama="{{ $item->nama_laboratorium }}"
                                data-lembaga="{{ $item->lembaga }}"
                                data-akreditasi="{{ $item->terakreditasi ? 'Ya' : 'Tidak' }} ({{ $item->jenis_akreditasi ?? '-' }})"
                                data-fasilitas="{{ $item->fasilitas }}"
                                data-lokasi="{{ $item->lokasi }}"
                                data-biaya="{{ $item->biaya_pengujian }}"
                                data-contact="{{ $item->contact_person }}"
                                data-latitude="{{ $item->latitude ?? '-' }}"
                                data-longitude="{{ $item->longitude ?? '-' }}">
                                Detail
                            </button>
                        </div>
                        <div class ="actions">    
                            <a href="{{ route('infrastruktur.edit', $item->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('infrastruktur.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            <div class="pagination">
                {{ $infrastruktur->links('pagination::simple-default') }}
            </div>
            <p>
                Menampilkan {{ $infrastruktur->firstItem() }} sampai {{ $infrastruktur->lastItem() }} dari {{ $infrastruktur->total() }} data.
            </p>
        </div>
    </div>

    <div id="detailModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <button onclick="closeModal()" class="modal-close-btn" title="Tutup">×</button>
            <h2 id="modalTitle">Detail Laboratorium</h2>
            <hr>
            <p><strong>Lembaga:</strong> <span id="modalLembaga"></span></p>
            <p><strong>Terakreditasi:</strong> <span id="modalAkreditasi"></span></p>
            <p><strong>Fasilitas:</strong></p>
            <div id="modalFasilitas" style="background: #f4f4f4; padding: 10px; border-radius: 5px;"></div>
            <p><strong>Lokasi:</strong> <span id="modalLokasi"></span></p>
            <p><strong>Biaya Pengujian:</strong> <span id="modalBiaya"></span></p>
            <p><strong>Contact Person:</strong> <span id="modalContact"></span></p>
            <p><strong>Latitude:</strong> <span id="modalLatitude"></span></p>
            <p><strong>Longitude:</strong> <span id="modalLongitude"></span></p>
        </div>
    </div>
</div>
@endsection