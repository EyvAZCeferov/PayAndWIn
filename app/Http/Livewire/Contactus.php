<?php

namespace App\Http\Livewire;

use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Livewire\Component;
use Illuminate\Support\Facades\App;
use App\Models\Locations;


class Contactus extends Component
{
    public $formFields = [
        'name' => null,
        'email' => null,
        'subject' => null,
        'description' => null,
    ],$locations=null;

    public function mount()
    {
        $this->formFields = [
            'name' => null,
            'email' => null,
            'subject' => null,
            'description' => null,
        ];
        $this->locations=Locations::orderBy('created_at','DESC')->with('get_customer')->get();
    }

    public function updated()
    {
        $this->validate([
            'formFields.name' => 'required|max:300',
            'formFields.subject' => 'required|max:300',
            'formFields.email' => 'required|max:300|email',
            'formFields.description' => 'required|max:1000',
        ],[
            'formFields.name.required'=>\Lang::get('static.form.validation.required'),
            'formFields.subject.required'=>\Lang::get('static.form.validation.required'),
            'formFields.email.required'=>\Lang::get('static.form.validation.required'),
            'formFields.description.required'=>\Lang::get('static.form.validation.required'),
            'formFields.name.max'=>\Lang::get('static.form.validation.length',['len'=>300]),
            'formFields.subject.max'=>\Lang::get('static.form.validation.length',['len'=>300]),
            'formFields.email.email'=>\Lang::get('static.form.validation.email'),
            'formFields.email.max'=>\Lang::get('static.form.validation.length',['len'=>300]),
            'formFields.description.max'=>\Lang::get('static.form.validation.length',['len'=>1000]),
        ]);
    }

    public function sendMessage()
    {
        try {
            $agent = new Agent();
            $browser = $agent->browser();
            $browserversion = $agent->version($browser);
            $languages = $agent->languages();
            $platform = $agent->platform();
            $device = $agent->device();
            $platformversion = $agent->version($platform);
            $user = [
                'ip' => \request()->ip(),
                'browser' => $browser . ' ' . $browserversion,
                'languages' => $languages,
                'platform' => $platform . ' ' . $platformversion,
                'device' => $device,
            ];
            \App\Models\ContactUs::create([
                'name' => $this->formFields['name'],
                'email' => $this->formFields['email'],
                'subject' => $this->formFields['subject'],
                'description' => $this->formFields['description'],
                'user_info' => json_encode($user),
            ]);

            session()->flash('message', \Lang::get('static.form.validation.messageSended'));

        } catch (\Exception $e) {
            session()->flash('message', \Lang::get('static.form.validation.messageNotSended',['err'=>$e->getMessage()]));
        }
        $this->mount();
    }

    public function render()
    {
        return view('livewire.contactus');
    }
}
