<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Kreait\Firebase\Factory;

class Login extends Component
{
    public $formFields=[
        'login'=>[
            'phoneNumb'=>null,
            'password'=>null,
            'remember'=>'on',
        ],
        'register'=>[
            'phoneNumb'=>null,
        ],
        'forgetPass'=>[
            'phoneNumb'=>null,
        ],
    ];

    public function login(){
        try{
            $factoryAuth = (new Factory)->withServiceAccount(app_path() . '/Firebase/FirebaseConfig.json')->createAuth();
            $factoryDB = (new Factory)->withServiceAccount(app_path() . '/Firebase/FirebaseConfig.json')->createDatabase();
            $this->validate([
                'formFields.login.phoneNumb' => 'required|max:50',
                'formFields.login.password' => 'required|max:300',
                'formFields.login.remember' => 'required|max:10',
            ],[
                'formFields.login.phoneNumb.required'=>\Lang::get('static.form.validation.required'),
                'formFields.login.password.required'=>\Lang::get('static.form.validation.required'),
                'formFields.login.phoneNumb.max'=>\Lang::get('static.form.validation.length',['len'=>50]),
                'formFields.login.password.min'=>\Lang::get('static.form.validation.lengthMin',['len'=>8]),
            ]);
            $userDat = $factoryDB->getReference('users/');
            $userDatas = $userDat->getValue();
            if($userDatas){
                foreach($userDatas as $userData){
                    if($userData['userInfos']['phoneNumb']==$this->formFields->login->phoneNumb){
                        $factoryAuth->getUserByPhoneNumber($this->formFields->login->phoneNumb);
                    }else{
                        session()->flash('message', \Lang::get('static.auth.notyetacc'));
                    }
                }
            }
        }catch(\Exception $e){
            session()->flash('message', \Lang::get('static.auth.error').' '.$e->getMessage());
        }
    }

    public function register(){
        $this->validate([
            'formFields.register.phoneNumb' => 'required|max:50',
        ],[
            'formFields.register.phoneNumb.required'=>\Lang::get('static.form.validation.required'),
            'formFields.register.phoneNumb.max'=>\Lang::get('static.form.validation.length',['len'=>50]),
        ]);
        Auth::loginWithEmail('getdata@pw.az','payandwin123');
    }


    public function render()
    {
        return view('livewire.login');
    }
}
