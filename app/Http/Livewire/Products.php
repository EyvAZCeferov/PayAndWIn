<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Products extends Component
{
    public $thisCustomer=null,$all=true;

    public function mount($id){
        // 
    }

    public function render()
    {
        return view('livewire.products');
    }
}
