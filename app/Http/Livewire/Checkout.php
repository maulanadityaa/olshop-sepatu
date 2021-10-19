<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use App\Models\Alamat;
use Livewire\Component;
use App\Models\Belanja;
use App\Models\User;

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
    public $user, $alamat;

    // protected $listeners = [
    //     'emptyCart' => 'emptyCartHandler'
    // ];

    public function mount($id)
    {
        if(isset($_GET['result_data'])){
            $current_status = json_decode($_GET['result_data'], true);
            $order_id = $current_status['order_id'];
            $this->pesanan =  Belanja::where('id', $order_id)->first();
            $this->pesanan->status = 2;
            $this->pesanan->update();

            if ($this->pesanan->status == 2) {
                \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
                $status = \Midtrans\Transaction::status($this->pesanan->id);
                $status = json_decode(json_encode($status), true);
                //dd($status);

                $this->va_number = $status['va_numbers'][0]['va_number'];
                $this->gross_amount = $status['gross_amount'];
                $this->bank = $status['va_numbers'][0]['bank'];
                $this->transaction_status = $status['transaction_status'];
                $transaction_time = $status['transaction_time'];
                $this->deadline = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($transaction_time)));
            }
        }
        else{
            $this->formCheckout = true;
    
            $this->alamat = Alamat::where('user_id', Auth::user()->id)->first();
            $this->user = User::findorFail(Auth::user()->id);
            $this->pesanan = Belanja::findorFail($id);
            // dd($this->user);
            if ($this->pesanan && $this->alamat && $this->user) {
                $this->first_name = $this->user->first_name;
                $this->last_name = $this->user->last_name;
                $this->email = $this->user->email;
                $this->phone = $this->user->phone;
                $this->address = $this->alamat->address;
                $this->city = $this->alamat->kota;
                $this->postal_code = $this->alamat->kode_pos;
                $this->pesanan_id = $this->pesanan->id;
                $this->nama = $this->pesanan->nama;
                $this->total_harga = $this->pesanan->total_harga;
                $this->berat = $this->pesanan->berat;
                $this->gambar = $this->pesanan->gambar;
                $this->stock = $this->pesanan->stock;
            }

            alert()->info('Checkout','Untuk mengganti alamat pengiriman silahkan mengubah alamat pada halaman profil')->width('720px');
            // dd($pesanan);
        }
    }

    public function checkout()
    {
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
