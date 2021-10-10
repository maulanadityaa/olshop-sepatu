<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use App\Models\Belanja;
use App\Models\Produk;

use Illuminate\Support\Facades\Auth;

class TambahOngkir extends Component
{
    public $belanja;
    public $idProvinsi, $idKota, $jasa, $daftarProv, $daftarKota, $nama_jasa;
    public $result = [];

    public function mount($id){
        if(!Auth::user()){
            return redirect()->route('login');
        }

        $this->belanja = Belanja::find($id);
    }

    public function getOngkir()
    {
        if(!$this->idProvinsi || !$this->idKota || !$this->jasa){
            return;
        }

        $product = Produk::find($this->belanja->produk_id);

        $cost = RajaOngkir::ongkosKirim([
            'origin'        => 164,                 // ID kota/kabupaten asal (Jombang)
            'destination'   => $this->idKota,       // ID kota/kabupaten tujuan
            'weight'        => $product->berat,     // berat barang dalam gram
            'courier'       => $this->jasa          // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();

        $this->jasa = $cost[0]['name'];
        foreach ($cost[0]['costs'] as $row) {
            $this->result[] = array(
                'description' => $row['description'],
                'biaya' => $row['cost'][0]['value'],
                'etd' => $row['cost'][0]['etd']
            );
        }
    }

    public function saveOngkir($biaya){
        $this->belanja->total_harga += $biaya;
        $this->belanja->status = 1;
        $this->belanja->kurir = $this->jasa;
        $this->belanja->update();

        toast('Sukses menambahkan ongkir!','success');

        return redirect()->route('keranjang');
    }

    public function render()
    {
        $this->daftarProv = RajaOngkir::provinsi()->all();
        
        if($this->idProvinsi){
            $this->daftarKota = RajaOngkir::kota()->dariProvinsi($this->idProvinsi)->get();
        }

        return view('livewire.tambah-ongkir')->extends('layouts.app')->section('content');
    }
}
