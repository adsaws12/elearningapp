<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $fillable = [
        'question', 
        'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function options() {
        return $this->hasMany('App\Option');
    }
}
