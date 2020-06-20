<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;
use App\Product_review;
use App\User;
use DB;
class Product extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'products';
    protected $primaryKey = '_id';
    protected $fillable = [
      'product_name' , 'datiles' , 'discount' , 'category_id' , 'quantity' , 'price_small' ,'price_medium' ,
      'price_larg','shipping_data','returns_policy','payment_info'
    ];

    public function images()
    {
      return $this->hasMany('App\Product_image','product_id', '_id');
    }

    public function toppings()
    {
      return $this->hasMany('App\Product_topping','product_id', '_id');
    }

    public function colors()
    {
      return $this->hasMany('App\Product_color','product_id', '_id');
    }

    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    public function reviews()
    {
      return $this->hasMany('App\Product_review','product_id','_id');
    }

    public function users()
    {
      return $this->belongsToMany('App\User','carts')->withPivot( 'quantity' , 'price' , 'total_price');
    }

    public function user_reviews()
    {
      return $this->belongsToMany('App\User','product_reviews','product_id','user_id')
      ->withPivot( 'review_title' , 'body_of_review' , 'rate' , 'name' , 'email')->withTimestamps();
    }

    public function rate($product_id)
    {
      $check_rate=Product_review::where('product_id',$product_id)->avg('rate');
      if($check_rate){
        $rate_value = $check_rate;
      }
      else{
        $rate_value = 0;
      }
      $count_user=Product_review::where('product_id',$product_id)->count();
      $rate['rate'] = $rate_value;
      $rate['count_user']=$count_user;
      //dd((object)$rate);
      return (object)$rate;
    }

    public function rate_user($product_id)
    {
      $review=Product_review::where('product_id',$product_id)->get();
      $users = [];
      foreach ($review as  $rev) {
        $user_info=User::find($rev->user_id);
        $user['name'] = $user_info->name;
        $user['email'] = $user_info->email;
        $user['title'] = $rev->review_title;
        $user['body'] = $rev->body_of_review;
        $user['rate'] = $rev->rate;
        $user['created_at'] = $rev->created_at;
        array_push($users,(object)$user);
      }
      return $users;
    }


}
