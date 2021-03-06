<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{

    protected $fillable = ['name','description','catégorie','price','img'];

    protected $table = 'produits';


    public function user(){

        return $this->belongsToMany('App\User');
    }
    public function produitUser(){

        return $this->hasMany('App\ProduitUser');
    }

    //
}
