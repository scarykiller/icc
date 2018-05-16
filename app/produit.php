<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{

    protected $fillable = ['name','description','price','img'];

    protected $table = 'produits';


    public function user(){

        return $this->belongsToMany('App\User');
    }

    //
}
