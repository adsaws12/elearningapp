<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'lesson_id', 
        'option_id',
        'question_id',
        'ur_answer'
    ];
    
    public function lesson(){
        return $this->belongsTo('App\Lesson', 'lesson_id');
    }

    public function option(){
        return $this->belongsTo('App\Option', 'option_id', 'id');
    }

    public function question(){
        return $this->belongsTo('App\Question', 'question_id', 'id');
    }
    
    public function activity(){
        return $this->morphMany('App\Activity', 'notifiable');
    }
}
