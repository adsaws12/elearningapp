<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{

    public $fillable = [
        'question_id', 
        'options',
        // 'choice_1',
        // 'choice_2',
        // 'choice_3',
        // 'choice_4',
        'correct_answer'
    ];

    public function question() {
        return $this->belongsTo('App\Question', 'question_id');
    }
}
