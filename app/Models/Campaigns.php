<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'id',
        'customer_id',
        'images',
        'clasor',
        'az_name',
        'ru_name',
        'en_name',
        'slug',
        'az_description',
        'ru_description',
        'en_description',
        'read_count',
        'startTime',
        'endTime',
        'price'
    ];
    protected $dates = ['startTime', 'endTime', 'created_at', 'updated_at', 'deleted_at'];

    public function getCustomer()
    {
        return $this->hasOne(Customers::class, 'id', 'customer_id');
    }

    public function getComments(){
        return $this->hasMany(Comments::class,'post_id','id');
    }
}
