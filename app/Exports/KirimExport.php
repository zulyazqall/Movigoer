<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Bank;

class KirimExport implements FromCollection
{
    public function collection()
    {
        return Bank::all();
    }
}