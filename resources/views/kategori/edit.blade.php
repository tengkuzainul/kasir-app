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
                        <form action="{{ route('kategori.update', ['id' => $d->id]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori Barang</label>
                                    <input type="text" name="namakategori" value="{{ $d->nama_kategori }}"
                                        class="form-control" id="exampleInputEmail1" placeholder="Nama Kategori Barang">
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
