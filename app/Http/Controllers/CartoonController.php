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

        $this->validation($request);
        $data = $this->getData($request);

        Cartoon::create($data);

        return redirect ('/admin/cartoons');
    }

    public function update_form($id){
        $post = Cartoon::find($id);

        return view('backend.cartoons.update', compact('post'));
    }

    public function update(Request $request){
        $this->validation($request);

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
        $post->cartoonist_en = $request->cartoonist_en;
        $post->cartoonist_mm = $request->cartoonist_mm;
        $post->cartoonist_ch = $request->cartoonist_ch;

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

        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();

        return view('backend.cartoons.detail', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch', 'post', 'relatedPosts'));
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
            'category_id' => $request->category_id,
            'title_en' => $request->title_en,
            'title_mm' => $request->title_mm,
            'title_ch' => $request->title_ch,
            'cartoonist_en' => $request->cartoonist_en,
            'cartoonist_mm' => $request->cartoonist_mm,
            'cartoonist_ch' => $request->cartoonist_ch,
            'views' => 0
        ];
    }
}
