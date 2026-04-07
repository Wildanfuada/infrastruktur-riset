<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfrastrukturRiset;
use App\Models\SDM;

class BerandaController extends Controller
{
    public function index()
    {
        $totalInfrastruktur = InfrastrukturRiset::count();
        $terakreditasi = InfrastrukturRiset::where('terakreditasi', true)->count();
        $tidakTerakreditasi = $totalInfrastruktur - $terakreditasi;
        $totalSDM = SDM::count();
        return view('beranda.index', compact('totalInfrastruktur', 'terakreditasi', 'tidakTerakreditasi', 'totalSDM'));
    }
}
