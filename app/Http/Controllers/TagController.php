<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    public function index(){
        $posts = Tag::where('deleted_at', NULL)->get();
        $route_name = Route::currentRouteName();
        return view('backend.categories.index', compact('posts', 'route_name'));
    }

    public function create_form(){
        $route_name = Route::currentRouteName();

        return view('backend.categories.create', compact('route_name'));
    }

    public function create(Request $request){
        $this->validation($request);
        $data = $this->getData($request);

        Tag::create($data);

        return redirect ('/admin/tag');
        
    }
    
    public function update_form($id){
        $route_name = Route::currentRouteName();
        $post = Tag::find($id);
        return view('backend.categories.update', compact('post', 'route_name'));
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $post = Tag::find($request->id);
        $post->name = $request->name;
        $post->save();

        return redirect ('/admin/tag')->with('status', 'Tag is updated successfully!');
        
    }

    public function destroy($id){
        $post = Tag::find($id);
        $post->delete();

        return redirect('/admin/tag')->with('status', 'Tag is deleted successfully!');
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