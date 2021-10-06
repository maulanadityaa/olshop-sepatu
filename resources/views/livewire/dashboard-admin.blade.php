<div>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col">
                <a class="nav-link btn btn-info" href="{{ url('tambah-produk') }}"><i
                        class="far fa-plus-square"></i>{{ ' Tambah Produk' }}</a>
                <br>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td><strong>No</strong></td>
                                <td><strong>Gambar</strong></td>
                                <td><strong>Nama Produk</strong></td>
                                <td><strong>Total Harga</strong></td>
                                <td><strong>Berat</strong></td>
                                <td><strong>Stok</strong></td>
                                <td><strong>Aksi</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <img src="{{ asset('storage/photos/' . $product->gambar) }}" width="75px">
                                    </td>
                                    <td>
                                        <strong>{{ $product->nama }}</strong>
                                    </td>
                                    <td>
                                        <strong>Rp. {{ number_format($product->harga) }}</strong>
                                    </td>
                                    </td>
                                    <td>
                                        <strong>{{ $product->berat }} gram</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $product->stock }} pasang</strong>
                                    </td>
                                    <td>
                                        <div class="container">
                                            <a href="{{ route('edit-produk', $product->id) }}"
                                                class="btn btn-primary btn-block">EDIT</a>
                                            <a class="btn btn-danger btn-block"
                                                wire:click="destroy({{ $product->id }})"><i
                                                    class="far fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Produk Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
