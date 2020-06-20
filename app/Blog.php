<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Blog extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'blogs';
    protected $primaryKey = '_id';
    protected $fillable = [
      'blog_cat_id' ,'title' , 'body' , 'image'
    ];

    public function setImageAttribute($value)
    {
      if(is_file($value[0])){
      $img_name = time().rand(11111,99999).'.'.$value[0]->getClientOriginalExtension();
      $value[0]->move(public_path('admin/blog/'),$img_name);
      $this->attributes['image']=$img_name;
      }
    }

    public function getImageAttribute($value)
    {
       return asset('admin/blog/'.$value);
    }

    public function tags()
    {
      return $this->belongsToMany('App\Tag','blog_tag','blog_id','tag_id');
    }

    public function category()
    {
      return $this->belongsTo('App\Blog_category','blog_cat_id');
    }

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
}
