<?php

namespace App\Exports;

use App\Models\InfrastrukturRiset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InfrastrukturExport implements FromCollection, WithHeadings, WithMapping
{
    private $rowNumber = 0;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return InfrastrukturRiset::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Laboratorium',
            'Lembaga',
            'Jenis Akreditasi',
            'Terakreditasi',
            'Fasilitas',
            'Lokasi',
            'Biaya Pengujian',
            'Contact Person',
            'Latitude',
            'Longitude',
        ];
    }
    
    public function map($data): array
    {
        $this->rowNumber++;
        return [
            $this->rowNumber,
            $data->nama_laboratorium,
            $data->lembaga,
            $data->jenis_akreditasi,
            $data->terakreditasi ? 'Ya' : 'Tidak',
            $data->fasilitas,
            $data->lokasi,
            $data->biaya_pengujian,
            $data->contact_person,
            $data->latitude,
            $data->longitude,
        ];
    }
}
