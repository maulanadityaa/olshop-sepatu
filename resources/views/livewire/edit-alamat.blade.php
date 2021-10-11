<div>
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="card border-success" style="width: 18rem;">
                <div class="card-header bg-success mb-3 text-white text-center">{{ 'EDIT ALAMAT' }}</div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <input type="hidden" wire:model="alamat_id">
                        <label for="address" class="col-md-12 col-form-label text-md-left">{{ 'Alamat' }}</label>
                        <textarea type="text" wire:model="address" class="form-control @error('address') is-invalid @enderror"></textarea>
                        @error('address')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror

                        <label for="city" class="col-md-12 col-form-label text-md-left">{{ 'Kota' }}</label>
                        <input type="text" wire:model="city" class="form-control @error('city') is-invalid @enderror">
                        @error('city')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror

                        <label for="postal_code" class="col-md-12 col-form-label text-md-left">{{ 'Kode Pos' }}</label>
                        <input type="number" wire:model="postal_code"
                            class="form-control @error('postal_code') is-invalid @enderror">
                        @error('postal_code')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror

                        <br><br>

                        <div class="col-md-6 align-self-center mx-auto">
                            <button type="submit" class="btn btn-success btn-block"><i class="far fa-paper-plane"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
