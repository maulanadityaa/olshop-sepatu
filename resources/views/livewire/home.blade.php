<div>
    <div class="align-self-center">
        <div class="mx-auto">
            <div class="row justify-content-center">
                <div class="container-md">
                    <div class="input-group mb-3">
                        <input type="text" wire:model="search" class="form-control" placeholder="Cari produk...">
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" wire:model="min" class="form-control" placeholder="Harga minimal...">
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" wire:model="max" class="form-control" placeholder="Harga maksimal...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="products">
        <div class="container-md">
            @foreach ($products as $product)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage/photos/' . $product->gambar) }}" width="250px" height="250px">
                            <div class="row-mt-2">
                                <div class="col-md-12">
                                    <h5><strong>{{ $product->nama }}</strong></h5>
                                    <h6><strong>Rp. {{ number_format($product->harga) }}</strong></h6>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <button class="btn btn-success btn-block"
                                        wire:click="beli({{ $product->id }})">Beli</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- {{ dd($products->toArray()) }} --}}
    </section>
</div>
