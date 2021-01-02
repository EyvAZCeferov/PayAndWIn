<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campaigns;
use App\Models\Comments;
use App\Models\Ratings;
use App\Models\Locations;

class CampaignsBrowse extends Component
{
    public $campaign = null,
    $locations=null,
    $comments = null,
    $active=true;

    public function mount($id,$slug)
    {
        $this->campaign = Campaigns::where('slug', $slug)->with(['getCustomer','getComments'])->first();
        $this->locations= Locations::orderBy('created_at','DESC')->where('customer_id',$this->campaign->getCustomer->id)->with('get_customer')->get();
        $this->comments = Comments::where('table', 'posts')->orderBy('created_at','DESC')->where('post_id',$this->campaign->id)->with('get_top_comment')->get();
    }


    public function render()
    {
        return view('livewire.campaigns-browse');
    }
}
