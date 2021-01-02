<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use App\Models\Ratings;
use Livewire\Component;
use App\Models\Customers;
use App\Models\Locations;


class Customer extends Component
{
    public $customer = [],
    $comments=null,
    $locations=null,
    $active=true;

    public function mount($id)
    {
        $this->customer = Customers::where('id', $id)->with(['get_locations', 'get_rating'])->get();
        $this->comments = Comments::where('table', 'customers')->orderBy('created_at','DESC')->where('post_id',$id)->with('get_top_comment')->get();
        $this->locations= Locations::orderBy('created_at','DESC')->where('customer_id',$id)->with('get_customer')->get();
    }

    public function render()
    {
        return view('livewire.customer');
    }
}
