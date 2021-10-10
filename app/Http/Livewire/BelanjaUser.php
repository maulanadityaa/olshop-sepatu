<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\Belanja;

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
        $pesanan->delete();

        toast('Produk telah dihapus!','success');

        return redirect()->to('keranjang');
    }
    public function render()
    {
        if (Auth::user()) {
            $this->keranjang = Belanja::where('user_id', Auth::user()->id)->get();
        }
        return view('livewire.belanja-user')->extends('layouts.app')->section('content');
    }
}
