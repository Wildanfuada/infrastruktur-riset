<?php

namespace App\Imports;

use App\Models\InfrastrukturRiset;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InfrastrukturImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new InfrastrukturRiset([
            'nama_laboratorium' => $row['nama_laboratorium'],
            'lembaga' => $row['lembaga'],
            'jenis_akreditasi' => $row['jenis_akreditasi'],
            'terakreditasi' => $row['terakreditasi'] == 'ya' ? 1 : 0,
            'fasilitas' => $row['fasilitas'],
            'lokasi' => $row['lokasi'], 
            'biaya_pengujian' => $row['biaya_pengujian'],
            'contact_person' => $row['contact_person'],
            'latitude' => $row['latitude'],
            'longitude' => $row['longitude'],
        ]);
    }
}
