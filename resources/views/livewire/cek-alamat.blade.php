<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card border-success" style="width: 32rem;">
                <div class="card-header bg-success mb-3 text-white text-center">{{ 'ALAMAT' }}</div>
                <div class="card-body">
                    <label for="address" class="col-md-12 col-form-label text-md-left">{{ 'Alamat' }}</label>
                    <input type="text" wire:model="address" class="form-control @error('address') is-invalid @enderror"
                        value="{{ $alamat->address }}" disabled readonly>
                    @error('address')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror

                    <label for="city" class="col-md-12 col-form-label text-md-left">{{ 'Kota' }}</label>
                    <input type="text" wire:model="city" class="form-control @error('city') is-invalid @enderror"
                        value="{{ $alamat->kota }}" disabled readonly>
                    @error('city')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror

                    <label for="postal_code" class="col-md-12 col-form-label text-md-left">{{ 'Kode Pos' }}</label>
                    <input type="number" wire:model="postal_code"
                        class="form-control @error('postal_code') is-invalid @enderror"
                        value="{{ $alamat->kode_pos }}" disabled readonly>
                    @error('postal_code')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror

                    <br><br>

                    <div class="col-md-6 align-self-center mx-auto">
                        <a href="{{ route('profile', Auth::user()->id) }}" class="btn btn-success btn-block">Ok</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
