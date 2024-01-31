<div class="modal fade" id="modalReturn">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Return Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('returnBarang.save') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Barang</label>
                            <select name="barang_id" id="" class="form-control">
                                <option value="" selected disabled>-- Pilih Nama Barang --</option>
                                @foreach ($barang as $b)
                                    <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Barang</label>
                            <select name="customer" id="" class="form-control">
                                <option value="" selected disabled>-- Pilih Nama Customer --</option>
                                @foreach ($customer as $c)
                                    <option value="{{ $c->id }}">{{ $c->nama_customer }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alasan Return</label>
                            <input type="text" name="alasan" class="form-control" id="exampleInputEmail1"
                                placeholder="Alasan Return">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah</label>
                            <input type="number" name="qty" class="form-control" id="exampleInputEmail1"
                                placeholder="Jumlah Barang Return">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
