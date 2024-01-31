@extends('layouts.index')
@section('title', 'Transaksi')
@section('braedcrumb', 'Transaksi')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tables Transaksi</h3>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('transaksi.create') }}" class="btn btn-info">Tambah Data
                                <i class="bi bi-plus-circle-fill"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 20px">No</th>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Qantity</th>
                                    <th>Harga</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $b)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $b->name }}</td>
                                        <td>{{ $b->kd_transaksi }}</td>
                                        <td>{{ date('d/M/Y', strtotime($b->created_at)) }}</td>
                                        <td>RP. {{ number_format($b->total_harga) }}</td>
                                        <td>
                                            <a href="#" target="_blank" class="btn btn-xs btn-info"><i
                                                    class="bi bi-printer-fill"></i></a>
                                            <a href="{{ route('transaksi.delete', ['id' => $b->id]) }}"
                                                class="btn btn-xs btn-danger"><i class="bi bi-trash3-fill"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 20px">No</th>
                                    <th>User Input</th>
                                    <th>No Transaksi</th>
                                    <th>Tanggal</th>
                                    <th>Total Harga</th>
                                    <th>Action</th>
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
