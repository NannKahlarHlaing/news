<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhotoController extends Controller
{
    public function index(){
        $posts = Photo::where('deleted_at', NULL)->get();
        return view('backend.photos.index', compact('posts'));
    }

    public function create_form(){
        return view('backend.photos.create');
    }

    public function create(Request $request){
        $this->validation($request);
        $data = $this->getData($request);

        Photo::create($data);

        return redirect('/admin/photos');
    }

    public function update_form($id){
        $post = Photo::find($id);
        return view('backend.photos.update', compact('post'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = Photo::find($request->id);

        $post->url = $request->url;
        $post->desc = $request->desc;
        $post->camera = $request->camera;

        $post->save();

        return redirect ('/admin/photos')->with('status', 'Photos is updated successfully!');

    }

    public function destroy($id){
        $post = Photo::find($id);
        $post->delete();

        return redirect ('/admin/photos')->with('status', 'Photos is deleted successfully!');

    }

    public function addValue(Request $request){
        $value = $request->input('value');
        $id = $request->input('id');

        $addedValue = $value + 1;

        $post = Photo::find($id);

        $post->views = $addedValue;

        $post->save();

        return $value;
    }

    private function validation($request){
        Validator::make($request->all(),[
            'url' => 'required',
        ])->validate();
    }

    private function getData($request){
        return [
            'url' => $request->url,
            'desc' => $request->desc,
            'camera' => $request->camera,
            'views' => 0
        ];
    }
}
