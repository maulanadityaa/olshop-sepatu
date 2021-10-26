<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <button class="nav-link btn btn-info" data-toggle="modal" data-target="#modalForm"><i
                                class="far fa-plus-square"></i>{{ ' Tambah Produk' }}</button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @livewire('tambah-produk')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        @php
                            $jumlah = \App\Models\Produk::all()->count();
                        @endphp
                        <div class="btn btn-light btn-lg disabled float-right" aria-disabled="true">Total Produk : {{ $jumlah }}</div>
                    </div>
                </div>
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
                                                wire:click="$emit('triggerDelete',{{ $product->id }})"><i
                                                    class="far fa-trash-alt"></i></a>
                                            {{-- <a class="btn btn-danger btn-block"
                                                wire:click="destroy({{ $product->id }})"><i
                                                    class="far fa-trash-alt"></i></a> --}}
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
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            @this.on('triggerDelete', productId => {
                Swal.fire({
                    title: 'Are You Sure?',
                    text: 'Product record will be deleted!',
                    icon: "warning",
                    customClass: 'swal-height',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Delete!'
                }).then((result) => {
                    //if user clicks on delete
                    if (result.value) {
                        // calling destroy method to delete
                        @this.call('destroy', productId)
                        // success response
                        Swal.fire({
                            title: 'Product deleted successfully!',
                            icon: 'success'
                        });
                    }
                });
            });
        })
    </script>
@endpush
