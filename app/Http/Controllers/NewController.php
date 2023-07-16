<?php

namespace App\Http\Controllers;

use App\Models\NewModel;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NewController extends Controller
{
    public function index(){
        $posts = NewModel::where('deleted_at', NULL)->get();
        return view('backend.news.index', compact('posts'));
    }

    public function create_form(){
        $categories = NewsCategory::where('deleted_at', NULL)->get();
        return view('backend.news.create', compact('categories'));
    }

    public function create(Request $request){
        $this->validation($request);
        $data = $this->getData($request);

        NewModel::create($data);

        return redirect ('/admin/news');
    }

    public function update_form($id){
        $post = NewModel::find($id);
        $categories = NewsCategory::where('deleted_at', NULL)->get();
        return view('backend.news.update', compact('post','categories'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = NewModel::find($request->id);

        $post->title = $request->title;
        $post->category = $request->category;
        $post->topic = $request->topic;
        $post->short_desc = $request->short_desc;
        $post->desc = $request->desc;
        $post->img_link = $request->img_link;
        $post->fb_link = $request->fb_link;
        $post->tw_link = $request->tw_link;
        $post->li_link = $request->li_link;

        $post->save();

        return redirect ('/admin/news')->with('status', 'News is updated successfully!');

    }

    public function destroy($id){
        $post = NewModel::find($id);
        $post->delete();

        return redirect ('/admin/news')->with('status', 'News is deleted successfully!');

    }

    public function details($id){
        $post = NewModel::find($id);
        return view('/backend.news.detail', compact('post'));
    }

    public function addValue(Request $request){
        $value = $request->input('value');
        $id = $request->input('id');

        $addedValue = $value + 1;

        $post = NewModel::find($id);

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
            'short_desc' => $request->short_desc,
            'desc' => $request->desc,
            'img_link' => $request->img_link,
            'views' => 0
        ];
    }
}
