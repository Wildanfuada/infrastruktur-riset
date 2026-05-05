<?php

namespace App\Imports;

use App\Models\SDM;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SDMImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SDM([
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'laboratorium' => $row['laboratorium'],
            'kepakaran' => $row['kepakaran'],
            'instansi' => $row['instansi'],
            'email' => $row['email'],
            'kontak' => $row['kontak'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
        ]);
    }
}
