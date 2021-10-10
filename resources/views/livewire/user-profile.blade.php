<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-warning">
                    <div class="card-header bg-warning mb-3 text-dark text-center">USER PROFILE</div>
                    <div class="card-body">
                            <form wire:submit.prevent="update">
                                <div class="form-group">
                                    <div class="form-row mb-2">
                                        <div class="col">
                                            <input wire:model="first_name" type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                value="{{ $user->first_name }}">
                                            @error('first_name')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <input wire:model="last_name" type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                value="{{ $user->last_name }}">
                                            @error('last_name')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row mb-2">
                                        <div class="col">
                                            <input wire:model="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ $user->email }}">
                                            @error('email')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <input wire:model="phone" type="text"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                value="{{ $user->phone }}">
                                            @error('phone')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row mb-2">
                                        <div class="col">
                                            <label for="">Alamat</label>
                                            <textarea wire:model="address" id="" cols="30" rows="5"
                                                class="form-control @error('address') is-invalid @enderror"></textarea>
                                            @error('address')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row mb-2">
                                        <div class="col">
                                            <input wire:model="city" type="text"
                                                class="form-control @error('city') is-invalid @enderror"
                                                placeholder="Kota/Kabupaten">
                                            @error('city')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <input wire:model="postal_code" type="text"
                                                class="form-control @error('postal_code') is-invalid @enderror"
                                                placeholder="Kode Pos">
                                            @error('postal_code')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning btn-block">Submit</button>
                                </div>
                            </form>
                    </div>
                    <button class="btn btn-primary float-center" id="pay-button">Pilih Metode
                        Pembayaran</button>
            </div>
            {{-- <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> --}}
        </div>
    </div>
</div>
