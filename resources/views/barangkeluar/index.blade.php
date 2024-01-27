@extends('layouts.index')
@section('title', 'Barang Keluar')
@section('braedcrumb', 'Barang Keluar')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tables Barang Keluar</h3>
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
                                    <th>Nama Kategori</th>
                                    <th>Qty</th>
                                    <th style="width: 30px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangKeluar as $bm)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bm->nama_barang }}</td>
                                        <td>{{ $bm->qty }}</td>
                                        <td>
                                            {{-- <a href="" class="btn btn-xs btn-warning"><i
                                                    class="bi bi-pencil-square"></i></a> --}}
                                            <form action="{{ route('barangMasuk.delete', $bm->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-xs btn-danger"><i
                                                        class="bi bi-trash3-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 30px">No</th>
                                    <th>Nama Kategori</th>
                                    <th>Qty</th>
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

    @include('barangkeluar.add')

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
