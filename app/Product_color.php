<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Product_color extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'product_colors';
    protected $primaryKey = '_id';
    protected $fillable = [
        'product_id', 'color' , 'price_color'
    ];

    // protected $casts = [
    //     'price_color' => 'array',
    //     'color' => 'array',
    // ];

    public function product()
    {
      return $this->belongsTo('App\Product','product_id');
    }
  // 
  //   public function setColorAttribute($value){
  //      foreach ($value as $val) {
  //        $this->attributes['color'] = $val;
  //      }
  //
  //  }
  //
  //  public function setPriceColorAttribute($value){
  //    foreach ($value as $val) {
  //      $this->attributes['price_color'] = $val;
  //    }
  // }

}
