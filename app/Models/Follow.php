<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Follow extends Model
{
    use HasFactory;

    public function following()
    {
        return $this->belongsTo(User::class, 'to_user_id', 'id');
    }

    public function follower()
    {
        return $this->belongsTo(User::class, 'from_user_id', 'id');
    }
}
