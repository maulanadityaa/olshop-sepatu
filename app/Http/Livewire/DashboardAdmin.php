<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\Produk;

class DashboardAdmin extends Component
{
    public $products, $product_id, $nama, $harga, $berat, $stock, $gambar;
    public function mount(){
        if(Auth::user()){
            if(Auth::user()->level !== 1){
                return redirect()->to('login');
            }
        }
    }
    public function destroy($id){
        $product = Produk::find($id);
        $product->delete();

        return redirect()->to('dashboard');
        
    }
    public function render()
    {
        $this->products = Produk::all();

        return view('livewire.dashboard-admin')->extends('layouts.app')->section('content');
    }
}
