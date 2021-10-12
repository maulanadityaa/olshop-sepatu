<div>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered border-secondary text-center">
                        <thead>
                            <tr>
                                <th scope="col"><strong>No</strong></th>
                                <th scope="col"><strong>Tanggal Pesan</strong></th>
                                <th scope="col"><strong>Gambar</strong></th>
                                <th scope="col"><strong>Nama Produk</strong></th>
                                <th scope="col"><strong>Status</strong></th>
                                <th scope="col"><strong>Total Harga</strong></th>
                                <th scope="col"><strong>Kurir</strong></th>
                                <th scope="col"><strong>Aksi</strong></th>
                                <th scope="col"><strong>Hapus</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse ($keranjang as $pesanan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesanan->created_at }}</td>
                                    <td>
                                        @php
                                            $produk = \App\Models\Produk::where('id', $pesanan->produk_id)->first();
                                        @endphp
                                        <img src="{{ asset('storage/photos/' . $produk->gambar) }}" width="75px">
                                    </td>
                                    <td>
                                        {{ $produk->nama }}
                                    </td>
                                    <td>
                                        @if ($pesanan->status == 0)
                                            <strong>Belum ditambahkan Ongkir</strong>
                                        @endif
                                        @if ($pesanan->status == 1)
                                            <strong>Sudah ditambahkan Ongkir</strong>
                                        @endif
                                        @if ($pesanan->status == 2)
                                            <strong>Sudah Memilih Pembayaran</strong>
                                        @endif
                                    </td>
                                    <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                                    <td><strong>{{ $pesanan->kurir }}</strong></td>
                                    <td>
                                        @if ($pesanan->status == 0)
                                            <a href="{{ route('tambah-ongkir', $pesanan->id) }}" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modalFormOngkir"><i class="fas fa-shipping-fast"></i>
                                                Tambah Ongkir</a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalFormOngkir" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><strong>Pilih Jasa Pengiriman Barang</strong>
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @livewire('tambah-ongkir', ['id' => $pesanan->id])
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($pesanan->status == 1)
                                            <a href="{{ route('checkout', $pesanan->id) }}"
                                                class="btn btn-primary btn-block"><i class="fas fa-file-invoice"></i> Checkout</a>
                                        @endif
                                        @if ($pesanan->status == 2)
                                            <a href="{{ url('bayar/' . $pesanan->id) }}"
                                                class="btn btn-success btn-block">Lihat Status</a>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-block"
                                            wire:click="destroy({{ $pesanan->id }})"><i
                                                class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Keranjang Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
