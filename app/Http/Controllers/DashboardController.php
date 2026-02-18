<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfrastrukturRiset;
use App\Http\Controllers\SDMController;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInfrastruktur = InfrastrukturRiset::count();
        $terakreditasi = InfrastrukturRiset::where('terakreditasi', true)->count();
        $tidakTerakreditasi = $totalInfrastruktur - $terakreditasi;
        return view('dashboard.index', compact('totalInfrastruktur', 'terakreditasi', 'tidakTerakreditasi'));
    }
}
