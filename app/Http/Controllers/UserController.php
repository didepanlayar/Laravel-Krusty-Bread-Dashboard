<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\Models\User::paginate(10);

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            "name"                  => "required|min:5|max:100",
            "username"              => "required|min:5|max:20|unique:users",
            "roles"                 => "required",
            "phone"                 => "required|digits_between:10,12",
            "email"                 => "required|email|unique:users",
            "password"              => "required",
            "password_confirmation" => "required|same:password"
        ])->validate();

        $new_user           = new \App\Models\User;
        $new_user->name     = $request->get('name');
        $new_user->username = $request->get('username');
        $new_user->roles    = json_encode($request->get('roles'));
        $new_user->phone    = $request->get('phone');
        $new_user->email    = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->save();

        return redirect()->route('users.index')->with('status', 'Karyawan berhasil ditambahkan.');
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
    public function edit($id)
    {
        $user = \App\Models\User::findOrFail($id);

        return view('users.edit', ['user' => $user]);
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
        $user           = \App\Models\User::findOrFail($id);
        
        $validator = \Validator::make($request->all(), [
            "name"      => "required|min:5|max:100",
            "username"  => "required|min:5|max:20|unique:users,username," . $user->id,
            "roles"     => "required",
            "phone"     => "required|digits_between:10,12"
        ])->validate();

        $user->name     = $request->get('name');
        $user->username = $request->get('username');
        $user->roles    = json_encode($request->get('roles'));
        $user->phone    = $request->get('phone');
        $user->save();
    
        return redirect()->route('users.index')->with('status', 'Karyawan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('status', 'Karyawan berhasil dihapus.');
    }
}
