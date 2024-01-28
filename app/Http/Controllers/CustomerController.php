<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('tb_customer')->get();
        return view('customer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cetakLaporan()
    {
        $data = DB::table('tb_customer')->get();
        return view('customer.cetak', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('tb_customer')->insert([
            'nama_customer' => $request->nama_customer,
            'email_customer' => $request->email,
            'no_hp' => $request->no_hp,
            'tgl_lahir' => $request->tgl_lahir,
        ]);

        return redirect('customer');
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
        $customer = DB::table('tb_customer')->where('id', $id)->get();

        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('tb_customer')->where('id', $id)->update([
            'nama_customer' => $request->nama_customer,
            'email_customer' => $request->email,
            'no_hp' => $request->no_hp,
            'tgl_lahir' => $request->tgl_lahir,
        ]);

        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('tb_customer')->where('id', $id)->delete();

        return redirect('customer');
    }
}
