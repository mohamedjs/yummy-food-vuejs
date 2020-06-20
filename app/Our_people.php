<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Our_people extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'our_peoples';
    protected $primaryKey = '_id';
    protected $fillable = [
      'name' , 'image' ,'job_type' , 'about'
    ];

    public function setImageAttribute($value)
    {
      if(is_file($value[0])){
      $img_name = time().rand(11111,99999).'.'.$value[0]->getClientOriginalExtension();
      $value[0]->move(public_path('admin/people/'),$img_name);
      $this->attributes['image']=$img_name;
      }
    }

}
