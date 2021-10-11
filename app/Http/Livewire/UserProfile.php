<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public $first_name, $last_name, $email, $phone;
    public $user;

    public function mount($id){
        if(!Auth::user()){
            return redirect()->to('');
        }

        $this->user = User::find($id);

        if($this->user){
            $this->first_name = $this->user->first_name;
            $this->last_name = $this->user->last_name;
            $this->email = $this->user->email;
            $this->phone = $this->user->phone;
        }
    }
    public function render()
    {
        return view('livewire.user-profile')->extends('layouts.app')->section('content');
    }
}
