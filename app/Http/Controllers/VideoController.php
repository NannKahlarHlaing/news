<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function index(){
        $posts = Video::where('deleted_at', NULL)->get();
        return view('backend.videos.index', compact('posts'));
    }

    public function create_form(){
        $categories = NewsCategory::where('deleted_at', NULL)->get();
        return view('backend.videos.create', compact('categories'));
    }

    public function create(Request $request){
        $this->validation($request);
        $data = $this->getData($request);

        Video::create($data);

        return redirect('/admin/videos');
    }

    public function update_form($id){
        $post = Video::find($id);
        $categories = NewsCategory::where('deleted_at', NULL)->get();
        return view('backend.videos.update', compact('post', 'categories'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = Video::find($request->id);

        $post->title = $request->title;
        $post->url = $request->url;
        $post->desc = $request->desc;
        $post->category = $request->category;
        
        $post->save();

        return redirect ('/admin/videos')->with('status', 'Videos is updated successfully!');

    }

    public function destroy($id){
        $post = Video::find($id);
        $post->delete();

        return redirect ('/admin/videos')->with('status', 'Videos is deleted successfully!');

    }

    private function validation($request){
        Validator::make($request->all(),[
            'title' => 'required',
            'video_url' => 'required',
            'img_url' => 'required',
            'category' => 'required',
        ])->validate();
    }

    private function getData($request){
        return [
            'title' => $request->title,
            'video_url' => $request->video_url,
            'img_url' => $request->img_url,
            'desc' => $request->desc,
            'category' => $request->category
        ];
    }
}
