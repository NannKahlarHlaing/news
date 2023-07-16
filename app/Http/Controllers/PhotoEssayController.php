<?php

namespace App\Http\Controllers;

use App\Models\PhotoEssay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PhotoEssayController extends Controller
{
    public function index(){
        $posts = PhotoEssay::where('deleted_at', NULL)->get();
        return view('backend.photo_essays.index', compact('posts'));
    }

    public function create_form(){
        return view('backend.photo_essays.create');
    }

    public function create(Request $request){
        $this->validation($request);
        $data = $this->getData($request);

        PhotoEssay::create($data);

        return redirect ('/admin/photo_essays');
    }

    public function update_form($id){
        $post = PhotoEssay::find($id);
       
        return view('backend.photo_essays.update', compact('post'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = PhotoEssay::find($request->id);

        $post->title = $request->title;
        $post->topic = $request->topic;
        $post->short_desc = str_replace("\n", "\r\n", $request->short_desc);
        $post->desc = str_replace("\n", "\r\n", $request->desc);
        $post->img_link = $request->img_link;
        $post->author = $request->author;
        $post->date = $request->date;
        
        $post->save();

        return redirect ('/admin/photo_essays')->with('status', 'photo_essays is updated successfully!');

    }

    public function destroy($id){
        $post = PhotoEssay::find($id);
        $post->delete();

        return redirect ('/admin/photo_essays')->with('status', 'photo_essays is deleted successfully!');

    }

    public function details($id){
        $post = PhotoEssay::find($id);
        return view('/backend.photo_essays.detail', compact('post'));
    }

    public function addValue(Request $request){
        $value = $request->input('value');
        $id = $request->input('id');

        $addedValue = $value + 1;

        $post = PhotoEssay::find($id);

        $post->views = $addedValue;

        $post->save();

        return $addedValue;
    }

    private function validation($request){
        Validator::make($request->all(),[
            'title' => 'required',
            'short_desc' => 'required',
        ])->validate();
    }

    private function getData($request){
        return [
            'title' => $request->title,
            'topic' => $request->topic,
            'short_desc' => str_replace("\n", "\r\n", $request->short_desc),
            'desc' => str_replace("\n", "\r\n", $request->desc),
            'img_link' => $request->img_link,
            'author' => $request->author,
            'date' => $request->date,
        ];
    }
}
