<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Order extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'orders';
    protected $primaryKey = '_id';
    protected $fillable = [
      'order_id' , 'user_id' , 'number_of_product' , 'total_price' , 'country' ,
       'state' , 'zip_code' ,'info','shipping_price' , 'order_status' , 'payment_status'
    ];

    public function products()
    {
      return $this->hasMany('App\Order_detail');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
