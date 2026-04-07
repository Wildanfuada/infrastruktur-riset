<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SDM;

class SDMController extends Controller
{
    public function index()
    {
        $sdm = SDM::latest()->paginate(10);
        return view('sdm.index', compact('sdm'));
    }

    public function create()
    {
        return view('sdm.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'laboratorium' => 'required|string|max:255',
            'kepakaran' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'email' => 'required|email|unique:sdm_ipteks,email',
            'kontak' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        SDM::create($validatedData);

        return redirect()->route('sdm.index')->with('success', 'Data SDM berhasil ditambahkan.');
    }

    public function edit(SDM $sdm)
    {
        return view('sdm.edit', compact('sdm'));
    }

    public function update(Request $request, SDM $sdm)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'laboratorium' => 'required|string|max:255',
            'kepakaran' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'email' => 'required|email|unique:sdm_ipteks,email',
            'kontak' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',

        ]);

        $sdm->update($validatedData);

        return redirect()->route('sdm.index')->with('success', 'Data SDM berhasil diperbarui.');
    }

    public function destroy(SDM $sdm)
    {
        $sdm->delete();
        return redirect()->route('sdm.index')->with('success', 'Data SDM berhasil dihapus.');
    }

    public function indexMap()
    {
        $sdm = SDM::whereNotNull('latitude')->whereNotNull('longitude')->get();
        return view('sdm.map', compact('sdm'));
    }

}
