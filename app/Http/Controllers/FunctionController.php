<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCards;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FunctionController extends Controller
{
    public function cartadd(Request $request){
        try{
             $cardInfo=[
             'number'=>$request->number,
             'cvc'=>$request->cvc,
             'type'=>$request->card_type,
             'expiry'=>$request->expiry,
             'password'=>$request->password,
             'price'=>0,
            ];
            UserCards::create([
                 'uid'=>Auth::user()->uid,
                 'cardId'=>Str::random(15),
                 'cardInfos'=>json_encode($cardInfo),
                 'type'=>$request->card_type,
            ]);
            toastr()->success(\Lang::get('static.form.action.added'));
        }catch(\Exception $e){
            toastr()->error(\Lang::get('static.auth.error') . ' ' . $e->getMessage());
        }
        return redirect()->route('profile-cards');
    }
}
