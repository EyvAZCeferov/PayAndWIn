<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UsersPaying;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $pays=null;

    public function mount(){
        $this->pays= UsersPaying::where('uid',Auth::user()->uid)->get();
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
