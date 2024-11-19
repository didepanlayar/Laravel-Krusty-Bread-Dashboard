<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SalesType;
use App\Models\Material;
use App\Models\Price;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories     = Category::all();
        $sales_types    = SalesType::all();
        $materials      = Material::all();

        return view('products.create', compact('categories', 'sales_types', 'materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title'         => 'required|string|min:5|max:200',
            'description'   => 'nullable|string|min:20|max:1000',
            'category_id'   => 'required|integer|exists:categories,id',
            'default_price' => 'required|numeric|digits_between:0,10',
            'status'        => 'required|string',
            'picture'       => 'nullable|image'
        ]);

        // Save product
        $product = new Product($validated_data);
        if($request->hasFile('picture')) {
            $product->picture = $request->file('picture')->store('products', 'public');
        }
        $product->save();

        // Save prices based on Sales Type
        if($request->has('prices')) {
            foreach($request->input('prices') as $sales_type_id => $price) {
                if($price) {
                    Price::create([
                        'product_id' => $product->id,
                        'sales_type_id' => $sales_type_id,
                        'price' => $price,
                    ]);
                }
            }
        }

        // Save materials
        if($request->has('materials')) {
            foreach($request->input('materials') as $material_id => $value) {
                $material = Material::findOrFail($material_id);
                if($material) {
                    $product->materials()->attach($material_id, ['quantity' => $material->stock]);
                }
            }
        }

        return redirect()->route('products.index')->with('status', 'Produk berhasil ditambahkan.');
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
        $product        = Product::with('prices', 'materials')->findOrFail($id);
        $categories     = Category::all();
        $sales_types    = SalesType::all();
        $materials      = Material::all();

        return view('products.edit', compact('product', 'categories', 'sales_types', 'materials'));
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
        $validated_data = $request->validate([
            'title'         => 'required|string|min:5|max:200',
            'description'   => 'nullable|string|min:20|max:1000',
            'category_id'   => 'required|integer|exists:categories,id',
            'default_price' => 'required|numeric|digits_between:0,10',
            'status'        => 'required|string',
            'picture'       => 'nullable|image'
        ]);

        // Update product
        $product = Product::findOrFail($id);
        $product->update($validated_data);
        if($request->hasFile('picture')) {
            $product->picture = $request->file('picture')->store('products', 'public');
        }
        $product->save();

        // Update prices based on Sales Type
        if($request->has('prices')) {
            foreach($request->input('prices') as $sales_type_id => $price) {
                if($price) {
                    // Current prices
                    $old_price = $product->prices()->where('sales_type_id', $sales_type_id)->first();
                    if($old_price) {
                        // Update if price changed
                        if($old_price->price != $price) {
                            $old_price->update(['price' => $price]);
                        }
                    } else {
                        // Add new price
                        $product->prices()->create([
                            'sales_type_id' => $sales_type_id,
                            'price' => $price,
                        ]);
                    }
                } else {
                    // Remove price if input is empty
                    $product->prices()->where('sales_type_id', $sales_type_id)->delete();
                }
            }
        }


        // Update materials
        if($request->has('materials')) {
            $new_materials = $request->input('materials');

            // Current materials
            $old_materials = $product->materials->keyBy('id')->map(function ($item) {
                return $item->pivot->quantity;
            });

            foreach($new_materials as $material_id => $value) {
                // Get stock from materials
                $material = Material::findOrFail($material_id);
                if($material) {
                    $quantity = $material->stock;
                    if(isset($old_materials[$material_id])) {
                        // Update if quantity changed
                        if($old_materials[$material_id] != $quantity) {
                            $product->materials()->updateExistingPivot($material_id, ['quantity' => $quantity]);
                        }
                        unset($old_materials[$material_id]);
                    } else {
                        // Add new material
                        $product->materials()->attach($material_id, ['quantity' => $quantity]);
                    }
                }
            }

            // Remove material if input is empty
            foreach($old_materials as $material_id => $quantity) {
                $product->materials()->detach($material_id);
            }
        }

        return redirect()->route('products.index')->with('status', 'Produk berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->picture) {
            $file_path = public_path("storage/{$product->picture}");
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $product->delete();

        return redirect()->route('products.index')->with('status', 'Produk berhasil dihapus.');
    }
}
