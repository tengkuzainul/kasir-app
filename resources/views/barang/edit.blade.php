@extends('layouts.index')
@section('title', 'Edit Kategori')
@section('braedcrumb', 'Edit Kategori')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Kategori Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @foreach ($data as $d)
                        <form action="{{ route('barang.update', ['id' => $d->id]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori Barang</label>
                                    <select name="kategori_id" id="" class="form-control">
                                        <option value="" selected disabled>-- Pilih Kategori Barang --</option>
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Barang</label>
                                    <input type="text" name="namabarang" value="{{ $d->nama_barang }}"
                                        class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga</label>
                                    <input type="number" name="hargabarang" value="{{ $d->harga }}"
                                        class="form-control" id="exampleInputEmail1" placeholder="Harga Barang">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Stok</label>
                                    <input type="number" name="stokbarang" value="{{ $d->stok }}" class="form-control"
                                        id="exampleInputEmail1" placeholder="Harga Barang">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                        </form>
                    @endforeach

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
@endsection
