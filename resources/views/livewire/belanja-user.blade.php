<div>
    <div class="container">
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td><strong>No</strong>r</td>
                                <td><strong>Tanggal Pesan</strong></td>
                                <td><strong>Nama Produk</strong></td>
                                <td><strong>Status</strong></td>
                                <td><strong>Total Harga</strong></td>
                                <td><strong>Aksi</strong></td>
                                <td><strong>Hapus</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @forelse ($keranjang as $pesanan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesanan->created_at }}</td>
                                    <td>
                                        @php
                                            $produk = \App\Models\Produk::where('id', $pesanan->produk_id)->first();
                                        @endphp
                                        <img src="{{ asset('storage/photos/'.$produk->gambar) }}" width="60px">
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
                                    <td>
                                        @if ($pesanan->status == 0)
                                            <a href="{{ url('tambah-ongkir/' . $pesanan->id) }}"
                                                class="btn btn-warning btn-block">Tambah Ongkir</a>
                                        @endif
                                        @if ($pesanan->status == 1)
                                            <a href="{{ url('bayar/' . $pesanan->id) }}"
                                                class="btn btn-primary btn-block">Pilih
                                                Pembayaran</a>
                                        @endif
                                        @if ($pesanan->status == 2)
                                            <a href="{{ url('bayar/' . $pesanan->id) }}"
                                                class="btn btn-success btn-block">Lihat Status</a>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-block"
                                            wire:click="destroy({{ $pesanan->id }})">Hapus</button>
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
