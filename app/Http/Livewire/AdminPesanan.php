<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\Belanja;

class AdminPesanan extends Component
{
    public $pesanan;
    public function mount(){
        if (!Auth::user()->level == 1) {
            return redirect()->route('login');
        }
    }
    public function destroy($pesanan_id){
        $pesanan = Belanja::find($pesanan_id);
        $pesanan->delete();

        toast('Produk telah dihapus!','success');

        return redirect()->route('admin-pesanan');
    }
    public function render()
    {
        $this->pesanan = Belanja::all();
        return view('livewire.admin-pesanan')->extends('layouts.app')->section('content');
    }
}
