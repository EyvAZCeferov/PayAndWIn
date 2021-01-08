<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Nexmo;
use App\Models\User;

class Forgetpass extends Component
{
    public $formFields=[
        'forget'=>[
            'phoneNumb'=>null,
        ],
        'verify'=>[
            'verifyCode'=>null,
            'nexmo_request_id'=>null,
        ],
    ],$modal=false;

    public function sendVeridy(){
        try{
            $user=User::where('phoneNumber',$this->formFields['forget']['phoneNumb'])->first();
            if($user){
                session()->flash('message', \Lang::get('static.page.loginRegister.verify.sendedverify'));
                $verification=Nexmo::verify()->start([
                    'number'=>$this->formFields['forget']['phoneNumb'],
                    'brand'  => 'Pay And Win',
                    'code_length'  => '4'
                ]);
                $this->modal=true;
                $this->formFields['verify']['nexmo_request_id']=$verification->getRequestId();
            }else{
                session()->flash('message',\Lang::get('static.page.loginRegister.login.thisnumbernotinbase'));
            }
        }catch(\Exception $e){
            session()->flash('message', \Lang::get('static.auth.error') . ' ' . $e->getMessage());
        }
    }

    public function closeModal(){
        $this->modal=false;
    }

    public function verify(){
        try{
            $verification = new \Nexmo\Verify\Verification($this->formFields['verify']['nexmo_request_id']);
            Nexmo::verify()->check($verification, $this->formFields['verify']['verifyCode']);
            session()->flash('message', \Lang::get('static.page.loginRegister.verify.verificationsuccess'));
            $this->modal=false;
            return redirect()->route('change_new_pass');
        }catch(\Exception $e){
            session()->flash('message', \Lang::get('static.auth.error') . ' ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.forgetpass');
    }
}
