<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'user_id',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
    
}
