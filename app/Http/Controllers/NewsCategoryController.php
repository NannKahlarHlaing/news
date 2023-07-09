<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsCategoryController extends Controller
{
    public function index(){
        $posts = NewsCategory::all();
        return view('backend.categories.news.index', compact('posts'));
    }

    public function create_form(){
        return view('backend.categories.news.create');
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        NewsCategory::create([
            'name' => $request->name
        ]);

        return redirect ('/admin/categories/news');
        
    }
    
    public function update_form($id){
        $post = NewsCategory::find($id);
        return view('backend.categories.news.update', compact('post'));
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $post = NewsCategory::find($request->id);
        $post->name = $request->name;
        $post->save();

        return redirect ('/admin/categories/news');
        
    }

    public function destroy($id){
        $post = NewsCategory::find($id);
        $post->delete();

        return redirect('/admin/categories/news')->with('status', 'NewsCategory is deleted successfully!');
    }
}
