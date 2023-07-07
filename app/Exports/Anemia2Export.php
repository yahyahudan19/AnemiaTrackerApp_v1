<?php

namespace App\Exports;

use App\Models\Anemia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Anemia2Export implements FromCollection,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Anemia::all()->sortBy('created_at');
    }
    public function map($data_anemia): array
    {
        return [
            $data_anemia->siswa->nama_siswa,
            $data_anemia->siswa->umur_siswa,
            $data_anemia->tinggi_anemia,
            $data_anemia->berat_anemia,    
            $data_anemia->riwayat_anemia,    
            $data_anemia->minum_anemia,    
        ];
    }
    public function headings(): array
    {
        return [
            'Nama',
            'Umur',
            'Tinggi (cm)',
            'Berat (Kg)',
            'Riwayat (Kg)',
            'Minum Obat (Kg)',
        ];
    }
}
