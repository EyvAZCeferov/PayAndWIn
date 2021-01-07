<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserCards;
use Illuminate\Support\Facades\Auth;
use App\Models\UsersPaying;
use App\Models\BarcodeProducts;
use App\Models\PinPaySuggest;

class Pininfo extends Component
{
    public $pininfo=null,$payinfo=null,$payedproducts=null,$pinpaysuggest=null;

    public function mount(){
        $this->pininfo=UserCards::where('uid',Auth::user()->uid)->where('type','pin')->first();
        // dd($this->pininfo);
        $this->payinfo=UsersPaying::where('uid',Auth::user()->uid)->first();
        if($this->payinfo){
            $this->payedproducts=BarcodeProducts::where('pay_id',$this->payinfo->id)->first();
        }
        $this->pinpaysuggest=PinPaySuggest::orderBy('created_at','DESC')->get();
    }

    public function render()
    {
        return view('livewire.pininfo');
    }
}
