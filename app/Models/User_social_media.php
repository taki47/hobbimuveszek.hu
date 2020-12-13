<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_social_media extends Model
{
    use HasFactory;

    public function media()
    {
        return $this->belongsTo('App\Models\Social_media', 'social_media_id', 'id');
    }
}
