<?php

use App\Models\Settings;
use App\Models\Customers;
use App\Models\UserCards;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

function settings($fieldname)
{
    $setting = Settings::where('id', 1)->get();
    return $setting[0][$fieldname];
}

function get_image($imageName, $folder, $thisFolder = null)
{
    $setting = Settings::where('id', 1)->get();
    if ($thisFolder == null) {
        $imageUrl = $setting[0]->adminUrl . '/storage/uploads/' . $folder . '/' . $imageName;
    } else {
        $imageUrl = $setting[0]->adminUrl . '/storage/uploads/' . $folder . '/' . $thisFolder . '/' . $imageName;
    }
    if($imageUrl){
        $file= base64_encode(file_get_contents($imageUrl));
        if($file){
            return $file;
        }else{
            return null;
        }
    }else{
        return null;
    }
}

function get_customers(){
    $customers=Customers::orderBy('created_at','DESC')->get();
    return $customers;
}

function get_cart_type($cardId){
    $card=UserCards::where('uid',Auth::user()->uid)->where('cardId',$cardId)->first();
    switch ($card->type) {
        case 'bonuse':
            return '<i class="fas fa-award"></i>';
            break;
        default:
            return '<i class="far fa-credit-card"></i>';
            break;
    }
}

function ccMasking($number, $maskingCharacter = '*') {
    return substr($number, 0, 4) . str_repeat($maskingCharacter, strlen($number) - 8) . substr($number, -4);
}

function get_image_from_google($imageName,$clasor=null){
     $imageUrl= Storage::disk('gcs')->url($clasor.'/'.$imageName);
     if($imageUrl){
        $file= base64_encode(file_get_contents($imageUrl));
        if($file){
            return $file;
        }else{
            return null;
        }
    }else{
        return null;
    }
}
