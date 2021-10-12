<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Alamat;
use App\Models\User;
use Livewire\Component;

class AlamatUser extends Component
{
    public $address, $city, $postal_code;

    public function mount(){
        if(!Auth::user()){
            return redirect()->to('login');
        }
    }

    public function store(){
        $this->validate(
            [
                'address' => 'required|min:15',
                'city' => 'required',
                'postal_code' => 'required|min:5|max:5',
            ]
        );

        Alamat::create([
            'user_id' => Auth::user()->id,
            'address' => $this->address,
            'kota' => $this->city,
            'kode_pos' => $this->postal_code
        ]);

        User::where('id', Auth::user()->id)->update([
            'alamat_status' => 1
        ]);

        $this->dispatchBrowserEvent('closeModal');

        toast('Alamat telah ditambahkan!','success');

        return redirect()->route('cek-alamat', Auth::user()->id);
    }

    public function render()
    {
        return view('livewire.alamat-user')->extends('layouts.app')->section('content');
    }
}
