<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function answer(Category $category, Request $request){
        Question::create([
            'question' => $request->question,
            'choice_1' => $request->choice_1,
            'choice_2' => $request->choice_2,
            'choice_3' => $request->choice_3,
            'choice_4' => $request->choice_4,
            'correct_answer' => $request->correct_answer,
        ]);

        return redirect('/admin/dashboard/categories/category/lesson/'.$category->id);
    }
}
