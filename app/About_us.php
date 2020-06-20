<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class About_us extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'about_uses';
    protected $primaryKey = '_id';
    protected $fillable = [
      'company_name' , 'about_us' , 'our_company' , 'address' , 'phone' , 'email' , 'image' ,
      'lat' , 'lang'
    ];

    public function setImageAttribute($value)
    {
      if(is_file($value[0])){
      $img_name = time().rand(11111,99999).'.'.$value[0]->getClientOriginalExtension();
      $value[0]->move(public_path('admin/about/'),$img_name);
      $this->attributes['image']=$img_name;
      }
    }

    public function getImageAttribute($value)
    {
       return asset('admin/about/'.$value);
    }
}
