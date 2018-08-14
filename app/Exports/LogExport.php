<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Spatie\Activitylog\Models\Activity;

class LogExport implements FromCollection
{
    public function collection()
    {
        return Activity::all();
    }
}