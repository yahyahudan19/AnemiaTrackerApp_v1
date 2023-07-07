<?php

namespace App\Exports;

use App\Models\Anemia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Anemia1Export implements FromCollection,WithMapping, WithHeadings
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
            $data_anemia->siswa->nis_siswa,
            $data_anemia->siswa->ttl_siswa,
            $data_anemia->siswa->alamat_siswa,
            $data_anemia->siswa->jenisk_siswa,
            $data_anemia->siswa->ibu_siswa,
            $data_anemia->siswa->ayah_siswa,
        ];
    }
    public function headings(): array
    {
        return [
            'Nama',
            'NIS',
            'TTL',
            'Alamat',
            'Jenis Kelamin',
            'Nama Ibu',
            'Nama Ayah',
        ];
    }
}
