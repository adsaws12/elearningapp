<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $fillable = [
        'question', 
        'choice_1',
        'choice_2',
        'choice_3',
        'choice_4',
        'correct_answer'
    ];

    public function quiz() {
        return $this->belongsTo('App\Category');
    }
}
