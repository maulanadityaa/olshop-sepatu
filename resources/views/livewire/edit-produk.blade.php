<div>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header">{{ 'Edit Produk' }}</div>
                    <div class="card-body">
                        <form wire:submit.prevent="update">
                            <input type="hidden" wire:model="product_id">
                            <label for="nama" class="col-md-12 col-form-label text-md-left">{{ 'Nama Produk' }}</label>
                            <input type="text" wire:model="nama" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
    
                            <label for="harga" class="col-md-12 col-form-label text-md-left">{{ 'Harga Produk' }}</label>
                            <input type="number" wire:model="harga" class="form-control @error('harga') is-invalid @enderror">
                            @error('harga')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
    
                            <label for="berat" class="col-md-12 col-form-label text-md-left">{{ 'Berat' }}</label>
                            <input type="number" wire:model="berat"
                                class="form-control @error('berat') is-invalid @enderror">
                            @error('berat')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                            
                            <label for="stock" class="col-md-12 col-form-label text-md-left">{{ 'Stock' }}</label>
                            <input type="number" wire:model="stock"
                                class="form-control @error('stock') is-invalid @enderror">
                            @error('stock')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
    
                            <label for="gambar"
                                class="col-md-12 col-form-label text-md-left">{{ 'Gambar Produk (*maks 2mb)' }}</label>
                            <input type="file" wire:model="gambar">
                            @error('gambar')
                                <span class="error">{{ $message }}</span>
                            @enderror
    
                            <br><br>
    
                            <div class="col-md-6 align-self-center mx-auto">
                                <button type="submit" class="btn btn-success btn-block">Edit Produk</button>
                            </div>
                        </form>
                    </div>
                    {{-- {{ $product }} --}}
                </div>
            </div>
        </div>
    </div>    
</div>