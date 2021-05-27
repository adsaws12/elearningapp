<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use App\Option;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function question(Category $category){
        return view('admin.quiz.question', compact('category'));
    }

    public function answer(Category $category, Request $request){
        $question = Question::create([
            'category_id' => $category->id,
            'question' => $request->question,
        ]);
        // Answer::create([
        //     'question_id'=> $question->id,
        //     'choice_1' => $request->choice_1,
        //     'choice_2' => $request->choice_2,
        //     'choice_3' => $request->choice_3,
        //     'choice_4' => $request->choice_4,
        //     'correct_answer' => $correct_answer,
        // ]);
        foreach($request->options as $key => $option){
            Option::create([
                'question_id'=> $question->id,
                'options' => $option,
                'correct_answer' => $key == $request->correct_answer
            ]);
        }
            
        return redirect('/admin/dashboard/categories/category/'.$category->id);
    }
    public function editquestion(Category $category, $id){
        $question = Question::where('id', '=', $id)->with('options')->first();
        // dd($question->options);
        $option = $question->options;
        return view('admin.quiz.editquestion', compact('category', 'question', 'option'));
    }

    public function updatequestion(Category $category, Request $request, Question $question){
        // $questionOpt = $question->load('options');
        $questionOpt = $question->with('options')->first();
        $category->update([
            'category_id' => $category->id,
            'question' => $request->question,
        ]);
        foreach($request->options as $key => $option){
            // dd($question->options);
            // dd($key);
            Option::where('id', '=', $question->options[$key - 1]->id)->update([
                'options' => $option,
                'correct_answer' =>  $key == $request->correct_answer,
            ]);
        }
     
        return redirect('/admin/dashboard/categories/category/'.$category->id);
    }
    
    public function deletequestion(Category $category, $id){
        // $questionOpt =  Question::where('id', '=', $id)->options();

        $question = Question::where('id','=', $id)->with('options')->first();
        $option = $question->options()->pluck('id');
        $question->options()->delete();
        Question::destroy($option);

        $question->delete();

        return redirect('/admin/dashboard/categories/category/'.$category->id);
    }
}
