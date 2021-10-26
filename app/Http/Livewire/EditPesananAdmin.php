<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use App\Models\Checkout;
use Livewire\Component;

class EditPesananAdmin extends Component
{
    public $va_number, $bank, $total_harga, $status, $kurir, $resi, $deadline, $checkout_id;

    public function mount($id){
        if(Auth::user()){
            if(Auth::user()->level !== 1){
                return redirect()->to('');
            }
        }

        $checkout = Checkout::findOrFail($id);
        if($checkout){
            $this->checkout_id = $checkout->id;
            $this->va_number = $checkout->va_number;
            $this->bank = $checkout->bank;
            $this->total_harga = $checkout->total_harga;
            $this->status = $checkout->status;
            $this->kurir = $checkout->kurir;
            $this->resi = $checkout->resi;
            $this->deadline = $checkout->deadline;
        }
    }

    public function update()
    {
        if($this->checkout_id) {
            $checkout = Checkout::findOrFail($this->checkout_id);
            if($checkout) {
                $checkout->update([
                    'resi' => $this->resi
                ]);
            }
        }
        toast('Resi Telah ditambahkan!','success')->timerProgressBar();
        return redirect()->route('admin-pesanan');
    }

    public function render()
    {
        return view('livewire.edit-pesanan-admin')->extends('layouts.app')->section('content');
    }
}
