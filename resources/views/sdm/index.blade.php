@extends('layout')
@section('title', 'SDM')
@section('content')
<div class="main-content">
    <div class="container">
        <h1 class="title-sheet">Daftar SDM</h1>
        <a href="{{ route('sdm.create') }}" class="btn-add">+ Tambah Data</a>
        <div class="table-wrapper">
            <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Laboratorium</th>
                    <th>Kepakaran</th>
                    <th>Instansi</th>
                    <th>Email</th>
                    <th>Kontak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sdm as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $item->nama }}</strong></td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->laboratorium }}</td>
                    <td>{{ $item->kepakaran }}</td>
                    <td>{{ $item->instansi }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->kontak }}</td>
                    <td>

                        <div class ="actions">    
                            <button class="btn btn-detail" type="button" 
                                onclick="showModalSDM(this)"
                                data-nama="{{ $item->nama }}"
                                data-alamat="{{ $item->alamat }}"
                                data-laboratorium="{{ $item->laboratorium }}"
                                data-kepakaran="{{ $item->kepakaran }}"
                                data-instansi="{{ $item->instansi }}"
                                data-email="{{ $item->email }}"
                                data-kontak="{{ $item->kontak }}"
                                data-latitude="{{ $item->latitude ?? '-' }}"
                                data-longitude="{{ $item->longitude ?? '-' }}">
                                Detail
                            </button>
                        </div>
                        <div class ="actions">
                            <a href="{{ route('sdm.edit', $item->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('sdm.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
                {{ $sdm->links('pagination::simple-default') }}
            </div>
            <p>
                Menampilkan {{ $sdm->firstItem() }} sampai {{ $sdm->lastItem() }} dari {{ $sdm->total() }} data.
            </p>
        </div>
    </div>

    <div id="detailModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <button onclick="closeModal()" class="modal-close-btn" title="Tutup">×</button>
            <h3 id="modalNama"></h3>
            <p><strong>Alamat:</strong> <span id="modalAlamat"></span></p>
            <p><strong>Laboratorium:</strong> <span id="modalLaboratorium"></span></p>
            <p><strong>Kepakaran:</strong> <span id="modalKepakaran"></span></p>
            <p><strong>Instansi:</strong> <span id="modalInstansi"></span></p>
            <p><strong>Email:</strong> <span id="modalEmail"></span></p>
            <p><strong>Kontak:</strong> <span id="modalContact"></span></p>
            <p><strong>Latitude:</strong> <span id="modalLatitude"></span></p>
            <p><strong>Longitude:</strong> <span id="modalLongitude"></span></p>
        </div>
    </div>
</div>
@endsection