@extends('layout')
@section('title', 'SDM')
@section('content')
<div class="main-content">
    <div class="container">
        <h1>Daftar SDM</h1>
        <a href="{{ route('sdm.create') }}" class="btn-add">+ Tambah Data</a>
        <div class="table-wrapper">
            <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
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
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->laboratorium }}</td>
                    <td>{{ $item->kepakaran }}</td>
                    <td>{{ $item->instansi }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->kontak }}</td>
                    <td>

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
            <p><strong>Laboratorium:</strong> <span id="modalLembaga"></span></p>
            <p><strong>Kepakaran:</strong> <span id="modalJabatan"></span></p>
            <p><strong>Instansi:</strong> <span id="modalBidang"></span></p>
            <p><strong>Email:</strong> <span id="modalContact"></span></p>
            <p><strong>Kontak:</strong> <span id="modalContact"></span></p>
            <p><strong>Latitude:</strong> <span id="modalLatitude"></span></p>
            <p><strong>Longitude:</strong> <span id="modalLongitude"></span></p>
        </div>
    </div>
</div>
@endsection