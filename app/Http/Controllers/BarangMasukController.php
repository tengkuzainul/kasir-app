<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangMasuk = DB::table('tb_barang_masuk')->join('tb_barang', 'tb_barang_masuk.barang_id', '=', 'tb_barang.id')
            ->select('tb_barang_masuk.*', 'tb_barang.*')->get();
        $barang = DB::table('tb_barang')->get();

        return view('barangmasuk.index', compact('barangMasuk', 'barang'));
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
        DB::table('tb_barang_masuk')->insert([
            'barang_id' => $request->barang_id,
            'qty' => $request->qty,
            'tanggal' => $request->tglmasuk,
        ]);

        $barang = DB::table('tb_barang')->find($request->barang_id);
        if ($barang) {
            $barang = DB::table('tb_barang')->update([
                'stok' => $request->qty
            ]);
        } else {
            return redirect()->back();
        }

        return redirect('barangMasuk');
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
        //
    }
}
