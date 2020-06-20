<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Hour_work extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'Houe_works';
    protected $primaryKey = '_id';
    protected $fillable = [
      'day' , 'from' , 'to'
    ];


}
