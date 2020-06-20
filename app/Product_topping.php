<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Product_topping extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'product_toppings';
    protected $primaryKey = '_id';
    protected $fillable = [
    'product_id' , 'topping_name' , 'price_topping'
    ];

    // protected $casts = [
    //     'price_topping' => 'array',
    //     'topping_name' => 'array',
    // ];

    public function product()
    {
      return $this->belongsTo('App\Product','product_id');
    }

  //   public function setToppingNameAttribute(array $value){
  //     foreach ($value as $val) {
  //       $this->attributes['topping_name'] = $val;
  //     }
  //  }
  //
  //  public function setPriceToppingAttribute($value){
  //    foreach ($value as $val) {
  //      $this->attributes['price_topping'] = $val;
  //    }
  // }
}
