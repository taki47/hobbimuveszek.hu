<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog_tag extends Model
{
    protected $table = "blog_tag";

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }
}
