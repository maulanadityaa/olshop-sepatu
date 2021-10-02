<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produk;

class Home extends Component
{
    public $products = [];
    public $search, $min, $max;
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
