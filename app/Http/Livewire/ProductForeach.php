<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class ProductForeach extends Component
{
    public $data=null,$table=null;

    public function mount($data,$table=null){
        $this->data=$data;
        $this->table=$table;
    }

    public function addCart(){
        try{
            Cart::instance('sopping')->add(uniqid(), 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            session()->flash('message', 'Basarili');
        }catch(\Exception $e){
            session()->flash('message', \Lang::get('static.auth.error',['err'=>$e->getMessage()]));
        }
        $this->mount($this->data,$this->table);
    }

    public function addWishList(){
        try{
            Cart::instance('wishlist')->add(uniqid(), 'Product 1', 1, 9.99, 550, ['size' => 'large']);
            session()->flash('message', 'Basarili');
        }catch(\Exception $e){
            session()->flash('message', \Lang::get('static.auth.error',['err'=>$e->getMessage()]));
        }
        $this->mount($this->data,$this->table);
    }

    public function render()
    {
        return view('livewire.product-foreach');
    }
}
