<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Product_wish_compare extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'product_wish_compares';
    protected $primaryKey = '_id';
    protected $fillable = [
        'product_id', 'user_id' , 'price'
    ];



}
