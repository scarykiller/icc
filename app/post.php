<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{

    protected $fillable = ['titre','contenu'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function tags(){

        return $this->hasMany('App\tag');
    }
    //
}
