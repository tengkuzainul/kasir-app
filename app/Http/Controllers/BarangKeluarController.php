<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangKeluar = DB::table('tb_barang_keluar')->join('tb_barang', 'tb_barang_keluar.barang_id', '=', 'tb_barang.id')
            ->select('tb_barang_keluar.*', 'tb_barang.*')->get();
        $barang = DB::table('tb_barang')->get();

        return view('barangkeluar.index', compact('barangKeluar', 'barang'));
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
        DB::table('tb_barang_keluar')->insert([
            'barang_id' => $request->brg_keluar,
            'qty' => $request->qty,
            'tanggal' => $request->tglmasuk,
        ]);

        $barang = DB::table('tb_barang')->find($request->brg_keluar);

        if ($barang) {
            DB::table('tb_barang')->where('id', $request->brg_keluar)->decrement('stok', $request->qty);
        } else {
            return redirect()->back();
        }

        return redirect('barangKeluar');
    }

    public function cetakLaporan()
    {
        $laporan = DB::table('tb_barang_keluar')
            ->join('tb_barang', 'tb_barang_keluar.barang_id', '=', 'tb_barang.id')
            ->select('tb_barang_keluar.*', 'tb_barang.*')->get();
        return view('barangKeluar.cetak', compact('laporan'));
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
        $barangMasuk = DB::table('tb_barang_keluar')->where('barang_id', $id)->first();
        $barang = DB::table('tb_barang')->find($barangMasuk->id);


        if ($barangMasuk) {
            $barang->stok -= $barangMasuk->qty;
            DB::table('tb_barang_keluar')->where('id', $barangMasuk->id)->delete();
        }
        return redirect('barangKeluar');
    }
}
