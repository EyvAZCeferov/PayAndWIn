<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Locations;

class LocationsBrowse extends Component
{

    public $locations=null;

    public function mount($id){
      $this->locations= Locations::orderBy('created_at','DESC')->where('customer_id',$id)->with('get_customer')->get();
    }

    public function render()
    {
        return view('livewire.locations-browse');
    }
}
