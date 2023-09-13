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
        return view('backend.pages.update', compact('post'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = Page::find($request->id);

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

        $post->title_en = $request->title_en;
        $post->title_mm = $request->title_mm;
        $post->title_ch = $request->title_ch;
        $post->desc_en = $request->desc_en;
        $post->desc_mm = $request->desc_mm;
        $post->desc_ch = $request->desc_ch;

        $post->save();

        return redirect ('/admin/pages')->with('status', 'Page is updated successfully!');

    }

    public function destroy($id){
        $post = Page::find($id);
        $post->delete();

        return redirect ('/admin/pages')->with('status', 'Post is deleted successfully!');

    }


    private function validation($request){
        Validator::make($request->all(),[
            'title_en' => 'required',
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
            'title_en' => $request->title_en,
            'title_mm' => $request->title_mm,
            'title_ch' => $request->title_ch,
            'desc_en' => $request->desc_en,
            'desc_mm' => $request->desc_mm,
            'desc_ch' => $request->desc_ch,
        ];
    }

}
