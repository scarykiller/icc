<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class achat extends Model
{

    protected $fillable = ['produit_user_id','quantity'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }




    //
}
