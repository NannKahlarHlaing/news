<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    public function index(){
        $posts = Tag::where('deleted_at', NULL)->get();
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

        Tag::create($data);

        return redirect ('/admin/tag');

    }

    public function update_form($id){
        $route_name = Route::currentRouteName();
        $post = Tag::find($id);
        if(!$post){
            abort(404);
        }
        return view('backend.categories.update', compact('post', 'route_name'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = Tag::find($request->id);
        if(!$post){
            abort(404);
        }
        $post->name_en = $request->name_en;
        $post->name_mm = $request->name_mm;
        $post->name_ch = $request->name_ch;
        $post->name_ta = $request->name_ta;
        $post->url_slug = str_replace(' ', '-', strtolower($request->name_en));
        $post->save();

        return redirect ('/admin/tag')->with('status', 'Tag is updated successfully!');

    }

    public function destroy($id){
        $post = Tag::find($id);
        if(!$post){
            abort(404);
        }
        $post->delete();

        return redirect('/admin/tag')->with('status', 'Tag is deleted successfully!');
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
            'name_ta' => $request->name_ta,
            'url_slug' => str_replace(' ', '-', strtolower($request->name_en))
        ];
    }
}
