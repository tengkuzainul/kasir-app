@extends('layouts.index')
@section('title', 'Laporan Transaksi')
@section('braedcrumb', 'Laporan Transaksi')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Transaksi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 20px">No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->kd_transaksi }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->qty }}</td>
                                        <td>{{ $d->harga }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th style="width: 20px">No</th>
                                <th>Kode Transaksi</th>
                                <th>Nama Barang</th>
                                <th>Quantity</th>
                                <th>Harga</th>
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
