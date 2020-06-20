<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Category extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'categorys';
    protected $primaryKey = '_id';
    protected $fillable = [
        'category_name', 'category_icon','cat_id'
    ];
    protected $attributes = [
        'cat_id' => null,
    ];


    // function getCreatedatAttribute($value)
    // {
    //   return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d');
    // }

    public function setCategoryIconAttribute($value)
    {
      if(is_file($value[0])){
      $img_name = time().rand(11111,99999).'.'.$value[0]->getClientOriginalExtension();
      $value[0]->move(public_path('admin/category/'),$img_name);
      $this->attributes['category_icon']=$img_name;
      }
    }

    public function sub_category()
    {
      return $this->hasMany('App\Category','cat_id', '_id');
    }

    public function products()
    {
      return $this->hasMany('App\Product');
    }

    public function category()
    {
      return $this->belongsTo('App\Category','cat_id');
    }

    // public function count_product($id)
    // {
    //
    // }

}
