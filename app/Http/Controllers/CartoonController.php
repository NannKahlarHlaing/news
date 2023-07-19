<?php

namespace App\Http\Controllers;

use App\Models\Cartoon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        $post->title = $request->title;
        $post->img_link = $request->img_link;
        $post->camera = $request->camera;
        $post->date = $request->date;

        $post->save();

        return redirect ('/admin/cartoons')->with('status', 'cartoons is updated successfully!');

    }

    public function destroy($id){
        $post = Cartoon::find($id);
        $post->delete();

        return redirect ('/admin/cartoons')->with('status', 'cartoons is deleted successfully!');

    }

    public function details($id){
        $post = Cartoon::find($id);
        return view('/backend.cartoons.detail', compact('post'));
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
            'title' => 'required',
            'img_link' => 'required',
        ])->validate();
    }

    private function getData($request){
        return [
            'title' => $request->title,
            'img_link' => $request->img_link,
            'camera' => $request->camera,
            'date' => $request->date,
            'views' => 0
        ];
    }
}
