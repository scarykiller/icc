<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['tag','post_id','user_id'];

    public function posts()
    {
        return $this->belongsTo('App\Post','post_id','id');
    }
    public function user(){

        return $this->belongsTo('App\User','user_id','id');
    }

}