<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customers extends Model
{
    use  SoftDeletes;

    protected $table = 'customers';
    protected $fillable = [
        'id',
        'logo',
        'az_name',
        'ru_name',
        'en_name',
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function get_locations()
    {
        return $this->hasOne(Locations::class, 'customer_id', 'id');
    }

    public function get_posts()
    {
        return $this->hasMany(Campaigns::class, 'customer_id', 'id');
    }

    public function get_rating()
    {
        return $this->hasOne(Ratings::class, 'ratingable_id', 'id');
    }

    public function get_comments()
    {
        return $this->hasOne(Comments::class, 'ratingable_id', 'id');
    }

}
