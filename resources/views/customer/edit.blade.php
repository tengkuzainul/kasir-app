@extends('layouts.index')
@section('title', 'Edit Customer')
@section('braedcrumb', 'Edit Customer')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Customer</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @foreach ($customer as $d)
                        <form action="{{ route('customer.update', ['id' => $d->id]) }}" method="POST">
                            @csrf
                            <div class="card-body d-flex">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Customer</label>
                                        <input type="text" name="nama_customer" value="{{ $d->nama_customer }}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Nama Customer">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">No Handphone</label>
                                        <input type="number" name="no_hp" value="{{ $d->no_hp }}"
                                            class="form-control" id="exampleInputEmail1" placeholder="No Hp">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">email Customer</label>
                                        <input type="email" name="email" value="{{ $d->email_customer }}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Email Customer">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" value="{{ $d->tgl_lahir }}"
                                            class="form-control" id="exampleInputEmail1">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer d-flex justify-content-end">
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
