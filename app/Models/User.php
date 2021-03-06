<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Cache;

use App\Models\User_billing_data;
use App\Models\Follow;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public $sortable = ['id',
                        'name',
                        'email',
                        'phone',
                        'status',
                        'role',
                        'created_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\User_status', 'user_status_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\User_role', 'user_role_id', 'id');
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function state()
    {
        return $this->belongsTo('App\Models\Province', 'province_id', 'id');
    }

    public function billing()
    {
        return $this->belongsTo('App\Models\User_billing_data', "id", "user_id");
    }

    public function isFollow($userId)
    {
        $follow = Follow::where("to_user_id",$userId)->count();

        if ( $follow>0 ) {
            return true;
        } else {
            return false;
        }
    }

    public function FollowingCount()
    {
        return Follow::where("from_user_id", \Auth::user()->id)->count();
    }

    public function FollowerCount()
    {
        return Follow::where("to_user_id", \Auth::user()->id)->count();
    }
}
