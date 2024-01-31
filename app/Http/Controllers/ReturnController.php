<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = DB::table('tb_barang')->get();
        $customer = DB::table('tb_customer')->get();
        $data = DB::table('tb_return_barang')->join('tb_barang', 'tb_return_barang.barang_id', '=', 'tb_barang.id')
            ->join('tb_customer', 'tb_return_barang.customer_id', '=', 'tb_customer.id')
            ->select('tb_return_barang.*', 'tb_barang.*', 'tb_customer.*')
            ->get();

        return view('returnbarang.index', compact('data', 'barang', 'customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('tb_return_barang')->insert([
            'barang_id' => $request->barang_id,
            'customer_id' => $request->customer,
            'alasan' => $request->alasan,
            'qty' => $request->qty,
        ]);

        $barang = DB::table('tb_barang')->find($request->barang_id);

        if ($barang) {
            DB::table('tb_barang')->where('id', $request->brg_masuk)->increment('stok', $request->qty);
        } else {
            return redirect()->back();
        }

        return redirect('returnBarang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('tb_return_barang')->where('id', $id)->delete();

        return redirect('returnBarang');
    }
}
