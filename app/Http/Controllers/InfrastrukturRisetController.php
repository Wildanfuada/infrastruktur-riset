<?php

namespace App\Http\Controllers;

use App\Models\InfrastrukturRiset;
use Illuminate\Http\Request;

class InfrastrukturRisetController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data unique untuk dropdown
        $list_lembaga = InfrastrukturRiset::select('lembaga')->distinct()->pluck('lembaga');
        $list_akreditasi = InfrastrukturRiset::select('jenis_akreditasi')
            ->whereNotNull('jenis_akreditasi')
            ->distinct()
            ->pluck('jenis_akreditasi');

        // Query dasar
        $query = InfrastrukturRiset::query();

        // Filter: Nama Laboratorium
        if ($request->filled('nama_lab')) {
            $query->where('nama_laboratorium', 'LIKE', '%' . $request->nama_lab . '%');
        }

        // Filter: Fasilitas
        if ($request->filled('fasilitas')) {
            $query->where('fasilitas', 'LIKE', '%' . $request->fasilitas . '%');
        }

        // Filter: Lokasi
        if ($request->filled('lokasi')) {
            $query->where('lokasi', 'LIKE', '%' . $request->lokasi . '%');
        }

        // Filter Dropdown: Lembaga
        if ($request->filled('lembaga')) {
            $query->where('lembaga', $request->lembaga);
        }

        // Filter Dropdown: Jenis Akreditasi
        if ($request->filled('jenis_akreditasi')) {
            $query->where('jenis_akreditasi', $request->jenis_akreditasi);
        }

        // Filter Dropdown: Status Terakreditasi
        if ($request->filled('status')) {
            $query->where('terakreditasi', $request->status == 'ya' ? 1 : 0);
        }

        $infrastruktur = $query->latest()->paginate(10)->withQueryString();

        return view('infrastruktur.index', compact('infrastruktur', 'list_lembaga', 'list_akreditasi'));
    }

    public function create()
    {
        return view('infrastruktur.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'nama_laboratorium' => 'required|string|max:255',
            'lembaga' => 'required|string|max:255',
            'jenis_akreditasi' => 'nullable|string|max:255',
            'terakreditasi' => 'nullable',
            'fasilitas' => 'required|string',
            'lokasi' => 'required|string',
            'biaya_pengujian' => 'required|string', 
            'contact_person' => 'required|string',
        ]);

        // Checkbox handling - convert ke boolean
        $input['terakreditasi'] = $request->has('terakreditasi');
        
        InfrastrukturRiset::create($input);
        return redirect()->route('infrastruktur.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit(InfrastrukturRiset $infrastruktur)
    {
        return view('infrastruktur.edit', compact('infrastruktur'));
    }

    public function update(Request $request, InfrastrukturRiset $infrastruktur)
    {
        $input = $request->validate([
            'nama_laboratorium' => 'required|string|max:255',
            'lembaga' => 'required|string|max:255',
            'jenis_akreditasi' => 'nullable|string|max:255',
            'terakreditasi' => 'nullable',
            'fasilitas' => 'required|string',
            'lokasi' => 'required|string',
            'biaya_pengujian' => 'required|string', 
            'contact_person' => 'required|string',
        ]);

        // Checkbox handling - convert ke boolean
        $input['terakreditasi'] = $request->has('terakreditasi');

        $infrastruktur->update($input);
        return redirect()->route('infrastruktur.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(InfrastrukturRiset $infrastruktur)
    {
        $infrastruktur->delete();
        return redirect()->route('infrastruktur.index')->with('success', 'Data berhasil dihapus.');
    }
}
