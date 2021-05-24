<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Lesson;
use App\Question;
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

        // $questions = $lesson->load('category', 'category.questions', 'category.questions.options');
        $question = $lesson->category->questions;
        $questions= $question->load('options')->first()->paginate(1);

        return view('takequiz.question', compact('questions', 'lesson'));
    }
    
}
