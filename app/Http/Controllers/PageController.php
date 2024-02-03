<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\PostController;
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
        if(!$post){
            abort(404);
        }
        return view('backend.pages.update', compact('post'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = Page::find($request->id);
        if(!$post){
            abort(404);
        }

        $image = $request->file('img_url');

        if($image != '' || $image != NULL){

            $imageName = uniqid() . time().'.'.$image->extension();
            $original = Image::make($image->path());
            $image->move(public_path('storage/images/original'), $imageName);

            $thumbnail = $original->fit(400, 300, function($constraint){
                $constraint->aspectRatio();
            })->save(public_path('storage/images/thumbnail/' . $imageName));
            $post->img_url = $imageName;
        }

        $post->title = $request->title;
        $post->title_en = $request->title_en;
        $post->desc = $request->desc;
        $post->lang = $request->lang;
        $post->url_slug = str_replace(' ', '-', strtolower($request->title_en));

        $post->save();

        return redirect ('/admin/pages')->with('status', 'Page is updated successfully!');

    }

    public function destroy($id){
        $post = Page::find($id);
        if(!$post){
            abort(404);
        }
        $post->delete();

        return redirect ('/admin/pages')->with('status', 'Post is deleted successfully!');

    }

    private function validation($request){
        Validator::make($request->all(),[
            'title' => 'required',
            'title_en' => 'required',
            'lang' => 'required'
        ])->validate();
    }

    private function getData($request){

        $postController = new PostController();

        $postController->create_path();

        $image = $request->file('img_url');

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
            'img_url' => $imageName,
            'title' => $request->title,
            'title_en' => $request->title_en,
            'lang' => $request->lang,
            'desc' => $request->desc,
            'url_slug' =>  str_replace(' ', '-', strtolower($request->title_en))
        ];
    }

}
