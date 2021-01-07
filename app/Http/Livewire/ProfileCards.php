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
        $this->checkPin();
    }

    public function checkPin(){
        $pin=UserCards::where('uid',Auth::user()->uid)->where('type','pin')->first();
        if(!$pin || $pin->count()==0 || $pin==null){
            $number=$this->makePinNumb();
            $cardInfo=[
                'number'=>$number,
                'cvc'=>rand(101,999),
                'type'=>'pin',
                'expiry'=>'∞/∞',
                'password'=>null,
                'price'=>0,
            ];
            UserCards::create([
                'uid'=>Auth::user()->uid,
                'cardId'=>Str::random(15),
                'cardInfos'=>json_encode($cardInfo),
                'type'=>'pin',
            ]);
        }
    }

    public function makePinNumb(){
        $code = '111';
        for($i = 0; $i < 13; $i++) { $code .= mt_rand(0, 9); }
        return $code;
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

    public function pininfo(){
        return redirect()->route('pininfo');
    }

    public function render()
    {
        return view('livewire.profile-cards');
    }
}
