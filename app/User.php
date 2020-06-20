<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable , HasApiTokens;
    protected $collection = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
   {
        $this->attributes['password']=bcrypt($value);
   }

    public function comments()
    {
      return $this->hasMany('App\Comment','user_id', '_id');
    }


    public function reviews()
    {
      return $this->hasMany('App\Product_review','user_id', '_id');
    }

    public function products()
    {
      return $this->belongsToMany('App\Product','carts')->withPivot( 'quantity' , 'price' , 'total_price');
    }

    public function product_reviews()
    {
      return $this->belongsToMany('App\Product','product_reviews','user_id','product_id')
      ->withPivot( 'review_title' , 'body_of_review' , 'rate' , 'name' , 'email')->withTimestamps();
    }

    public function orders()
    {
      return $this->hasMany('App\Order');
    }

}
