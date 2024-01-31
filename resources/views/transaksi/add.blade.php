@extends('layouts.index')
@section('title', 'Tambah Data Transaksi')
@section('braedcrumb', 'Tambah Data Transaksi')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('transaksi.save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-10">
                                    <div class="form-group">
                                        <label for="id_daftar">Daftar Barang</label>
                                        <select class="form-control" id="id_daftar">
                                            @foreach ($barang as $b)
                                                <option value="{{ $b->id }}" data-nama="{{ $b->nama_barang }}"
                                                    data-harga="{{ $b->harga }}" data-id="{{ $b->id }}">
                                                    {{ $b->nama_barang }} | Rp. {{ number_format($b->harga) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="">&nbsp;</label>
                                        <button type="button" class="btn btn-info d-block" onclick="tambahItem()">
                                            <i class="bi bi-check-circle-fill"></i> Tambah Barang
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-hover table-bordered table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Qantity</th>
                                            <th>Harga</th>
                                            <th>#</th>
                                        </thead>
                                        <tbody class="transaksiItem">

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2">Jumlah</th>
                                                <th class="quantity">0</th>
                                                <th class="totalHarga">0</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="total_harga" value="0">
                                    <button class="btn btn-success"><i class="bi bi-cart-check"></i> Simpan
                                        Transaksi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('js')
    <script>
        var totalHarga = 0;
        var quantity = 0;
        var listBarang = [];

        // function untuk mengambil data barang yang akan ditambahkan
        function tambahItem() {
            updateTotalHarga(parseInt($('#id_daftar').find(':selected').data('harga')));
            var barang = listBarang.filter((el) => el.id_daftar === $('#id_daftar').find(':selected').data('id'));
            if (barang.length > 0) {
                barang[0].quantity += 1;
            } else {
                var item = {
                    id_daftar: $('#id_daftar').find(':selected').data('id'),
                    nama: $('#id_daftar').find(':selected').data('nama'),
                    harga: $('#id_daftar').find(':selected').data('harga'),
                    quantity: 1,
                };
                listBarang.push(item);
            }
            updateQuantity(1);
            updateTable();
        }

        // function untuk menambahkan data barang yang di select untuk ditampilkan di tabel <tbody></tbody>
        function updateTable() {
            var html = '';
            listBarang.map((el, index) => {
                var harga = formatRupiah(el.harga.toString());
                var quantity = formatRupiah(el.quantity.toString());
                html += `
            <tr>
                <td>${index + 1}</td>    
                <td>${el.nama}</td>    
                <td>${quantity}</td>    
                <td>${harga}</td>
                <td>
                    <input type="hidden" name="id_daftar[]" value="${el.id_daftar}">    
                    <input type="hidden" name="quantity[]" value="${el.quantity}">
                    <button type="button" onClick="deleteBarang(${index})" class="btn btn-link">
                        <i class="bi bi-trash3-fill text-danger"></i>    
                    </button>    
                </td>    
            </tr>
            `;
            });
            $('.transaksiItem').html(html);
        }

        // function Delete item Barang dan bisa mengurangi qty dari table
        function deleteBarang(index) {
            var barang = listBarang[index];
            if (barang.quantity > 1) {
                listBarang[index].quantity -= 1;
                updateTotalHarga(-(barang.harga));
                updateQuantity(-1);
            } else {
                listBarang.splice(index, 1);
                updateTotalHarga(-(barang.harga * barang.quantity));
                updateQuantity(-(barang.quantity));
            }
            updateTable();
        }

        // function untuk melakukan update harga ketika di select
        function updateTotalHarga(nom) {
            totalHarga += nom;
            $('[name=total_harga]').val(totalHarga);
            $('.totalHarga').html(formatRupiah(totalHarga.toString()));
        }

        // function untuk menambahkan quantity (seberapa banyak barang yang ditambahkan) dari barang yang di select
        function updateQuantity(nom) {
            quantity += nom;
            $('.quantity').html(formatRupiah(quantity.toString()));
        }
    </script>

@endsection
