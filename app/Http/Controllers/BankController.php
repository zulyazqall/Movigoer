<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Penonton;
use Illuminate\Http\Request;
use DB;
use Excel;
use App\Exports\KirimExport;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $banks = Bank::all();
        $data = array(
            'banks' => Bank::all(),

            'indos' => Bank::select('kategori','judul_film',DB::raw('sum(jml_penonton) as jml_penonton'))
                        ->distinct('judul_film')
                        ->where('kategori','=', 'Indonesia')
                        ->groupBy('kategori','judul_film')
                        ->orderByRaw('jml_penonton DESC')
                        ->limit(10)
                        ->get(),
            
            'barats' => Bank::select('kategori','judul_film',DB::raw('sum(jml_penonton) as jml_penonton'))
                        ->distinct('judul_film')
                        ->where('kategori','=', 'Asing')
                        ->groupBy('kategori','judul_film')
                        ->orderByRaw('jml_penonton DESC')
                        ->limit(10)
                        ->get(),
        );
        return view('admin.index',$data)
            ->with('i')
            ->with('j');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Bank::create($request->all());

        $penonton = Penonton::find($request->get('id'));
        $penonton->status=1;
        $penonton->save();

        activity()
            ->withProperties(['judul_film' => $request->judul_film,'kategori' => $request->kategori, 
                            'jml_penonton' => $request->jml_penonton])
            ->log('kirim jumlah penonton');
        return redirect()->route('penontons.index')
                        ->with('success','data telah dikirim');

        // return redirect()->route('penontons.kirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        //
    }

    public function export() 
    {
        return Excel::download(new KirimExport, 'data_pengiriman_log.xlsx');
    }
}
