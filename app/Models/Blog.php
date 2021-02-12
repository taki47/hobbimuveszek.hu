<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

use App\Models\Blog_tag;
use App\Models\Tag;

class Blog extends Model
{
    use Sortable;

    public $sortable = ['id',
                        'name',
                        'created_at',
                        'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function getFirstTag($blogId)
    {
        $blogTag = Blog_tag::where("blog_id", $blogId)->first();
        $tag = Tag::find($blogTag->tag_id);

        return $tag;
    }
}
