<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-warning">
                @if ($pesanan->status == 1)
                    <div class="card-header bg-warning mb-3 text-dark text-center">CHECKOUT</div>

                    <div class="card-body">
                        @if ($formCheckout)
                            <form wire:submit.prevent="checkout">
                                <div class="form-group">
                                    <div class="form-row mb-2">
                                        <div class="col">
                                            <input wire:model="first_name" type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                placeholder="Nama Depan">
                                            @error('first_name')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <input wire:model="last_name" type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                placeholder="Nama Belakang">
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
                                                placeholder="Email">
                                            @error('email')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col">
                                            <input wire:model="phone" type="text"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="No. HP">
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
                @else
                    <button class="btn btn-primary float-center" id="pay-button">Pilih Metode
                        Pembayaran</button>
                @endif
            @elseif ($pesanan->status == 2)
                <div class="card-header bg-warning mb-3 text-dark text-center">STATUS PESANAN</div>

                <div class="card-body">

                </div>
                @endif
                <form id="payment-form" method="get" action="payment">
                    {{-- <input type="hidden" name="result_type" id="result-type" value=""></div> --}}
                    <input type="hidden" name="result_data" id="result-data" value=""></div>
                </form>
            </div>
            {{-- <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> --}}
        </div>
            
        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                var resultData = document.getElementById('result-data');
                var resultType = document.getElementById('result-type');

                function changeResult(type, data){
                    $('#result-type').val(type);
                    $('#result-data').val(JSON.stringify(data));
                    // resultType.innerHTML = type;
                    // resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result){
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result){
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onPending: function(result){
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            };
        </script>
    </div>
</div>
