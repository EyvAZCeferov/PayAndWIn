<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Faq as Faqs;


class Faq extends Component
{
    public $faqs=null;

    public function mount(){
        $this->faqs=Faqs::orderBy('order','ASC')->get();
    }

    public function render()
    {
        return view('livewire.faq');
    }
}
