<div>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td><strong>No</strong></td>
                                <td><strong>Tanggal</strong></td>
                                <td><strong>Gambar</strong></td>
                                <td><strong>Nama Pemesan</strong></td>
                                <td><strong>Nama Produk</strong></td>
                                <td><strong>Total Harga</strong></td>
                                <td><strong>Kurir</strong></td>
                                <td><strong>Status</strong></td>
                                <td><strong>Aksi</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse ($pesanan as $pesan)
                                <tr>
                                    @php
                                        $belanja = \App\Models\Belanja::where('id', $pesan->belanja_id)->first();
                                        $user = \App\Models\User::where('id', $belanja->user_id)->first();
                                        $product = \App\Models\Produk::where('id', $belanja->produk_id)->first();
                                    @endphp
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesan->updated_at }}</td>
                                    <td>
                                        <img src="{{ asset('storage/photos/' . $product->gambar) }}" width="75px">
                                    </td>
                                    <td>
                                        <strong>{{ $user->email}}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $product->nama }}</strong>
                                    </td>
                                    <td>
                                        <strong>Rp. {{ number_format($pesan->total_harga) }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $pesan->kurir }}</strong>
                                    </td>
                                    <td>
                                        @if ($pesan->status == 'PENDING')
                                                <div class="badge bg-warning text-wrap">
                                                    {{ $pesan->status }}
                                                </div>
                                            
                                        @elseif ($pesan->status == 'SETTLEMENT')
                                                    <div class="badge bg-success text-white">
                                                        {{ $pesan->status }}
                                                    </div>
                                        @elseif ($pesan->status == 'EXPIRE')
                                                    <div class="badge bg-danger text-white">
                                                        {{ $pesan->status }}
                                                    </div>
                                                
                                        @endif
                                    </td>
                                    <td>
                                        <div class="container">
                                            <a href="#"
                                                class="btn btn-primary btn-block">EDIT</a>
                                            <a class="btn btn-danger btn-block"
                                                wire:click="destroy({{ $pesan->id }})"><i
                                                    class="far fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Tidak Ada Pesanan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
