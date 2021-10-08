<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Belanja;

use function GuzzleHttp\json_decode;

class Checkout extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $postal_code;
    public $formCheckout;
    public $snapToken;
    public $pesanan_id, $nama, $total_harga, $berat, $gambar, $stock;
    public $pesanan;
    public $va_number, $gross_amount, $bank, $transaction_status, $deadline;

    // protected $listeners = [
    //     'emptyCart' => 'emptyCartHandler'
    // ];

    public function mount($id)
    {
        if(isset($_GET['result_data'])){
            $current_status = json_decode($_GET['result_data'], true);
            $order_id = $current_status['order_id'];
            $this->pesanan =  Belanja::findorFail($id);
            $this->pesanan->status = 2;
            $this->pesanan->update();
        }
        else{
            $this->formCheckout = true;
    
            $this->pesanan = Belanja::findorFail($id);
            if ($this->pesanan) {
                $this->pesanan_id = $this->pesanan->id;
                $this->nama = $this->pesanan->nama;
                $this->total_harga = $this->pesanan->total_harga;
                $this->berat = $this->pesanan->berat;
                $this->gambar = $this->pesanan->gambar;
                $this->stock = $this->pesanan->stock;
            }
            // dd($pesanan);
        }
    }

    public function checkout()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required'
        ]);

        // $cart = Cart::get()['products'];
        // $amount = array_sum(
        //     array_column($cart, 'price')
        // );

        if (!empty($this->pesanan)) {
            if ($this->pesanan->status == 1) {
                $customerDetails = [
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'address' => $this->address,
                    'city' => $this->city,
                    'postal_code' => $this->postal_code
                ];

                $transactionDetails = [
                    'order_id' => $this->pesanan_id,
                    'gross_amount' => $this->total_harga
                ];

                // dd($this->harga);

                $payload = [
                    'transaction_details' => $transactionDetails,
                    'customer_details' => $customerDetails
                ];

                $this->formCheckout = false;

                // Set your Merchant Server Key
                \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = false;
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;

                // dd(\Midtrans\Config::$serverKey = config('services.midtrans.serverKey'));
                $snapToken = \Midtrans\Snap::getSnapToken($payload);

                $this->snapToken = $snapToken;
            } elseif ($this->pesanan->status == 2) {
                $status = \Midtrans\Transaction::status($this->pesanan->id);
                $status = json_decode(json_encode($status), true);
                dd($status);

                $this->va_number = $status['va_numbers'][0]['va_number'];
                $this->gross_amount = $status['gross_amount'];
                $this->bank = $status['va_numbers'][0]['bank'];
                $this->transaction_status = $status['transaction_status'];
                $transaction_time = $status['transaction_time'];
                $this->deadline = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($transaction_time)));
            }
        }
    }

    // public function emptyCartHandler()
    // {
    //     Cart::clear();
    //     $this->emit('cartClear');
    // }
    public function render()
    {
        return view('livewire.checkout')->extends('layouts.app')->section('content');
    }
}
