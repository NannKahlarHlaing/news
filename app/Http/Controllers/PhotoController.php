<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
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

        $image = $request->file('url'); 

        if($image != '' || $image != NULL){

            $imageName = uniqid() . time().'.'.$image->extension();
            $original = Image::make($image->path());
            $image->move(public_path('storage/images/original'), $imageName);

            $thumbnail = $original->fit(400, 300, function($constraint){
                $constraint->aspectRatio();
            })->save(public_path('storage/images/thumbnail/' . $imageName));
            $post->url = $imageName;
        }

        $post->desc_en = $request->desc_en;
        $post->desc_mm = $request->desc_mm;
        $post->desc_ch = $request->desc_ch;
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

        $postController = new PostController();

        $postController->create_path();

        $image = $request->file('url'); 

        if($image != '' || $image != NULL){

            $imageName = uniqid() . time().'.'.$image->extension();
            $original = Image::make($image->path());
            $image->move(public_path('storage/images/original'), $imageName);

            $thumbnail = $original->fit(400, 300, function($constraint){
                $constraint->aspectRatio();
            })->save(public_path('storage/images/thumbnail/' . $imageName));

        }else{
            $imageName = '';
        }

        return [
            'url' => $imageName,
            'desc_en' => $request->desc_en,
            'desc_mm' => $request->desc_mm,
            'desc_ch' => $request->desc_ch,
            'camera' => $request->camera,
            'views' => 0
        ];
    }
}
