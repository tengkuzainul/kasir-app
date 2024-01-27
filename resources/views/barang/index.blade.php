@extends('layouts.index')
@section('title', 'Kategori')
@section('braedcrumb', 'Kategori')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tables Kategori Barang</h3>
                        <div class="d-flex justify-content-end">
                            <a href="" class="btn btn-info" data-toggle="modal" data-target="#modalBarang">Tambah Data
                                <i class="bi bi-plus-circle-fill"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 30px">No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Kategori</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Stok Barang</th>
                                    <th style="width: 30px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->kd_barang }}</td>
                                        <td>{{ $d->nama_kategori }}</td>
                                        <td>{{ $d->nama_barang }}</td>
                                        <td>Rp. {{ $d->harga }}</td>
                                        <td>{{ $d->stok }}</td>
                                        <td>
                                            <a href="{{ route('barang.edit', $d->id) }}" class="btn btn-xs btn-warning"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <a href="{{ route('barang.delete', $d->id) }}" class="btn btn-xs btn-danger"><i
                                                    class="bi bi-trash3-fill"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 30px">No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Kategori</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Stok Barang</th>
                                    <th style="width: 30px">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    @include('barang.addForm')

    @push('cetak')
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["excel", "csv", "Excel", "pdf", "print"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    @endpush
@endsection
