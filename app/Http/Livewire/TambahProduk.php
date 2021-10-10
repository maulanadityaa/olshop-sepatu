<?php

namespace App\Http\Livewire;

use App\Models\Produk;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

use Livewire\Component;

class TambahProduk extends Component
{
    public $nama,$harga,$berat,$gambar,$stock;
    use WithFileUploads;
    public function mount(){
        if(Auth::user()){
            if(Auth::user()->level !== 1){
                return redirect()->to('');
            }
        }
    }
    public function store(){
        $this->validate(
            [
                'nama' => 'required|min:10',
                'harga' => 'required',
                'berat' => 'required',
                'stock' => 'required|numeric|min:3',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]
        );

        $nama_gambar = md5($this->gambar.microtime()).'.'.$this->gambar->extension();
        Storage::disk('public')->putFileAs('photos', $this->gambar, $nama_gambar);

        Produk::create(
            [
                'nama' => $this->nama,
                'harga' => $this->harga,
                'berat' => $this->berat,
                'stock' => $this->stock,
                'gambar' => $nama_gambar
            ]
        );

        $this->dispatchBrowserEvent('closeModal');
        $this->cleanVars();

        toast('Produk telah ditambahkan!','success');

        return redirect()->route('dashboard');
    }

    private function cleanVars(){
        $this->nama = null;
        $this->harga = null;
        $this->berat = null;
        $this->stock = null;
        $this->gambar = null;
    }
    
    public function render()
    {
        return view('livewire.tambah-produk')->extends('layouts.app')->section('content');
    }
}
