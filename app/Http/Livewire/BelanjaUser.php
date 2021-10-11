<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\Belanja;
use App\Models\Produk;

class BelanjaUser extends Component
{
    public $keranjang = [];
    
    public function mount(){
        if (!Auth::user()) {
            return redirect()->route('login');
        }
    }

    public function destroy($pesanan_id){
        $pesanan = Belanja::find($pesanan_id);
        
        $product = Produk::find($pesanan->produk_id);
        $product->stock += 1;
        $product->save();
        
        $pesanan->delete();

        toast('Produk telah dihapus!','success');

        return redirect()->route('keranjang');
    }
    public function render()
    {
        if (Auth::user()) {
            $this->keranjang = Belanja::where('user_id', Auth::user()->id)->get();
        }
        return view('livewire.belanja-user')->extends('layouts.app')->section('content');
    }
}
