<?php

namespace App\Http\Livewire;

use App\Models\Belanja;
use Illuminate\Support\Facades\Auth;

use App\Models\Checkout;
use Livewire\Component;

class StatusPesanan extends Component
{
    public $checkout;
    public $va_number, $gross_amount, $bank, $status, $deadline, $resi, $kurir;
    public $statusNew;

    public function mount($id)
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        $status = \Midtrans\Transaction::status($id);
        $status = json_decode(json_encode($status), true);
        //dd($status);

        $this->va_number = $status['va_numbers'][0]['va_number'];
        $this->gross_amount = $status['gross_amount'];
        $this->bank = strtoupper($status['va_numbers'][0]['bank']);
        $this->status = strtoupper($status['transaction_status']);
        $transaction_time = $status['transaction_time'];
        $this->deadline = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($transaction_time)));
        
        $checkout = Checkout::where('belanja_id', $id)->first();
        $belanja = Belanja::where('id', $id)->first();

        //dd($belanja->kurir);

        if(strtolower($this->status) != 'pending'){
            $this->statusNew = $this->status;

            if($checkout){
                $checkout->update([
                    'status' => $this->statusNew,
                    'kurir' => $belanja->kurir
                ]);
                $belanja->update([
                    'status' => 3
                ]);
            }
        }

        if ($checkout) {
            $checkout->update([
                'kurir' => $belanja->kurir
            ]);
            $this->resi = $checkout->resi;
            $this->kurir = $checkout->kurir;
        }
    }

    public function render()
    {
        return view('livewire.status-pesanan')->extends('layouts.app')->section('content');
    }
}
