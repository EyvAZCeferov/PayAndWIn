<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\UserCards;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $cartlist=null,$creditCarts=null,$bonuseCards=null;

    public function mount(){
        $dat=Cart::instance('sopping')->content();
        $this->cartlist=$dat->toArray();
        $this->creditCarts=UserCards::where('uid',Auth::user()->uid)->where('type','<>','pin')->where('type','<>','bonuse')->get();
        $this->bonuseCards=UserCards::where('uid',Auth::user()->uid)->where('type','<>','pin')->where('type','bonuse')->get();
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
