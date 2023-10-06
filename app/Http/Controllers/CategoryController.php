<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $posts = Category::where('deleted_at', NULL)->get();
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

        Category::create($data);

        return redirect ('/admin/categories');

    }

    public function update_form($id){
        $route_name = Route::currentRouteName();
        $post = Category::find($id);
        return view('backend.categories.update', compact('post', 'route_name'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = Category::find($request->id);
        $post->name_en = $request->name_en;
        $post->name_mm = $request->name_mm;
        $post->name_ch = $request->name_ch;
        $post->url_slug = str_replace(' ', '-', strtolower($request->name_en));
        $post->save();

        return redirect ('/admin/categories')->with('status', 'Category is updated successfully!');

    }

    public function destroy($id){
        $post = Category::find($id);
        $post->delete();

        return redirect('/admin/categories')->with('status', 'Category is deleted successfully!');
    }

    private function validation($request){
        Validator::make($request->all(),[
            'name_en' => 'required'
        ])->validate();
    }

    private function getData($request){
        return [
            'name_en' => $request->name_en,
            'name_mm' => $request->name_mm,
            'name_ch' => $request->name_ch,
            'url_slug' => str_replace(' ', '-', strtolower($request->name_en))
        ];
    }
}
