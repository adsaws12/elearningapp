<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }
    public function category(){
        return view('admin.category');
    }
    public function profile(){
        return view('user.userprofile');
    }
    public function store(Request $request){
        Category::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect('/admin/dashboard/categories');
    }
    public function view(Category $category){
        return view('admin.quizzes', compact('category'));
    }
    public function delete($id){
        
        Category::where('id',$id)->delete();

        return redirect('/admin/dashboard/categories');
    }
    public function edit(Category $category){
        return view('admin.editcategory', compact('category'));
    }
    public function update(Category $category, Request $request){
        $category->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/admin/dashboard/categories');
    }

    // quiz
    public function question(){
        return view('admin.question');
    }

}
