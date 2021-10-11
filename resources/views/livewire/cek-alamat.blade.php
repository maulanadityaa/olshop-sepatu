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

                    {{-- {{ dd($alamat->id) }} --}}
                    <div class="align-self-center mx-auto">
                        <a href="{{ route('profile', Auth::user()->id) }}" class="btn btn-success btn-block"><i
                                class="far fa-check-circle"></i> Ok</a>
                        <button class="btn btn-primary btn-block" data-toggle="modal"
                            data-target="#modalFormEditAlamat-{{ $alamat->id }}"><i
                                class="far fa-edit"></i>{{ ' Edit Alamat' }}</button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalFormEditAlamat-{{ $alamat->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Alamat
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @livewire('edit-alamat', ['id' => $alamat->id])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
