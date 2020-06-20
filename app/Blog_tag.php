<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Blog_tag extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'blog_tag';
    protected $primaryKey = '_id';
    protected $fillable = [
      'blog_id' , 'tag_id'
    ];


}
