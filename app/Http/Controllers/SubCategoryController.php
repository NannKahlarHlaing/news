<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function index(){
        $posts = SubCategory::orderBy('id', 'desc')->get();
        $route_name = Route::currentRouteName();
        return view('backend.categories.index', compact('posts', 'route_name'));
    }

    public function create_form(){
        $route_name = Route::currentRouteName();

        $categories = Category::where('deleted_at', NULL)->get();

        return view('backend.categories.create', compact('route_name', 'categories'));
    }

    public function create(Request $request){
        $this->validation($request);
        $data = $this->getData($request);

        SubCategory::create($data);

        return redirect ('/admin/sub_categories');

    }

    public function update_form($id){
        $route_name = Route::currentRouteName();
        $post = SubCategory::find($id);
        if(!$post){
            abort(404);
        }
        $categories = Category::where('deleted_at', NULL)->get();
        return view('backend.categories.update', compact('post', 'route_name', 'categories'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = SubCategory::find($request->id);
        if(!$post){
            abort(404);
        }
        $post->category_id = $request->category;
        $post->name_en = $request->name_en;
        $post->name_mm = $request->name_mm;
        $post->name_ch = $request->name_ch;
        $post->name_ta = $request->name_ta;
        $post->url_slug = str_replace(' ', '-', strtolower($request->name_en));
        $post->save();

        return redirect ('/admin/sub_categories')->with('status', 'SubCategory is updated successfully!');

    }

    public function destroy($id){
        $post = SubCategory::find($id);
        $name_en = $post->name_en;
        $name_mm = $post->name_mm;
        $name_ch = $post->name_ch;
        $name_ta = $post->name_ta;
        if(!$post){
            abort(404);
        }
        $post->delete();
        MenuItem::where('name', $name_en)->orWhere('name', $name_mm)->orWhere('name', $name_ch)->orWhere('name', $name_ta)->delete();

        Post::where('category_id', $id)->delete();
        
        return redirect('/admin/sub_categories')->with('status', 'SubCategory is deleted successfully!');
    }

    public function getSubCategory(Request $request){
        $sub_categories = SubCategory::where('category_id', $request->category)->get();

        return $sub_categories;
    }

    private function validation($request){
        Validator::make($request->all(),[
            'category' => 'required',
            'name_en' => 'required'
        ])->validate();
    }

    private function getData($request){
        return [
            'category_id' => $request->category,
            'name_en' => $request->name_en,
            'name_mm' => $request->name_mm,
            'name_ch' => $request->name_ch,
            'name_ta' => $request->name_ta,
            'url_slug' => str_replace(' ', '-', strtolower($request->name_en))
        ];
    }
}
