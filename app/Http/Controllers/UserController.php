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
        $users = \App\Models\User::all();

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('users.create');
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
            "password"              => "required|min:8",
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
        // 
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
            "update_name"      => "required|min:5|max:100",
            "update_username"  => "required|min:5|max:20|unique:users,username," . $user->id,
            "update_roles"     => "required",
            "update_phone"     => "required|digits_between:10,12"
        ])->validate();

        $user->name     = $request->get('update_name');
        $user->username = $request->get('update_username');
        $user->roles    = json_encode($request->get('update_roles'));
        $user->phone    = $request->get('update_phone');
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
