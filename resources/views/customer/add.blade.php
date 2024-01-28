<div class="modal fade" id="customer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customer.save') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Customer</label>
                            <input type="text" name="nama_customer" class="form-control" id="exampleInputEmail1"
                                placeholder="Nama Customer">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Handphone</label>
                            <input type="number" name="no_hp" class="form-control" id="exampleInputEmail1"
                                placeholder="No Hp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">email Customer</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                placeholder="Email Customer">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
