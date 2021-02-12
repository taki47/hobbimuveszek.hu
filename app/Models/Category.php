<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category_image;

class Category extends Model
{
    use HasFactory;

    public function getChilds($id)
    {
        return $this->where("parent_id", $id)->orderBy("position")->get();
    }

    public function getImages($id)
    {
        return Category_image::where("category_id", $id)->get();
    }
}
