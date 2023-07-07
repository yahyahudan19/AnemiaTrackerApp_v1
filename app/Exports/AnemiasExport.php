<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AnemiasExport implements FromCollection,WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }
    public function sheets(): array
    {
        return [
            'Data Siswa' => new Anemia1Export(),
            'Data Anemia' => new Anemia2Export(),
        ];
    }
}
