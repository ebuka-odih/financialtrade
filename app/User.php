<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_status()
    {
        if ($this->user_status == 1){
            return "<a class='label label-success'>Verified</a>";
        }else{
            return "<a class='label label-danger'>Unverified</a>";
        }
    }
    public function admin_status()
    {
        if ($this->user_status == 1){
            return "<a style='color: white' class='badge badge-success'>Verified</a>";
        }else{
            return "<a style='color: white' class='badge badge-danger'>Unverified</a>";
        }
    }

    public function getProfileImageAttribute($value) {
        if(!$this->attributes['profile_image']) {
            $colors = ['E91E63', '9C27B0', '673AB7', '3F51B5', '0D47A1', '01579B', '00BCD4', '009688', '33691E', '1B5E20', '33691E', '827717', 'E65100',  'E65100', '3E2723', 'F44336', '212121'];
            $background = $colors[$this->id%count($colors)];
            return "https://ui-avatars.com/api/?size=256&background=".$background."&color=fff&name=".urlencode($this->name);
        }
        return '/storage/profile_images/' . $this->attributes['profile_image'];
    }

    public function withdrawal()
    {
        return $this->hasMany(Withdrawal::class, 'user_id');
    }

    public function trades()
    {
        return $this->hasMany(Trades::class, 'user_id');
    }
    public function deposits()
    {
        return $this->hasMany(Deposits::class, 'user_id');
    }
//    public function notify()
//    {
//        return $this->hasMany(Notify::class, 'user_id');
//    }
    public function notifyUser(){
        return $this->hasMany('App\Notify', 'user_id');
    }

    public function unread_msg(){
        $unread_msg = Notify::whereUserId($this->id)->where('read', 0)->count();
        return $unread_msg;
    }


}
