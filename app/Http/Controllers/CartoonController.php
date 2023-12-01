<?php

namespace App\Http\Controllers;

use App\Models\Cartoon;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class CartoonController extends Controller
{
    public function index(){
        $posts = Cartoon::where('deleted_at', NULL)->get();
        return view('backend.cartoons.index', compact('posts'));
    }

    public function create_form(){
        return view('backend.cartoons.create');
    }

    public function create(Request $request){
        Validator::make($request->all(),[
            'img_link' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ])->validate();

        // $this->validation($request);
        $data = $this->getData($request);

        Cartoon::create($data);

        return redirect ('/admin/cartoons');
    }

    public function update_form($id){
        $post = Cartoon::find($id);

        return view('backend.cartoons.update', compact('post'));
    }

    public function update(Request $request){
        // $this->validation($request);

        $post = Cartoon::find($request->id);

        $image = $request->file('img_link');

        if($image != '' || $image != NULL){
            $imageName = uniqid() . time().'.'.$image->extension();
            $original = Image::make($image->path());
            $image->move(public_path('storage/images/original'), $imageName);

            $thumbnail = $original->fit(400, 300, function($constraint){
                $constraint->aspectRatio();
            })->save(public_path('storage/images/thumbnail/' . $imageName));

            $post->img_link = $imageName;
        }

        $post->title_en = $request->title_en;
        $post->title_mm = $request->title_mm;
        $post->title_ch = $request->title_ch;
        $post->title_ta = $request->title_ta;
        $post->cartoonist = $request->cartoonist;

        $post->save();

        return redirect ('/admin/cartoons')->with('status', 'cartoons is updated successfully!');

    }

    public function destroy($id){
        $post = Cartoon::find($id);
        $post->delete();

        return redirect ('/admin/cartoons')->with('status', 'cartoons is deleted successfully!');

    }

    public function details($language, $id){
        $post = Cartoon::find($id);

        $relatedPosts = Cartoon::where('id', '<>', $post->id)->limit(3)->get();

        return view('backend.cartoons.detail', compact('post', 'relatedPosts'));
    }

    public function detailsEn($id){
        return call_user_func_array([$this, 'details'], ['en', $id]);
    }

    public function addValue(Request $request){
        $value = $request->input('value');
        $id = $request->input('id');

        $addedValue = $value + 1;

        $post = Cartoon::find($id);

        $post->views = $addedValue;

        $post->save();

        return $addedValue;
    }

    private function validation($request){
        Validator::make($request->all(),[
            'title_en' => 'required',
        ])->validate();
    }

    private function getData($request){
        $controller = app(\App\Http\Controllers\PostController::class);

        $controller->create_path();

        $image = $request->file('img_link');

        $imageName = uniqid() . time().'.'.$image->extension();
        $original = Image::make($image->path());
        $image->move(public_path('storage/images/original'), $imageName);

        $thumbnail = $original->fit(400, 300, function($constraint){
            $constraint->aspectRatio();
        })->save(public_path('storage/images/thumbnail/' . $imageName));
        return [
            'img_link' => $imageName,
            'title_en' => $request->title_en,
            'title_mm' => $request->title_mm,
            'title_ch' => $request->title_ch,
            'title_ta' => $request->title_ta,
            'cartoonist' => $request->cartoonist,
            'views' => 0
        ];
    }
}
