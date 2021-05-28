<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    public function notifiable(){
        return $this->morphTo();
    }

    public function relationship(){
        return $this->belongsTo('App\Relationship', 'notifiable_id');
    }

    public function answer(){
        return $this->belongsTo('App\Answer', 'notifiable_id');
    }

}
