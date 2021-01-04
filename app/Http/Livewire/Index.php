<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campaigns;
use App\Models\WhyChooseUsItems;
use App\Models\Customers;
use App\Models\About;
use Carbon\Carbon;

class Index extends Component
{
    public
    $sliderCampaigns=null,
    $campaigns=null,
    $categories=null,
    $customers=null,
    $whyChooseUsItems=null,
    $about=null;

    public function mount(){
        $date=Carbon::now();
        $this->campaigns=Campaigns::inRandomOrder()->limit(10)->get();
        $this->customers=Customers::orderBy('created_at','DESC')->get();
        $this->whyChooseUsItems=WhyChooseUsItems::orderBy('order','DESC')->get();
        $this->about=About::where('id',1)->first();
        $this->sliderCampaigns=Campaigns::where('startTime','>=',$date)->orWhere('endTime','<=',$date)->limit(5)->get();
    }

    public function render()
    {
        return view('livewire.index');
    }
}
