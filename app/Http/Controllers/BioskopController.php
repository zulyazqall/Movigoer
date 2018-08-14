<?php

namespace App\Http\Controllers;

use App\Bioskop;
use Illuminate\Http\Request;

class BioskopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bioskops = Bioskop::all();
        return view('bioskops.index',compact('bioskops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bioskops.create');
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
            'nama' => 'required',
            'email' => 'required',
            'telp' => 'required',
        ]);

        if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
         }

         $bioskops = new Bioskop();
         $bioskops->id_akun=$request->get('id_akun');
         $bioskops->nama=$request->get('nama');
         $bioskops->email=$request->get('email');
         $bioskops->telp=$request->get('telp');
         $bioskops->namacp=$request->get('namacp');
         $bioskops->telpcp=$request->get('telpcp');
         $bioskops->alamat=$request->get('alamat');
         $bioskops->image=$name;
         $bioskops->save();

         activity()
            ->log('Tambah inputan profile bioskop');

         return redirect()->route('bioskops.index')
             ->with('success','Profile berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function show(Bioskop $bioskop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function edit(Bioskop $bioskop)
    {
        //
        return view('bioskops.edit', compact('bioskop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'nama' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'filename' => 'required',
        ]);

        if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/img/', $name);
         }

         $bioskops = Bioskop::find($id);
         $bioskops->id_akun=$request->get('id_akun');
         $bioskops->nama=$request->get('nama');
         $bioskops->email=$request->get('email');
         $bioskops->telp=$request->get('telp');
         $bioskops->namacp=$request->get('namacp');
         $bioskops->telpcp=$request->get('telpcp');
         $bioskops->alamat=$request->get('alamat');
         $bioskops->image=$name;
         $bioskops->save();

         activity()
            ->performedOn($bioskops)
            ->withProperties(['nama' => $request->nama,'email' => $request->email, 
                            'telp' => $request->telp])
            ->log('edit profil bioskop');

         return redirect()->route('bioskops.index')
                ->with('success', 'Bioskop Profile berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bioskop  $bioskop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bioskop $bioskop)
    {
        //
        $bioskop->delete();
        activity()
            ->log('delete profile bioskop');

        return redirect()->route('bioskops.index')
                ->with('success', 'berhasil dihapus');
    }
}
