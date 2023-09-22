<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function index(){
        $posts = Video::all();
        return view('backend.videos.index', compact('posts'));
    }

    public function create_form(){
        $categories = Category::where('deleted_at', NULL)->get();
        return view('backend.videos.create', compact('categories'));
    }

    public function create(Request $request){
        Validator::make($request->all(),[
            'video_url' => 'required',
            'img_url' => 'required',
            'category' => 'required',
        ])->validate();
        $this->validation($request);
        $data = $this->getData($request);

        Video::create($data);

        return redirect('/admin/videos');
    }

    public function update_form($id){
        $post = Video::find($id);
        $categories = Category::where('deleted_at', NULL)->get();
        return view('backend.videos.update', compact('post', 'categories'));
    }

    public function update(Request $request){
        dd($request->id);
        $this->validation($request);

        $post = Video::find($request->id);

        $image = $request->file('url');

        if($image != '' || $image != NULL){

            $imageName = uniqid() . time().'.'.$image->extension();
            $original = Image::make($image->path());
            $image->move(public_path('storage/images/original'), $imageName);

            $thumbnail = $original->fit(400, 300, function($constraint){
                $constraint->aspectRatio();
            })->save(public_path('storage/images/thumbnail/' . $imageName));
            $post->img_url = $imageName;
        }

        $post->video_url = $request->video_url;
        $post->category_id = $request->category;
        $post->title_en = $request->title_en;
        $post->title_mm = $request->title_mm;
        $post->title_ch = $request->title_ch;
        $post->desc_en = $request->desc_en;
        $post->desc_mm = $request->desc_mm;
        $post->desc_ch = $request->desc_ch;


        $post->save();

        return redirect ('/admin/videos')->with('status', 'Videos is updated successfully!');

    }

    public function destroy($id){
        $post = Video::find($id);
        $post->delete();

        return redirect ('/admin/videos')->with('status', 'Videos is deleted successfully!');

    }

    public function getVideosByCategory(Request $request){
        $id = $request->id;
        $videos = Video::where('category_id', $id)->orderby('id', 'desc')->paginate(8);

        return $videos;
    }

    public function searchEn(Request $request){
        return call_user_func_array([$this, 'search'], ['en', $request]);
    }

    public function search($language, Request $request){
        $search = $request->search;
        if($language == 'mm'){
            $posts = Video::where('title_mm', 'LIKE', '%' . $search . '%')
                ->orWhere('desc_mm', 'LIKE', '%' . $search . '%')
                ->paginate(4);
        }elseif($language == 'ch'){
            $posts = Video::where('title_ch', 'LIKE', '%' . $search . '%')
                ->orWhere('desc_ch', 'LIKE', '%' . $search . '%')
                ->paginate(4);
        }else{
            $posts = Video::where('title_en', 'LIKE', '%' . $search . '%')
                ->orWhere('desc_en', 'LIKE', '%' . $search . '%')
                ->paginate(4);
        }

        $route = 'video_search';

        return view('frontend.search', compact('posts', 'search', 'route'));
    }

    public function detailsEn($id){
        return call_user_func_array([$this, 'details'], ['en', $id]);
    }

    public function details($language, $id){
        $post = Video::find($id);

        $relatedPosts = Video::where('id', '<>', $post->id)->limit(3)->get();

        return view('frontend.videos.details', compact('post', 'relatedPosts'));
    }

    private function validation($request){
        Validator::make($request->all(),[
            'video_url' => 'required',
            'img_url' => 'required',
            'category' => 'required',
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
            'video_url' => $request->video_url,
            'img_url' => $imageName,
            'category_id' => $request->category,
            'title_en' => $request->title_en,
            'title_mm' => $request->title_mm,
            'title_ch' => $request->title_ch,
            'desc_en' => $request->desc_en,
            'desc_mm' => $request->desc_mm,
            'desc_ch' => $request->desc_ch,
        ];
    }
}
