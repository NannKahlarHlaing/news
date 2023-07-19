<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('deleted_at', NULL)->get();
        return view('backend.posts.index', compact('posts'));
    }

    public function create_form(){
        $categories = Category::where('deleted_at', NULL)->get();
        return view('backend.posts.create', compact('categories'));
    }

    public function create(Request $request){
        $this->validation($request);
        $data = $this->getData($request);

        Post::create($data);

        return redirect ('/admin/posts');
    }

    public function update_form($id){
        $post = Post::find($id);
        $categories = Category::where('deleted_at', NULL)->get();
        return view('backend.posts.update', compact('post','categories'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = Post::find($request->id);

        $post->title = $request->title;
        $post->category = $request->category;
        $post->topic = $request->topic;
        $post->short_desc = str_replace("\n", "\r\n", $request->short_desc);
        $post->desc = str_replace("\n", "\r\n", $request->desc);
        $post->img_link = $request->img_link;
        

        $post->save();

        return redirect ('/admin/posts')->with('status', 'Post is updated successfully!');

    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();

        return redirect ('/admin/posts')->with('status', 'Post is deleted successfully!');

    }

    public function details($category, $id){
        $post = Post::find($id);
        return view('/backend.posts.detail', compact('post'));
    }

    public function addValue(Request $request){
        $value = $request->input('value');
        $id = $request->input('id');

        $addedValue = $value + 1;

        $post = Post::find($id);

        $post->views = $addedValue;

        $post->save();

        return $addedValue;
    }

    private function validation($request){
        Validator::make($request->all(),[
            'title' => 'required',
            'category' => 'required',
            'short_desc' => 'required',
        ])->validate();
    }

    private function getData($request){
        return [
            'title' => $request->title,
            'category' => $request->category,
            'topic' => $request->topic,
            'short_desc' => str_replace("\n", "\r\n", $request->short_desc),
            'desc' => str_replace("\n", "\r\n", $request->desc),
            'img_link' => $request->img_link,
            'views' => 0
        ];
    }
}

