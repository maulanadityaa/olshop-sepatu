<div>
    <div class="align-self-center">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide rounded" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../assets/carousel-1.jpg" class="d-block w-100 rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/carousel-2.jpg" class="d-block w-100 rounded-lg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/carousel-3.jpg" class="d-block w-100 rounded-lg" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <br><br>
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
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @forelse ($products as $product)
                    <div class="col-sm-4">
                        <div class="card border-0 mb-3">
                            <div class="card-header text-white bg-success mb-3">Sepatu</div>
                            <div class="card-body text-center shadow p-3 mb-5 bg-body rounded-5">
                                <img src="{{ asset('storage/photos/' . $product->gambar) }}" class="img-fluid">
                                <div class="row-mt-2">
                                    <div class="col-md-12">
                                        <h5><strong>{{ $product->nama }}</strong></h5>
                                        <h6><strong>Rp. {{ number_format($product->harga) }}</strong></h6>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <button class="btn btn-success btn-block"
                                            wire:click="beli({{ $product->id }})">+ Keranjang <i
                                                class="fas fa-cart-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container">
                        <div class="text-center">
                            <strong>Produk yang Kamu Cari Tidak Ada</strong>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>
{{-- {{ dd($products->toArray()) }} --}}
