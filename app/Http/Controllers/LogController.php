<?php

namespace App\Http\Controllers;
use Spatie\Activitylog\Models\Activity;

use Illuminate\Http\Request;
use Excel;
use App\Exports\LogExport;

class LogController extends Controller
{
    //
    public function index()
    {
        //
        $logs = Activity::all();
        return view('admin.logs.index',compact('logs'));
    }

    public function export() 
    {
        return Excel::download(new LogExport, 'eljp_log.xlsx');
    }
}
