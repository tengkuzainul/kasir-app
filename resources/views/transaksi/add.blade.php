@extends('layouts.index')
@section('title', 'Tambah Data Transaksi')
@section('braedcrumb', 'Tambah Data Transaksi')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <p class="h-1 card-title"><b>Transaksi</b></p>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#transaksi">
                                <i class="bi bi-plus-circle-fill"></i>
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 30px">No</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 30px">No</td>
                                        <td>Nama Barang</td>
                                        <td>Harga</td>
                                        <td>Qty</td>
                                        <td>Subtotal</td>
                                    </tr>
                                </tbody>
                                <tr>
                                    <th colspan="4">Total Bayar</th>
                                    <th>Total Bayar</th>
                                </tr>
                            </table>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">No Transaksi</label>
                                        <input type="text" class="form-control" name="no_transaksi" value="NVT-001"
                                            required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Transaksi</label>
                                        <input type="date" class="form-control" value="{{ date('Y') }}" required
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Uang Pemebeli</label>
                                        <input type="number" class="form-control" name="uang_pembeli" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kembalian</label>
                                        <input type="number" class="form-control" name="kembalian" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <!-- /.card-header -->
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('transaksi') }}" class="btn btn-danger">
                                    <i class="bi bi-arrow-left"></i> Close
                                </a>
                                <button type="submit" class="btn btn-outline-info"><i class="bi bi-check-lg"></i></i>
                                    Simpan</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    <div class="modal fade" id="transaksi">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Transaksi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Barang</label>
                                <select name="barang_id" id="" class="form-control">
                                    <option value="" selected disabled>-- Pilih Nama Barang --</option>
                                </select>
                            </div>
                            <div id="tampilBarang"></div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection
