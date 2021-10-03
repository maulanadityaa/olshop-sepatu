<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\Produk;
use App\Models\Belanja;

class Home extends Component
{
    public $products = [];
    public $search, $min, $max;

    public function beli($id){
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $produk = Produk::find($id);

        Belanja::create(
            [
                'user_id' => Auth::user()->id,
                'produk_id' => $produk->id,
                'total_harga' => $produk->harga,
                'status' => 0
            ]
        );

        return redirect()->to('keranjang');
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
            $this->products = Produk::where('nama', 'like', '%' . $this->search . '%')
                                        ->where('harga', '>=', $harga_min)
                                        ->where('harga', '<=', $harga_max)->get();
        } else{
            $this->products = Produk::where('harga', '>=', $harga_min)
                                        ->where('harga', '<=', $harga_max)->get();
        }
        return view('livewire.home')->extends('layouts.app')->section('content');
    }
}
