<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customers as Customer;
use Livewire\WithPagination;

class Customers extends Component
{
    use WithPagination;

    public function render()
    {
        $customers= Customer::orderBy('id','ASC')->paginate(5);
        return view('livewire.customers',['customers'=>$customers]);
    }
}
