<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TermofUse as TUS;


class Termofuse extends Component
{
    public $termofuse=null;

    public function mount(){
        $this->termofuse=TUS::where('id',1)->first();
    }

    public function render()
    {
        return view('livewire.termofuse');
    }
}
