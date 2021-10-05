<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\Produk;

class EditProduk extends Component
{
    public $product_id,$nama,$harga,$berat,$gambar,$stock;
    //private $produk_id;

    public function mount($id){
        $product = Produk::find($this->$id);

        if ($product) {
            $this->product_id = $product->id;
            $this->nama = $product->nama;
            $this->harga = $product->harga;
            $this->berat = $product->berat;
            $this->gambar = $product->gambar;
            $this->stock = $product->stock;
        }
    }
    public function update(){
        $this->validate(
            [
                'nama' => 'required|min:10',
                'harga' => 'required',
                'berat' => 'required',
                'stock' => 'required|numeric|min:3',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]
        );

        if($this->product_id){
            $product = Produk::find($this->product_id);

            if($product){
                $product->update([
                    'nama' => $this->nama,
                    'gambar' => $this->gambar,
                    'berat' => $this->berat,
                    'harga' => $this->harga,
                    'stock' => $this->stock,
                ]);
            }

            return redirect()->to('dashboard');
        }
    }
    public function render()
    {
        return view('livewire.edit-produk')->extends('layouts.app')->section('content');
    }
}
