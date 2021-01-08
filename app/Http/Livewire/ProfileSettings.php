<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfos;


class ProfileSettings extends Component
{
    use WithFileUploads;

    public $formFields=[
        'profilePhoto'=>null,
        'password'=>[
            'old_password'=>null,
            'new_password'=>null,
            'new_password_repeat'=>null,
        ],
        'email'=>null,
    ],$userinfos=null;

    public function mount(){
        $this->userinfos=UserInfos::where('uid',Auth::user()->uid)->first();
    }

    public function update(){
        try{
            $uniqueName = Str::random(15);
            if(array_key_exists('profilePhoto',$this->formFields)){
                if($this->formFields['profilePhoto']!=null){
                    if(Auth::user()->profilePhoto || Auth::user()->profilePhoto!=null || Auth::user()->profilePhoto!==null){
                        $this->formFields['profilePhoto']->storeAs('users', Auth::user()->profilePhoto, 'gcs');
                    }else{
                        $this->formFields['profilePhoto']->storeAs('users', $uniqueName . '.png', 'gcs');
                        User::where('id',Auth::user()->id)->update([
                            'profilePhoto'=>$uniqueName.'.png',
                        ]);
                    }
                }
            }
            if(array_key_exists('new_password',$this->formFields['password'])){
                if (Hash::check($this->formFields['password']['old_password'], Auth::user()->password, [])) {
                    if($this->formFields['password']['new_password']==$this->formFields['password']['new_password_repeat']){
                        User::where('id',Auth::user()->id)->update([
                            'password'=>Hash::make($this->formFields['password']['new_password']),
                        ]);
                    }else{
                        session()->flash('message', 'Daxil etdiyiniz şifrələr uyuşmur!');
                    return redirect('/login');
                    }
                } else {
                    session()->flash('message', 'Daxil etdiyiniz şifrə yanlışdır!');
                    return redirect('/login');
                }
            }
            User::where('id',Auth::user()->id)->update([
                'email'=>$this->formFields['email'],
            ]);
            session()->flash('message', 'Ugurlu');
        }catch(\Exception $e){
            session()->flash('message', \Lang::get('static.auth.error') . ' ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.profile-settings');
    }
}
