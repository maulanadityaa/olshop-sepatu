<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-warning">
                <div class="card-header bg-warning mb-3 text-dark text-center">STATUS</div>
                <div class="card">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col">
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
                                        <td>Rp. {{ number_format($gross_amount) }}</td>
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
                                        <td>{{ $resi }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
