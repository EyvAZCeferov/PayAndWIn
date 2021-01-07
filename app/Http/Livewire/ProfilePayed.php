<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UsersPaying;
use Illuminate\Support\Facades\Auth;


class ProfilePayed extends Component
{

    public $payed=null;

    public function mount(){
        $this->payed=UsersPaying::where('uid',Auth::user()->uid)->get();
    }

    public function render()
    {
        return view('livewire.profile-payed');
    }
}
