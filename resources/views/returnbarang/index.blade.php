@extends('layouts.index')
@section('title', 'Return Barang')
@section('braedcrumb', 'Return Barang')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tables Return Barang</h3>
                        <div class="d-flex justify-content-end">
                            @hasrole('kasir')
                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#modalReturn">Tambah Data
                                    <i class="bi bi-plus-circle-fill"></i></a>
                            @endhasrole
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 30px">No</th>
                                    <th>Nama Customer</th>
                                    <th>Nama Barang</th>
                                    <th>Alasan</th>
                                    <th>Jumlah</th>
                                    <th style="width: 30px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->nama_customer }}</td>
                                        <td>{{ $d->nama_barang }}</td>
                                        <td>{{ $d->alasan }}</td>
                                        <td>{{ $d->qty }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('returnBarang.delete', ['id' => $d->id]) }}"
                                                class="btn btn-xs btn-danger"><i class="bi bi-trash3-fill"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 30px">No</th>
                                    <th>Nama Customer</th>
                                    <th>Nama Barang</th>
                                    <th>Alasan</th>
                                    <th>Jumlah</th>
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

    @include('returnbarang.addForm')

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
