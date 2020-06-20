<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Wish_list extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'wish_lists';
    protected $primaryKey = '_id';
    protected $fillable = [
      'product_id' , 'user_id' , 'quantity' , 'price' , 'total_price','size'
    ];

}
