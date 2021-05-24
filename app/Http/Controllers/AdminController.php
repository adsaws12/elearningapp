<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Question;
use App\Option;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories', compact('categories'));
    }

<<<<<<< Updated upstream
    public function category()
    {
        return view('admin.category');
    }

    public function profile()
    {
        return view('user.userprofile');
    }

    public function store(Request $request)
    {
=======
    public function category(){
        return view('admin.category');
    }

    public function profile(){
        return view('user.userprofile');
    }

    public function store(Request $request){
>>>>>>> Stashed changes
        Category::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
<<<<<<< Updated upstream

        return redirect('/admin/dashboard/categories');
    }
    public function view(Category $category)
    {
        return view('admin.quizzes', compact('category'));
    }

    public function delete($id)
    {
=======
        
        return redirect('/admin/dashboard/categories');
    }

    public function view($id) {
        $category = Category::with(['questions', 'questions.answers'])->where('id', '=', $id)->first(); 
        
        return view('admin.quizzes', compact('category'));
    }

    public function delete($id){
        
>>>>>>> Stashed changes
        Category::where('id',$id)->delete();

        return redirect('/admin/dashboard/categories');
    }
<<<<<<< Updated upstream
    public function edit(Category $category)
    {
        return view('admin.editcategory', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
=======

    public function edit(Category $category){
        return view('admin.editcategory', compact('category'));
    }

    public function update(Category $category, Request $request){
>>>>>>> Stashed changes
        $category->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/admin/dashboard/categories');
    }

<<<<<<< Updated upstream
    // quiz
    public function question()
    {
        return view('admin.question');
    }
=======
>>>>>>> Stashed changes

}
