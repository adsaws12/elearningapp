<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $guarded = [];
    // protected $fillable = [
    //     'follower_id',
    //     'followed_id'
    // ];
    public function activity(){
        return $this->morphMany('App\Activity', 'notifiable');
    }  

    public function followedUser()
    {
        return  $this->belongsTo('App\User', 'followed_id');
    }
    
}
