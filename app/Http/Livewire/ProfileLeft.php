<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfileLeft extends Component
{
    public $dashboard=null,$cards=null,$shoppings=null,$settings=null;

    public function mount($dashboard=null,$cards=null,$shoppings=null,$settings=null){
        $this->dashboard=$dashboard;
        $this->cards=$cards;
        $this->shoppings=$shoppings;
        $this->settings=$settings;
    }
    public function render()
    {
        return view('livewire.profile-left');
    }
}
