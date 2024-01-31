@extends('layouts.index')
@section('title', 'Invoice Transaksi')
@section('braedcrumb', 'Invoice Transaksi')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cetak Invoice Transaksi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Qantity</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksiItems as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>Rp. {{ number_format($item->harga) }}</td>
                                        <td>#</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td class="font-weight-bold">
                                        @php
                                            $totalHarga = 0;
                                            foreach ($transaksiItems as $item) {
                                                $totalHarga += $item->qty * $item->harga;
                                            }
                                        @endphp
                                        Rp. {{ number_format($totalHarga) }}
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Qantity</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
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
