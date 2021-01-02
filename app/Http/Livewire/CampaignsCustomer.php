<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Campaigns;
use Illuminate\Support\Facades\App;
use App\Models\Customers;

class CampaignsCustomer extends Component
{
    use WithPagination;

    public $thisCustomer=null,$campaigns=null,$all=false;

    public function mount($id=null){
        if($id!=null || !$this->all ){
            $this->thisCustomer=Customers::where('id',$id)->first();
            $this->campaigns=Campaigns::where('customer_id',$id)->with(['getCustomer','getComments'])->get();
        }else{
            $this->thisCustomer=null;
            $this->campaigns=Campaigns::with(['getCustomer','getComments'])->get();
        }
    }

    public function all(){
        $this->all=true;
        $this->thisCustomer=null;
        $this->mount();
    }

    public function customer($a){
        $this->all=false;
        $this->mount($a);
    }

    public function render()
    {
        return view('livewire.campaigns-customer');
    }
}
