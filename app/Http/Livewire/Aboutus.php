<?php

namespace App\Http\Livewire;

use App\Models\Teams;
use App\Models\WhyChooseUs;
use Livewire\Component;
use App\Models\About;


class Aboutus extends Component
{
    public $about = null, $teams = null, $whychooseUs=null;

    public function mount()
    {
        $this->about = About::where('id', 1)->first();
        $this->teams = Teams::all();
        $this->whychooseUs = WhyChooseUs::with('getItems')->where('id', 1)->first();
    }

    public function render()
    {
        return view('livewire.aboutus');
    }
}
