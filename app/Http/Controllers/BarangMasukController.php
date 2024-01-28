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
        $barangMasuk = DB::table('tb_barang_masuk')
            ->join('tb_barang', 'tb_barang_masuk.barang_id', '=', 'tb_barang.id')
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
            'barang_id' => $request->brg_masuk,
            'qty' => $request->qty,
            'tanggal' => $request->tglmasuk,
        ]);

        $barang = DB::table('tb_barang')->find($request->brg_masuk);

        if ($barang) {
            DB::table('tb_barang')->where('id', $request->brg_masuk)->increment('stok', $request->qty);
        } else {
            return redirect()->back();
        }

        return redirect('barangMasuk');
    }

    public function cetakLaporan()
    {
        $laporan = DB::table('tb_barang_masuk')
            ->join('tb_barang', 'tb_barang_masuk.barang_id', '=', 'tb_barang.id')
            ->select('tb_barang_masuk.*', 'tb_barang.*')->get();
        return view('barangMasuk.cetak', compact('laporan'));
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
        // $barangMasuk = DB::table('tb_barang_masuk')
        //     ->join('tb_barang', 'tb_barang_masuk.barang_id', '=', 'tb_barang.id')
        //     ->select('tb_barang_masuk.*', 'tb_barang.id')
        //     ->get();

        $barangMasuk = DB::table('tb_barang_masuk')->where('barang_id', $id)->first();
        $barang = DB::table('tb_barang')->find($barangMasuk->id);


        if ($barangMasuk) {
            $barang->stok -= $barangMasuk->qty;
            DB::table('tb_barang_masuk')->where('id', $barangMasuk->id)->delete();
        }
        return redirect('/barangMasuk');



        // $barangMasuk = DB::table('tb_barang_masuk')->where('barang_id', $barang->id)->first();
        // // dd($barangMasuk);
        // if ($barangMasuk) {

        //     // Delete the record from tb_barang_masuk
        //     DB::table('tb_barang_masuk')
        //         ->where(
        //             'id',
        //             $barangMasuk->id
        //         )->delete();

        //     // Decrement the stock in tb_barang
        //     DB::table('tb_barang')
        //         ->where('id', $barangMasuk->barang_id)
        //         ->decrement('stok', $barangMasuk->qty);


        //     return redirect('barangMasuk');
        // } else {
        //     return redirect()->back();
        // }
    }
}
