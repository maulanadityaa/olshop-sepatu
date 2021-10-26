<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-warning">
                <div class="card-header bg-warning mb-3 text-dark text-center">EDIT PESANAN</div>
                <div class="card">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col">
                                <form wire:submit.prevent="update">
                                    <input type="hidden" wire:model="checkout_id">
                                    <table class="table" style="border-top : hidden">
                                        {{-- @php
                            $checkout = \App\Models\Checkout::where('belanja_id', $pesanan->id)->first();
                        @endphp --}}
                                        <tr>
                                            <td>Virtual Akun</td>
                                            <td>:</td>
                                            <td>{{ $va_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bank</td>
                                            <td>:</td>
                                            <td>{{ $bank }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Harga</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($total_harga) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            @if ($status == 'PENDING')
                                                <td>
                                                    <div class="badge bg-warning text-wrap">
                                                        {{ $status }}
                                                    </div>
                                                </td>
                                            @elseif ($status == 'SETTLEMENT')
                                                <td>
                                                    <div class="badge bg-success text-white">
                                                        {{ $status }}
                                                    </div>
                                                </td>
                                            @elseif ($status == 'EXPIRE')
                                                <td>
                                                    <div class="badge bg-danger text-white">
                                                        {{ $status }}
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Batas Waktu Pembayaran</td>
                                            <td>:</td>
                                            <td>{{ $deadline }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jasa Pengiriman</td>
                                            <td>:</td>
                                            <td>{{ $kurir }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Resi</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" wire:model="resi"
                                                    class="form-control @error('resi') is-invalid @enderror">
                                                @error('resi')
                                                    <span class="invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="col-md-6 align-self-center mx-auto">
                                        <button type="submit" class="btn btn-success btn-block"><i
                                                class="far fa-paper-plane"></i> Submit</button>
                                    </div><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
