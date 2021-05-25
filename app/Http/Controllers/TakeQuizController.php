<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Lesson;
use App\Question;
use App\Answer;
use App\Option;
use Illuminate\Http\Request;

class TakeQuizController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('takequiz.categorylist', compact('categories'));
    }

    public function store(Request $request){

        $lesson = Lesson::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('lessons', ['lesson' => $lesson]);
    }

    public function lessonview(Lesson $lesson){
        // $question = $lesson->category->questions;
        // $questions= $question->load('options')->paginate(1);
        $questions = Question::where('category_id', '=', $lesson->category_id)->with('category', 'options')->paginate(1);
        
        return view('takequiz.question', compact('questions', 'lesson'));
    }
    
    public function answer($id, Request $request){
        $lesson = Lesson::where('id', '=', $id)->with('category')->first();
        foreach($request->ur_answer as $key => $option)
        Answer::create([
            'lesson_id' => $lesson->id,
            'option_id' => $request->option_id,
            'question_id' => $request->question_id,
            'ur_answer' => $option,
        ]);
            
        if($request->nextPageUrl > $request->lastPageUrl){
            return redirect($request->nextPageUrl);
        }
        else{
            $answers = Answer::where('lesson_id', '=', $lesson->id)->with('option', 'option.question','option.question.correctAnswer')->get();
            
            return view('takequiz.result', compact('lesson', 'answers')); 
        }
    }

    public function result(Lesson $lesson){
       
        // $lessons = Lesson::where('user_id', '=' ,auth()->user()->id)->with('answers', 'category')->first();
        
        // $questions = $lesson->answers;
        
        // $option = 
        return view('takequiz.result', compact('questions', 'lessons'));
    }
}
