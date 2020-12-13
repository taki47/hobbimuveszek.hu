<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_billing_data extends Model
{
    use HasFactory;

    public function state()
    {
        return $this->belongsTo('App\Models\Province', 'province_id', 'id');
    }
}
