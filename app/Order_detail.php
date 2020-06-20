<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Order_detail extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'order_details';
    protected $primaryKey = '_id';
    protected $fillable = [
      'order_id' , 'product_id' , 'qty' , 'total_price' , 'price'
    ];

    public function order()
    {
      return $this->belongsTo('App\Order','_id');
    }

    public function get_product($product_id)
    {
      $product = Product::find($product_id);
      return $product;
    }

}
