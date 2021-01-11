<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Settings;
use App\Models\Campaigns;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jorenvh\Share\Share;
use Illuminate\Support\Facades\Session;
use App\Models\EmailLists;
use Jenssegers\Agent\Agent;

class BaseController extends Controller
{

    public function changeLocale($locale)
    {
        App::setLocale($locale);
        Session::put('localization', $locale);
        return redirect()->back();
    }

    public function notFound()
    {
        return view('common.notFound');
    }

    public function sendEmail(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:email_lists,email',
            ]);
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
            EmailLists::insert([
                'email' => $request->email,
                'ip_address' => json_encode($user),
            ]);
            toastr()->success(\Lang::get('static.form.validation.emailRecorded'));
        } catch (\Exception $e) {
            toastr()->error(\Lang::get('static.form.validation.emailNotRecorded',['err'=>$e->getMessage()]));
        }
        return redirect('/');
    }

    public function share($platform, $table, $content_id)
    {
        $url = Settings::first();
        $data = null;
        switch ($table) {
            case 'customer':
                $data = Customers::where('id', $content_id)->get();
        }
        switch ($platform) {
            case 'facebook':
                Share::page($url->site_address, $data[0]->az_name)->facebook('facebook');
            case 'twitter':
                Share::page($url->site_address, $data[0]->az_name)->twitter('twitter');
            case 'linkedin':
                Share::page($url->site_address, $data[0]->az_name)->linkedin('linkedin');
            case 'whatsapp':
                Share::page($url->site_address, $data[0]->az_name)->whatsapp('whatsapp');
            default :
                Share::page($url->site_address, $data[0]->az_name)->whatsapp('whatsapp');
        }
    }

    public function search(Request $request){
        try {
            $request->validate([
                'keyword' => 'required|max:400',
            ]);
            $searchedELement="%".$request->keyword."%";
            $datas=Campaigns::where('az_name','like',$searchedELement)
            ->orWhere('ru_name','like',$searchedELement)
            ->orWhere('en_name','like',$searchedELement)
            ->orWhere('az_description','like',$searchedELement)
            ->orWhere('ru_description','like',$searchedELement)
            ->orWhere('en_description','like',$searchedELement)
            ->paginate(1);
            return view('common.search',compact('datas'));
        }catch(\Exception $e){
            toastr()->error(\Lang::get('static.form.validation.searchFailed',['err'=>$e->getMessage()]));
            return redirect('/');
        }
    }
}
