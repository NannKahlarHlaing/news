<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NewsCategoryController extends Controller
{
    public function index(){
        $posts = NewsCategory::where('deleted_at', NULL)->get();
        return view('backend.categories.index', compact('posts'));
    }

    public function create_form(){
        return view('backend.categories.create');
    }

    public function create(Request $request){
        $this->validation($request);
        $data = $this->getData($request);

        NewsCategory::create($data);

        return redirect ('/admin/categories');
        
    }
    
    public function update_form($id){
        $post = NewsCategory::find($id);
        return view('backend.categories.update', compact('post'));
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $post = NewsCategory::find($request->id);
        $post->name = $request->name;
        $post->save();

        return redirect ('/admin/categories')->with('status', 'NewsCategory is updated successfully!');
        
    }

    public function destroy($id){
        $post = NewsCategory::find($id);
        $post->delete();

        return redirect('/admin/categories')->with('status', 'NewsCategory is deleted successfully!');
    }

    private function validation($request){
        Validator::make($request->all(),[
            'name' => 'required'
        ])->validate();
    }

    private function getData($request){
        return [
            'name' => $request->name
        ];
    }
}
