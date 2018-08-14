<?php

namespace App\Http\Controllers;

use App\Penonton;
use App\Film;
use Illuminate\Http\Request;
use DB;

class PenontonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penontons = Penonton::latest()
                        ->paginate(10);


        return view('penontons.index',compact('penontons'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $film = Film::where('judul', $request->film)->first();
        // $kategori = Film::select('id_kategori','judul')
        //                 ->where('judul', $request->film)
        //                 ->get();
        
        activity()->log('create');
        return view('penontons.create');
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
        request()->validate([
            'kategori' => 'required',
            'film' => 'required',
            'tgl_tayang' => 'required',
            'jml_penonton' => 'required',
        ]);

        Penonton::create($request->all());
        activity()
            ->withProperties(['film' => $request->film,'tgl_tayang' => $request->tgl_tayang, 
                            'jml_penonton' => $request->jml_penonton])
            ->log('tambah inputan penonton');

        return redirect()->route('penontons.index')
                        ->with('success','Penonton created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penonton  $penonton
     * @return \Illuminate\Http\Response
     */
    public function show(Penonton $penonton)
    {
        //
        activity()
            ->performedOn($penonton)
            ->log('Peringatan kirim penonton');
        return view('penontons.show',compact('penonton'));//->renderSections()['content'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penonton  $penonton
     * @return \Illuminate\Http\Response
     */
    public function edit(Penonton $penonton)
    {
        //
        return view('penontons.edit', compact('penonton'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penonton  $penonton
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penonton $penonton)
    {
        //
        request()->validate([
            'kategori' => 'required',
            'film' => 'required',
            'tgl_tayang' => 'required',
            'jml_penonton' => 'required',
        ]);

        $penonton->update($request->all());
        activity()
            ->performedOn($penonton)
            ->withProperties(['film' => $request->film,'tgl_tayang' => $request->tgl_tayang, 
                            'jml_penonton' => $request->jml_penonton])
            ->log('edit penonton');

        return redirect()->route('penontons.index')
                        ->with('success','Penonton update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penonton  $penonton
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penonton $penonton)
    {
        //
        $penonton->delete();
        activity()
            ->performedOn($penonton)
            ->log('hapus jumlah penonton');
        return redirect()->route('penontons.index')
                        ->with('success','Penonton delete successfully.');
    }

    public function autofilm(Request $request)
    {
        $results = array();
        $data = Film::select("judul as name","id_kategori")->where("judul","LIKE","%{$request->input('query')}%")->get();
        foreach ($data as $query)
        {
            $results[] = [  'id' => $query->id_kategori, 'name' => $query->name];
        }
        return response()->json($results);
    }

    

   
}
