<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TambahProduk extends Component
{
    public function render()
    {
        return view('livewire.tambah-produk')->extends('layouts.app')->section('content');
    }
}
