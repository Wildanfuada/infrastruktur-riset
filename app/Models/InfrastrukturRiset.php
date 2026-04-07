<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfrastrukturRiset extends Model
{
    protected $fillable = [
        'nama_laboratorium',
        'lembaga',
        'jenis_akreditasi',
        'terakreditasi',
        'fasilitas',
        'lokasi',
        'biaya_pengujian',
        'contact_person',
        'latitude',
        'longitude',
    ];

    // Opsional: Casting 'terakreditasi' agar otomatis menjadi boolean di PHP
    protected $casts = [
        'terakreditasi' => 'boolean',
    ];
}
