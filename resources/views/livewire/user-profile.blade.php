<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-header bg-success mb-3 text-white text-center">USER PROFILE</div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="first_name">Nama Depan</label>
                                <input wire:model="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror"
                                    value="{{ $user->first_name }}" disabled readonly>
                                @error('first_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="last_name">Nama Belakang</label>
                                <input wire:model="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    value="{{ $user->last_name }}" disabled readonly>
                                @error('last_name')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <div class="col">
                                <label for="email">Email</label>
                                <input wire:model="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $user->email }}" disabled readonly>
                                @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="phone">No HP</label>
                                <input wire:model="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ $user->phone }}" disabled readonly>
                                @error('phone')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if ($user->alamat_status == 0)
                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalFormAlamat"><i
                                    class="far fa-plus-square"></i>{{ ' Tambah Alamat' }}</button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalFormAlamat" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Alamat
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @livewire('alamat-user')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($user->alamat_status == 1)
                            <a href="{{ route('cek-alamat', $user->id) }}" class="btn btn-success btn-block">Lihat
                                Alamat</a>
                        @endif
                    </div>
                </div>
            </div>
            {{-- <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> --}}
        </div>
    </div>
</div>
