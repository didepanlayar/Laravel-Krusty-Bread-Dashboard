<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = \App\Models\Material::all();

        return view('materials.index', ['materials' => $materials]);
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
            'title' => 'required|string|max:255',
            'stock' => 'required|integer',
            'unit'  => 'required|string|max:255'

        ])->validate();

        $new_material           = new \App\Models\Material;
        $new_material->title    = $request->get('title');
        $new_material->stock    = $request->get('stock');
        $new_material->unit     = $request->get('unit');
        $new_material->save();

        return redirect()->route('materials.index')->with('status', 'Stok berhasil ditambahkan.');
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
        $material = \App\Models\Material::findOrFail($id);
        
        $validator = \Validator::make($request->all(), [
            "update-title"  => "required|string|max:255",
            'update-stock'  => 'required|integer',
            'update-unit'   => 'required|string|max:255'
        ])->validate();

        $material->title    = $request->get('update-title');
        $material->stock    = $request->get('update-stock');
        $material->unit     = $request->get('update-unit');
        $material->save();
    
        return redirect()->route('materials.index')->with('status', 'Stok berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = \App\Models\Material::findOrFail($id);
        $material->delete();

        return redirect()->route('materials.index')->with('status', 'Stok berhasil dihapus.');
    }
}
