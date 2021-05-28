<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'usertype',
    ];

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

    protected $attributes = [
        'usertype' => 1,
    ];

    public function following(){
        return $this->belongsToMany('App\User', 'relationships', 'follower_id', 'followed_id');
    }

    public function followed($followed_id)
    {
        return $this->belongsToMany('App\User', 'relationships', 'follower_id', 'followed_id')->where('followed_id', '=', $followed_id);
    }

    public function followers()
    {
        return $this->belongsToMany('App\User', 'relationships', 'followed_id', 'follower_id');
    }

    public function is_following($id){
        return $this->following()->where('followed_id', $id)->exists();
    }

    public function lessons(){
        return $this->hasMany('App\Lesson');
    }
}
