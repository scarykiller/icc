<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin','adress','avatar'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function setPasswordAttribute($password)
    {
        return  $this->attributes['password'] = bcrypt($password);
    }
    public function achats(){

        return $this->hasMany('App\achat');
    }
    public function commentaires(){
        return $this->hasMany('App\Commentaire');
    }
    public function tags(){
       return $this->hasMany('App\tags');
    }
public function produitUser(){
       return $this->hasMany('App\produitUser');
}
public function adress(){
      return  $this->BelongsTo('App\Adress','adress_id','id');
}
}