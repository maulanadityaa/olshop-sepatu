<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\Produk;
use App\Models\Belanja;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class Home extends Component
{
    use WithPagination;
    public $search, $min, $max;

    // public function acak($panjang)
    // {
    //     $karakter = '123456789';
    //     $string = '';
    //     for ($i = 0; $i < $panjang; $i++) {
    //         $pos = rand(0, strlen($karakter) - 1);
    //         $string .= $karakter{$pos};
    //     }
    //     return $string;
    // }

    public function mount()
    {
        if(Auth::user()){
            if(!Auth::user()->email_verified_at){
                Alert::warning('Email Verification', 'Cek Email Anda untuk Konfirmasi Akun');
            }
        }
            // dd(Auth::user()->email_verified_at);
    }

    public function beli($id)
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $produk = Produk::find($id);

        $produk->stock = $produk->stock - 1;
        $produk->save();

        $belanja_id = mt_srand(8);
        // dd($belanja_id);
        Belanja::create(
            [
                'id' => $belanja_id,
                'user_id' => Auth::user()->id,
                'produk_id' => $produk->id,
                'total_harga' => $produk->harga,
                'status' => 0
            ]
        );

        toast('Produk telah ditambahkan ke keranjang!','success')->timerProgressBar();

        return redirect()->to('');
    }

    public function render()
    {
        if ($this->max) {
            $harga_max = $this->max;
        } else {
            $harga_max = 9999999999999;
        }

        if ($this->min) {
            $harga_min = $this->min;
        } else {
            $harga_min = 0;
        }

        if ($this->search) {
            $products = Produk::where('nama', 'like', '%' . $this->search . '%')
                ->where('harga', '>=', $harga_min)
                ->where('harga', '<=', $harga_max)
                ->where('stock', '>=', 1)
                ->paginate(6);
        } else if ($this->min || $this->max) {
            $products = Produk::where('harga', '>=', $harga_min)
                ->where('harga', '<=', $harga_max)
                ->where('stock', '>=', 1)
                ->paginate(6);
        } else {
            $products = Produk::where('stock', '>=', 1)
                ->latest()
                ->paginate(6);
        }
        return view('livewire.home', [
            'products' => $products
        ])->extends('layouts.appHome')->section('content');
    }
}
