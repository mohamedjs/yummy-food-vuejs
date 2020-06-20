<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Product_image extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'product_images';
    protected $primaryKey = '_id';
    protected $fillable = [
        'product_id', 'image'
    ];

    public function product()
    {
      return $this->belongsTo('App\Product','_id');
    }


}
