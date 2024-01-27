<div class="modal fade" id="modalBarang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Barang Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('barangMasuk.save') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori Barang</label>
                            <select name="barang_id" id="" class="form-control">
                                <option value="" selected disabled>-- Pilih Kategori Barang --</option>
                                @foreach ($barang as $b)
                                    <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Qty</label>
                            <input type="number" name="qty" class="form-control" id="exampleInputEmail1"
                                placeholder="qty">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Masuk</label>
                            <input type="date" name="tglmasuk" class="form-control" id="exampleInputEmail1"
                                placeholder="Harga Barang">
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
