<?php

namespace App\Http\Livewire;

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

        $user = User::find($id);

        if($user){
            $this->first_name = $user->first_name;
            $this->last_name = $user->last_name;
            $this->email = $user->email;
            $this->phone = $user->phone;
        }
    }
    public function render()
    {
        return view('livewire.user-profile')->extends('layouts.app')->section('content');
    }
}
