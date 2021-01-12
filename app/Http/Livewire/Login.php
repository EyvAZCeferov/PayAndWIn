<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Nexmo;
use App\User;
use App\Models\UserCards;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Factory;

class Login extends Component
{
    public $formFields = [
        'login' => [
            'phoneNumb' => null,
            'password' => null,
            'remember' => 'on',
        ],
        'register' => [
            'phoneNumb' => null,
            'password' => null,
        ],
        'forgetPass' => [
            'phoneNumb' => null,
        ],
        'verify'=>[
            'verifyCode'=>null,
            'nexmo_request_id'=>null,
        ],
    ],$modal=false;

    public function login()
    {
        try {
            $this->validate([
                'formFields.login.phoneNumb' => 'required|max:50',
                'formFields.login.password' => 'required|max:50',
                'formFields.login.remember' => 'required|max:10',
            ], [
                'formFields.login.phoneNumb.required' => \Lang::get('static.form.validation.required'),
                'formFields.login.password.required' => \Lang::get('static.form.validation.required'),
                'formFields.login.phoneNumb.max' => \Lang::get('static.form.validation.length', ['len' => 50]),
                'formFields.login.phoneNumb.max' => \Lang::get('static.form.validation.length', ['len' => 50]),
                'formFields.login.password.min' => \Lang::get('static.form.validation.lengthMin', ['len' => 8]),
            ]);
            $user=User::where('phoneNumber',$this->formFields['login']['phoneNumb'])->first();
            $verify=Hash::check($this->formFields['login']['password'], $user->password);
            // $verify=true;
            if($verify){
                Auth::loginUsingId($user->id);
                $user=Auth::user();
                if($user){
                    session()->flash('message', \Lang::get('static.auth.successLogin'));
                    return redirect()->route('profile');
                }else{
                    session()->flash('message','Error '.$user);
                }
            }else{
                session()->flash('message','Daxil etdiyiniz şifrə yanlışdır.');
            }
        } catch (\Exception $e) {
            session()->flash('message', \Lang::get('static.auth.error') . ' ' . $e->getMessage());
        }
    }

    public function register()
    {
        $this->validate([
            'formFields.register.phoneNumb' => 'required|max:50',
            'formFields.register.password' => 'required|max:50',
        ], [
            'formFields.register.phoneNumb.required' => \Lang::get('static.form.validation.required'),
            'formFields.register.phoneNumb.max' => \Lang::get('static.form.validation.length', ['len' => 50]),
            'formFields.register.phoneNumb.max' => \Lang::get('static.form.validation.length', ['len' => 50]),
            'formFields.register.password.required' => \Lang::get('static.form.validation.required'),
            'formFields.register.password.min' => \Lang::get('static.form.validation.lengthMin', ['len' => 8]),
        ]);
        $verification=Nexmo::verify()->start([
            'number'=>$this->formFields['register']['phoneNumb'],
            'brand'  => 'Pay And Win',
            'code_length'  => '4'
        ]);
        $this->modal=true;
        $this->formFields['verify']['nexmo_request_id']=$verification->getRequestId();
    }

    public function closeModal(){
        $this->modal=false;
    }

    public function verify(){
        try{
            $verification = new \Nexmo\Verify\Verification($this->formFields['verify']['nexmo_request_id']);
            Nexmo::verify()->check($verification, $this->formFields['verify']['verifyCode']);
            $this->createUserData();
            Auth::attempt([
                'phoneNumber' => $this->formFields['register']['phoneNumb'],
                'password' => Hash::make($this->formFields['register']['password'])
            ]);
            session()->flash('message', 'Basarili');
            $this->modal=false;
            return redirect('/');
        }catch(\Exception $e){
            session()->flash('message', \Lang::get('static.auth.error') . ' ' . $e->getMessage());
        }
    }

    public function createUserData(){
        $uid=Str::random(40);
        User::create([
            'profilePhoto'=>null,
            'name'=>'Name',
            'email'=>null,
            'phoneNumber'=>$this->formFields['register']['phoneNumb'],
            'password'=>Hash::make($this->formFields['register']['password']),
            'uid'=>$uid,
        ]);
        $factory = (new Factory)->withServiceAccount(app_path() . '/Firebase/FirebaseConfig.json')->createDatabase();
        $ref = $factory->getReference('users/'.$uid.'/userInfos');
        $ref->set(
            [
                'profilePhoto'=>null,
                'name'=>'Name',
                'email'=>null,
                'phoneNumber'=>$this->formFields['register']['phoneNumb'],
                'password'=>Hash::make($this->formFields['register']['password']),
                'uid'=>$uid,
            ]
        );
        $this->checkPin($uid);
    }

    public function makePinNumb(){
        $code = '111';
        for($i = 0; $i < 13; $i++) { $code .= mt_rand(0, 9); }
        return $code;
    }

    public function checkPin($uid){
        $pin=UserCards::where('uid',$uid)->where('type','pin')->first();
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
            $cardId=Str::random(20);
            UserCards::create([
                'uid'=>$uid,
                'cardId'=>$cardId,
                'cardInfos'=>json_encode($cardInfo),
                'type'=>'pin',
            ]);
            $factory = (new Factory)->withServiceAccount(app_path() . '/Firebase/FirebaseConfig.json')->createDatabase();
            $ref = $factory->getReference('users/'.$uid.'/pin/'.$cardId);
            $ref->set(
                [
                    'uid'=>$uid,
                    'cardId'=>$cardId,
                    'cardInfos'=>json_encode($cardInfo),
                    'type'=>'pin',
                ]
            );
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
