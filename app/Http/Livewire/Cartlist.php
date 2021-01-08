<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class Cartlist extends Component
{
    public $cartshis=null;

    public function mount(){
        $dat=Cart::instance('sopping')->content();
        $this->cartshis=$dat->toArray();
    }

    public function render()
    {
        return view('livewire.cartlist');
    }

    public function clearCart(){
        try{
            Cart::instance('sopping')->destroy();
            session()->flash('message', \Lang::get('static.form.action.removed'));
        }catch(\Exception $e){
            session()->flash('message', \Lang::get('static.auth.error',['err'=>$e->getMessage()]));
        }
        $this->mount();
    }

    public function remove($id){
        try{
            Cart::instance('sopping')->remove($id);
            session()->flash('message', \Lang::get('static.form.action.removed'));
        }catch(\Exception $e){
            session()->flash('message', \Lang::get('static.auth.error',['err'=>$e->getMessage()]));
        }
        $this->mount();
    }

}
