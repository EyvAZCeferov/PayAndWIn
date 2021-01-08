<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserCards;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Kreait\Firebase\Factory;


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
            $cardId=Str::random(15);
            UserCards::create([
                 'uid'=>Auth::user()->uid,
                 'cardId'=>$cardId,
                 'cardInfos'=>json_encode($cardInfo),
                 'type'=>$request->card_types,
            ]);
            $factory = (new Factory)->withServiceAccount(app_path() . '/Firebase/FirebaseConfig.json')->createDatabase();
            $ref = $factory->getReference('users/' . Auth::user()->uid . '/cards/');
            $ref->getChild($cardId)->set(
                [
                    'cardId' => $cardId,
                    'uid'=>Auth::user()->uid,
                    'cardInfos'=>json_encode($cardInfo),
                    'type'=>$request->card_types,
                ]
            );
            toastr()->success(\Lang::get('static.form.action.added'));
        }catch(\Exception $e){
            toastr()->error(\Lang::get('static.auth.error') . ' ' . $e->getMessage());
        }
        return redirect()->route('profile-cards');
    }

    public function logout(){
        try{
            Auth::logout();
            toastr()->success(\Lang::get('static.form.action.logout'));
        }catch(\Exception $e){
            toastr()->error(\Lang::get('static.auth.error') . ' ' . $e->getMessage());
        }
        return redirect()->route('login');
    }
}
