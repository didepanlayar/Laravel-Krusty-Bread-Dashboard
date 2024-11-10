<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = \App\Models\Payment::all();

        return view('payments.index', ['payments' => $payments]);
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
            'title'         => 'required|string|max:255'
        ])->validate();

        $new_payment             = new \App\Models\Payment;
        $new_payment->title      = $request->get('title');
        $new_payment->save();

        return redirect()->route('payments.index')->with('status', 'Metode pembayaran berhasil ditambahkan.');
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
        $payment = \App\Models\Payment::findOrFail($id);
        
        $validator = \Validator::make($request->all(), [
            "update_title"      => "required|string|max:255"
        ])->validate();

        $payment->title      = $request->get('update_title');
        $payment->save();
    
        return redirect()->route('payments.index')->with('status', 'Metode pembayaran berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = \App\Models\Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payments.index')->with('status', 'Metode pembayaran berhasil dihapus.');
    }
}
