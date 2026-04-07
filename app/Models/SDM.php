<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SDM extends Model
{
    use HasFactory;
    protected $table = 'sdm_ipteks';

    protected $fillable = [
        'nama',
        'laboratorium',
        'kepakaran',
        'instansi',
        'email',
        'kontak',
        'latitude',
        'longitude',
    ];
}
