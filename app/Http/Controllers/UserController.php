<?php

namespace App\Http\Controllers;

use App\User;
use App\Bioskop;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $redirectTo = '/admin/users';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::latest()->paginate(5);
        // $data = array(
        //     'users' => User::latest()->paginate(5),
        // );

        return view('admin.users.index',compact('users'))
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
        return view('admin.users.create');
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
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        return redirect()->to('admin/users')
                        ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view ('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $users = User::find($id);
        $users->name=$request->get('name');
        $users->email=$request->get('email');
        $users->password=bcrypt($request->get('password'));
        $users->save();


        return redirect()->to('admin/users')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        
        return redirect()->to('admin/users')
                        ->with('success','User deleted successfully');
    }

    public function tampil($id)
    {
        $bioskops = Bioskop::where('id_akun',$id)->get();

        return view('admin.users.tampil',compact('bioskops'));
    }
}
