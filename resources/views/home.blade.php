@extends('layouts.index')
@section('title', 'Dashboard')
@section('braedcrumb', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $users->count() }}</h3>

                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-person-fill mb-3"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $customer->count() }}</h3>

                        <p>Total Customers</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-person-vcard"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $barang->count() }}</h3>

                        <p>Total Barang</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-boxes"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $transaksi->count() }}</h3>

                        <p>Total Transaksi</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Customer Kasir App</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 30px">User</th>
                                    <th>Nama User</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                    <th>Tanggal Lahir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer as $c)
                                    <tr>
                                        <td><i class="bi bi-file-person-fill"></i></td>
                                        <td>{{ $c->nama_customer }}</td>
                                        <td>{{ $c->no_hp }}</td>
                                        <td>{{ $c->email_customer }}</td>
                                        <td>{{ $c->tgl_lahir }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>User</th>
                                    <th>Nama User</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                    <th>Tanggal Lahir</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection
