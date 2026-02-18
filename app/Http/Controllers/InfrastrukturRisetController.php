<?php

namespace App\Http\Controllers;

use App\Models\InfrastrukturRiset;
use Illuminate\Http\Request;

class InfrastrukturRisetController extends Controller
{
    public function index()
    {
        $infrastruktur = InfrastrukturRiset::all();
        return view('infrastruktur.index', compact('infrastruktur'));  
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
