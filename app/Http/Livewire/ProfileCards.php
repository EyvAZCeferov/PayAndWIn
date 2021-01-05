<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserCards;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileCards extends Component
{
    public $cardsLists=null,$formFields=[
        'number'=>null,
        'type'=>null,
        'cvc'=>null,
        'expiry'=>null,
        'password'=>null,
    ];

    public function mount(){
        $this->cardsLists=  UserCards::where('uid',Auth::user()->uid)->get();
        // dd($this->cardsLists[0]['cardInfos']);
    }

    public function delete($cardId){
        try{
            UserCards::where('uid',Auth::user()->uid)->where('cardId',$cardId)->delete();
            session()->flash('message', \Lang::get('static.form.action.removed'));
        }catch(\Exception $e){
            session()->flash('message', \Lang::get('static.auth.error') . ' ' . $e->getMessage());
        }
        $this->mount();
    }
   
    public function render()
    {
        return view('livewire.profile-cards');
    }
}
