@extends('layout')

@section('title', 'Infrastruktur Riset')

@section('content')
<div class="container">
    <h1>Daftar Infrastruktur Riset</h1>

    <a href="{{ route('infrastruktur.create') }}" class="btn-add">+ Tambah Data</a>

    <div class="table-wrapper">
        <table>
        <thead>
            <tr>
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
    </div>
</div>
@endsection