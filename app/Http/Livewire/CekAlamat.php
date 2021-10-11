<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use App\Models\Alamat;
use Livewire\Component;

class CekAlamat extends Component
{
    public $alamat_id, $address, $city, $postal_code, $alamat;

    public function mount($id)
    {
        if(!Auth::user()){
            return redirect()->to('login');
        }
        
        $this->alamat = Alamat::where('user_id',$id)->first();
        // dd($this->alamat);
        if ($this->alamat) {
            $this->address = $this->alamat->address;
            $this->city = $this->alamat->kota;
            $this->postal_code = $this->alamat->kode_pos;
        }
    }
    public function render()
    {
        
        return view('livewire.cek-alamat')->extends('layouts.app')->section('content');
    }
}
