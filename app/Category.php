<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function questions() {
        return $this->hasMany('App\Question', 'category_id');
    }

    public function lessons(){
        return $this->hasMany('App\Lesson');
    }
}
