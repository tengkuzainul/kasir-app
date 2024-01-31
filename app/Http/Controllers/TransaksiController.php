<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = DB::table('tb_transaksi')->join('users', 'tb_transaksi.user_id', '=', 'users.id')
            ->select('tb_transaksi.*', 'users.name')
            ->get();
        $data = Transaksi::all();
        return view('transaksi.index', compact('data', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = DB::table('tb_barang')->get();
        return view('transaksi.add', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi->fill([
            'user_id' => Auth::id(),
            'total_harga' => $request->get('total_harga'), // Ubah menjadi 'total_harga'
        ]);
        $transaksi->save();
        $no_daftar = 0;

        foreach ($request->get('id_daftar') as $id_daftar) {
            $daftar = DB::table('tb_barang')->find($id_daftar); // Perbaiki query ke 'find'
            $transaksi_item = new TransaksiItem();
            $transaksi_item->fill([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $id_daftar,
                'nama' => $daftar->nama_barang,
                'harga' => $daftar->harga, // Ubah menjadi '$daftar->harga'
                'qty' => $request->get('quantity')[$no_daftar], // Ubah menjadi 'quantity'
            ]);
            $transaksi_item->save();
            $no_daftar++;
        }

        return redirect('transaksi');
    }

    public function printInvoice(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $trItems = TransaksiItem::all();
        $transaksiItems = TransaksiItem::where('transaksi_id', $transaksi->id)->get();

        return view('transaksi.invoice', compact('transaksi', 'transaksiItems', 'trItems'));
    }

    public function dataPenjualan()
    {
        $data = DB::table('transaksi_items')->join('tb_transaksi', 'transaksi_items.transaksi_id', '=', 'tb_transaksi.id')
            ->select('transaksi_items.*', 'tb_transaksi.*')
            ->get();
        return view('transaksi.laporan', compact('data'));
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
        Transaksi::findOrFail($id)->delete();
        return redirect('transaksi');
    }
}
