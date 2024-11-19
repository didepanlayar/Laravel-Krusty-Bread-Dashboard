<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_type = \App\Models\SalesType::all();

        return view('sales-type.index', ['sales_type' => $sales_type]);
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
            'title'         => 'required|string|max:255',
            'commission'    => 'required|integer'
        ])->validate();

        $new_sales_type             = new \App\Models\SalesType;
        $new_sales_type->title      = $request->get('title');
        $new_sales_type->commission = $request->get('commission');
        $new_sales_type->save();

        return redirect()->route('sales-type.index')->with('status', 'Jenis penjualan berhasil ditambahkan.');
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
        $sales_type = \App\Models\SalesType::findOrFail($id);
        
        $validator = \Validator::make($request->all(), [
            "update_title"      => "required|string|max:255",
            "update_commission" => "required|integer",
        ])->validate();

        $sales_type->title      = $request->get('update_title');
        $sales_type->commission = $request->get('update_commission');
        $sales_type->save();
    
        return redirect()->route('sales-type.index')->with('status', 'Jenis penjualan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sales_type = \App\Models\SalesType::findOrFail($id);
        $sales_type->delete();

        return redirect()->route('sales-type.index')->with('status', 'Jenis penjualan berhasil dihapus.');
    }
}
