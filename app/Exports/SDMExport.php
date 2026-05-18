<?php

namespace App\Exports;

use App\Models\SDM;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SDMExport implements FromCollection, WithHeadings, WithMapping
{
    private $rowNumber = 0;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SDM::all();
    }
    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Alamat',
            'Laboratorium',
            'Kepakaran',
            'Instansi',
            'Email',
            'Kontak',
            'Latitude',
            'Longitude',
        ];
    }
    public function map($data): array
    {
        $this->rowNumber++;
        return [
            $this->rowNumber,
            $data->nama,
            $data->alamat,
            $data->laboratorium,
            $data->kepakaran,
            $data->instansi,
            $data->email,
            $data->kontak,
            $data->latitude,
            $data->longitude,
        ];
    }
}
