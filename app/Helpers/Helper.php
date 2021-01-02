<?php

use App\Models\Settings;
use App\Models\Customers;

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
    $file= base64_encode(file_get_contents($imageUrl));
    if($file){
        return $file;
    }else{
        return null;
    }
}

function get_customers(){
    $customers=Customers::orderBy('created_at','DESC')->get();
    return $customers;
}
