<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index(){
        $posts = Page::where('deleted_at', NULL)->get();
        return view('backend.pages.index', compact('posts'));
    }

    public function create_form(){
        return view('backend.pages.create');
    }

    public function create(Request $request){
        $this->validation($request);
        $data = $this->getData($request);

        Page::create($data);

        return redirect('/admin/pages');
    }

    public function update_form($id){
        $post = Page::find($id);
        return view('backend.pages.update', compact('post'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = Page::find($request->id);

        $post->img_url = $request->img_url;
        $post->title_en = $request->title_en;
        $post->title_mm = $request->title_mm;
        $post->title_ch = $request->title_ch;
        $post->desc_en = $request->desc_en;
        $post->desc_mm = $request->desc_mm;
        $post->desc_ch = $request->desc_ch;

        $post->save();

        return redirect ('/admin/pages')->with('status', 'Page is updated successfully!');

    }

    private function validation($request){
        Validator::make($request->all(),[
            'title_en' => 'required',
        ])->validate();
    }

    private function getData($request){
        return [
            'img_url' => $request->img_url,
            'title_en' => $request->title_en,
            'title_mm' => $request->title_mm,
            'title_ch' => $request->title_ch,
            'desc_en' => $request->desc_en,
            'desc_mm' => $request->desc_mm,
            'desc_ch' => $request->desc_ch,
        ];
    }

}
