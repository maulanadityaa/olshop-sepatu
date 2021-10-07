<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ 'Tambah Ongkir' }}</div>
                <div class="card-body">
                    <form wire:submit.prevent="getOngkir">

                        <label for="provinsi" class="col-md-12 col-form-label text-md-left">{{ 'Provinsi' }}</label>
                        <select name="provinsi" wire:model="idProvinsi" class="form-control">
                            <option value="0">-Pilih Provinsi-</option>
                            @forelse ($daftarProv as $provinsi)
                                <option value="{{ $provinsi['province_id'] }}">{{ $provinsi['province'] }}</option>
                            @empty
                                <option value="0">Provinsi Tidak Ada</option>
                            @endforelse
                        </select>

                        <label for="kota" class="col-md-12 col-form-label text-md-left">{{ 'Kabupaten/Kota' }}</label>
                        <select name="kota" wire:model="idKota" class="form-control">
                            {{ $idProvinsi }}
                            <option value="0">-Pilih Kabupaten/Kota-</option>
                            @if ($idProvinsi)
                                @forelse ($daftarKota as $kota)
                                    <option value="{{ $kota['city_id'] }}">{{ $kota['city_name'] }}</option>
                                @empty
                                    <option value="0">Kabupaten/KotaTidak Ada</option>
                                @endforelse
                            @endif
                            
                        </select>

                        <label for="jasa" class="col-md-12 col-form-label text-md-left">{{ 'Nama Jasa' }}</label>
                        <select name="jasa" wire:model="jasa" class="form-control">
                            <option value="">-Pilih Nama Jasa Pengiriman-</option>
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">Pos Indonesia</option>
                        </select>

                        <br><br>

                        <div class="col-md-6 align-self-center mx-auto">
                            <button type="submit" class="btn btn-primary btn-block">Cek Ongkir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if ($result)
            <section class="products mb-5">
                <div class="row mt-4">
                    @forelse ($result as $res)
                        <div class="container-md">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div><h5>{{ $nama_jasa }}</h5></div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <h5><strong>Rp. {{ number_format($res['biaya']) }}</strong></h5>
                                            <h6><strong>{{ $res['etd'] }} Hari</strong></h6>
                                            <h6><strong>{{ $res['description'] }}</strong></h6>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <button class="btn btn-success btn-block" wire:click="saveOngkir({{ $res['biaya'] }})">
                                            Pilih
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    @empty
                        <div class="container">
                            <div><h6><strong>Tidak Ada Jasa Pengiriman</strong></h6></div>
                        </div>
                    @endforelse
                </div>
            </section>
        @endif
    </div>
</div>
