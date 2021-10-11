<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use App\Models\Alamat;
use Livewire\Component;

class EditAlamat extends Component
{
    public $user_id, $alamat_id, $address, $city, $postal_code, $alamat;

    public function mount($id)
    {
        if(!Auth::user()){
                return redirect()->to('login');
        }
        
        $alamat = Alamat::findorFail($id);
        if ($alamat) {
            $this->user_id = $alamat->user_id;
            $this->alamat_id = $alamat->id;
            $this->address = $alamat->address;
            $this->city = $alamat->kota;
            $this->postal_coe = $alamat->kode_pos;
        }
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'address' => 'required|min:20',
            'city' => 'required',
            'postal_code' => 'required|min:3|max:5',
        ]);
    }

    public function update()
    {
        $this->validate(
            [
                'address' => 'required|min:20',
                'city' => 'required',
                'postal_code' => 'required|min:5|max:5',
            ]
        );
        if($this->alamat_id) {

            $alamat = Alamat::findOrFail($this->alamat_id);
            if($alamat) {
                $alamat->update([
                    'address' => $this->address,
                    'kota' => $this->city,
                    'kode_pos' => $this->postal_code,
                ]);
            }
        }
        toast('Alamat telah ditedit!','success');
        return redirect()->route('cek-alamat', $this->user_id);
    }

    public function render()
    {
        return view('livewire.edit-alamat')->extends('layouts.app')->section('content');
    }
}
