<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Tag extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'tags';
    protected $primaryKey = '_id';
    protected $fillable = [
     'tag_name'
    ];

    public function blogs()
    {
      return $this->belongsToMany('App\Blog','blog_tag','tag_id','blog_id');
    }
}
