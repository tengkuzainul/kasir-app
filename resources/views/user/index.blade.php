@extends('layouts.index')
@section('title', 'Manajemen User')
@section('braedcrumb', 'Manajemen User')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manajemen User</h3>
                        <div class="d-flex justify-content-end">
                            <a href="" class="btn btn-info">Tambah Data
                                <i class="bi bi-plus-circle-fill"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 30px">No</th>
                                    <th>Nama User</th>
                                    <th>Email User</th>
                                    <th>Role User</th>
                                    <th style="width: 50px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->email }}</td>
                                        <td>
                                            @foreach ($d->roles->pluck('name') as $roleName)
                                                {{ $roleName }}
                                                @if (!$loop->last)
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('user.edit', $d->id) }}" class="btn btn-xs btn-warning"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <a href="" class="btn btn-xs btn-danger"><i
                                                    class="bi bi-trash3-fill"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 30px">No</th>
                                    <th>Nama User</th>
                                    <th>Email User</th>
                                    <th>Role User</th>
                                    <th style="width: 50px">Action</th>
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
