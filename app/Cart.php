<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;
use Auth;
class Cart extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'carts';
    protected $primaryKey = '_id';
    protected $fillable = [
      'product_id' , 'user_id' , 'quantity' , 'price' , 'total_price','size'
    ];

    public function get_product($product_id)
    {
      $product = Product::find($product_id);
      return $product;
    }

    public function sub_total()
    {
      return Cart::where('user_id',Auth::id())->sum('total_price');
    }

}
