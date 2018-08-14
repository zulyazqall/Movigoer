<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;
use App\Kategori;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $films = Film::latest()->paginate(5);

        return view('admin.films.index',compact('films'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('admin.films.create', compact('kategori'));
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
            'id_kategori' => 'required',
            'judul' => 'required',
            'sinopsis' => 'required',
            'filename' => 'required',
        ]);

        if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
         }

         $films = new Film();
         $films->id_kategori=$request->get('id_kategori');
         $films->judul=$request->get('judul');
         $films->sinopsis=$request->get('sinopsis');
         $films->poster=$name;
         $films->save();

         return redirect()->route('films.index')
             ->with('success','Film berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
        // $data = array(
        //     'film' => Berita::latest()->paginate(5),
        //     'tautans' => Tautan::all(),
        // );

        $kategori = Kategori::all();

        return view('admin.films.edit', compact(['film','kategori']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'id_kategori' => 'required',
            'judul' => 'required',
            'sinopsis' => 'required',
            'filename' => 'required',
        ]);
        
        if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
         }

         $films = Film::find($id);
         $films->id_kategori=$request->get('id_kategori');
         $films->judul=$request->get('judul');
         $films->sinopsis=$request->get('sinopsis');
         $films->poster=$name;
         $films->save();

         return redirect()->route('films.index')
             ->with('success','Film berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        //
        $film->delete();
        return redirect()->route('films.index')
             ->with('success','Film berhasil dihapus');
    }


    public function autocomplete(Request $request)
    {
        $data = Kategori::select("kategori as name")->where("kategori","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }
    

    
}
