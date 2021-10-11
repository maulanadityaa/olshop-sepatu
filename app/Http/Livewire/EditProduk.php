<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use App\Models\Produk;
use Livewire\WithFileUploads;

class EditProduk extends Component
{
    public $product_id, $nama, $harga, $berat, $gambar, $stock;
    use WithFileUploads;

    public function mount($id)
    {
        if(Auth::user()){
            if(Auth::user()->level !== 1){
                return redirect()->to('');
            }
        }
        
        $product = Produk::findorFail($id);
        if ($product) {
            $this->product_id = $product->id;
            $this->nama = $product->nama;
            $this->harga = $product->harga;
            $this->berat = $product->berat;
            $this->gambar = $product->gambar;
            $this->stock = $product->stock;
        }
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'nama' => 'required|min:10',
            'harga' => 'required',
            'berat' => 'required',
            'stock' => 'required|numeric|min:3',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    public function update()
    {
        $this->validate(
            [
                'nama' => 'required|min:10',
                'harga' => 'required',
                'berat' => 'required',
                'stock' => 'required|numeric|min:3',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]
        );
        if($this->product_id) {

            $product = Produk::findOrFail($this->product_id);
            
            $nama_gambar = md5($this->gambar.microtime()).'.'.$this->gambar->extension();
            Storage::disk('public')->putFileAs('photos', $this->gambar, $nama_gambar);

            if($product) {
                $product->update([
                    'nama' => $this->nama,
                    'gambar' => $nama_gambar,
                    'berat' => $this->berat,
                    'harga' => $this->harga,
                    'stock' => $this->stock,
                ]);
            }
        }

        toast('Produk telah diedit!','success');
        return redirect()->route('dashboard');
        // return dd($this->productId);
    }
    public function render()
    {
        return view('livewire.edit-produk')->extends('layouts.app')->section('content');
    }
}
