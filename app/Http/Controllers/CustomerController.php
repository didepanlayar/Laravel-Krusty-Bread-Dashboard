<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = \App\Models\Customer::all();

        return view('customers.index', ['customers' => $customers]);
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
        $validator = \Validator::make($request->all(), [
            "name"                  => "required|min:5|max:100",
            "phone"                 => "required|digits_between:10,12|unique:customers",
        ])->validate();

        $new_customer           = new \App\Models\Customer;
        $new_customer->name     = $request->get('name');
        $new_customer->phone    = $request->get('phone');
        $new_customer->save();

        return redirect()->route('customers.index')->with('status', 'Pelanggan berhasil ditambahkan.');
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
        $customer           = \App\Models\Customer::findOrFail($id);
        
        $validator = \Validator::make($request->all(), [
            "update_name"      => "required|min:5|max:100",
            "update_phone"     => "required|digits_between:10,12|unique:customers,phone," . $customer->id,
        ])->validate();

        $customer->name     = $request->get('update_name');
        $customer->phone    = $request->get('update_phone');
        $customer->save();
    
        return redirect()->route('customers.index')->with('status', 'Pelanggan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = \App\Models\Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('status', 'Pelanggan berhasil dihapus.');
    }
}
