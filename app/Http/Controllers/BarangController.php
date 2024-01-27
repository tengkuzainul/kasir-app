<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = DB::table('tb_kategori')->get();
        $data = DB::table('tb_barang')
            ->join('tb_kategori', 'tb_barang.kategori_id', '=', 'tb_kategori.id')
            ->select('tb_barang.*', 'tb_kategori.nama_kategori')
            ->get();
        return view('barang.index', compact('data', 'kategori'));
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
        $kdBrg = 'KD' . "-" . time();

        DB::table('tb_barang')->insert([
            'kd_barang' => $kdBrg,
            'kategori_id' => $request->kategori_id,
            'nama_barang' => $request->namabarang,
            'harga' => $request->hargabarang,
            'stok' => $request->stokbarang,
            'created_at' => now(),
        ]);

        return redirect('barang');
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
        $kategori = DB::table('tb_kategori')->get();
        $data = DB::table('tb_barang')->where('id', $id)->get();
        return view('barang.edit', compact('data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        DB::table('tb_barang')->where('id', $id)->update([
            'kategori_id' => $request->kategori_id,
            'nama_barang' => $request->namabarang,
            'harga' => $request->hargabarang,
            'stok' => $request->stokbarang,
            'updated_at' => now(),
        ]);

        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('tb_barang')->where('id', $id)->delete();
        return redirect('barang');
    }
}
