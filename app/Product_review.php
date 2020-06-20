<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

use Carbon\Carbon;

class Product_review extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'product_reviews';
    protected $primaryKey = '_id';
    protected $fillable = [
        'product_id' , 'user_id' , 'review_title' , 'body_of_review' , 'rate' , 'name' , 'email'
    ];


}
