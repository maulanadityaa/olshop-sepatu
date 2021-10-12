<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\Produk;
use Alert;

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

        toast('Produk telah dihapus!','success')->timerProgressBar();

        return redirect()->route('dashboard');
        
    }
    public function render()
    {
        $this->products = Produk::all();

        return view('livewire.dashboard-admin')->extends('layouts.app')->section('content');
    }
}
