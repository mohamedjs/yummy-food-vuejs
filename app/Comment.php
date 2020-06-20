<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Comment extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'comments';
    protected $primaryKey = '_id';
    protected $fillable = [
      'blog_id' , 'user_id' , 'comment' , 'name' , 'email'
    ];

    public function blog()
    {
      return $this->belongsTo('App\Blog');
    }

    public function user()
    {
      return $this->belongsTo('App\User','_id');
    }
}
