<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use  SoftDeletes;

    protected $table = 'comments';
    protected $fillable = [
        'id',
        'top_comment_id',
        'table',
        'message',
        'post_id'
    ];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function get_top_comment()
    {
        return $this->hasMany(Comments::class,'top_comment_id','id');
    }
}
