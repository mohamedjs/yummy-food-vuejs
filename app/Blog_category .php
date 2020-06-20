<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Blog_category extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'blog_categorys';
    protected $primaryKey = '_id';
    protected $fillable = [
      'category_name'
    ];

    public function blogs()
    {
      return $this->hasMany('App\Blog','blog_cat_id', '_id');
    }

}
