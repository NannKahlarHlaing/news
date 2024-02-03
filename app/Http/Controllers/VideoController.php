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
        if(!$post){
            abort(404);
        }
        $categories = Category::where('deleted_at', NULL)->get();
        return view('backend.videos.update', compact('post', 'categories'));
    }

    public function update(Request $request){
        $post = Video::find($request->id);
        if(!$post){
            abort(404);
        }
        
        $this->validation($request);
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

        $post->video_url = $request->video_url;
        $post->category_id = $request->category;
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->lang = $request->lang;

        $post->save();

        return redirect ('/admin/videos')->with('status', 'Videos is updated successfully!');

    }

    public function destroy($id){
        $post = Video::find($id);
        if(!$post){
            abort(404);
        }
        $post->delete();

        return redirect ('/admin/videos')->with('status', 'Videos is deleted successfully!');

    }

    public function getVideosByCategory(Request $request){
        $id = $request->id;
        $videos = Video::where('category_id', $id)->orderby('id', 'desc')->paginate(8);

        return $videos;
    }

    public function searchEn(Request $request){
        return call_user_func_array([$this, 'search'], ['mm', $request]);
    }

    public function search($language, Request $request){
        $search = $request->search;

        $posts = Video::where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('desc', 'LIKE', '%' . $search . '%')
                ->where('lang', $language)
                ->paginate(4);

        $route = 'video_search';

        return view('frontend.search', compact('posts', 'search', 'route'));
    }

    public function detailsEn($id){
        return call_user_func_array([$this, 'details'], ['en', $id]);
    }

    public function details($language, $id){
        $post = Video::find($id);

        if(!$post){
            abort(404);
        }

        $relatedPosts = Video::where('id', '<>', $post->id)->limit(3)->get();

        return view('frontend.videos.details', compact('post', 'relatedPosts'));
    }

    private function validation($request){
        Validator::make($request->all(),[
            'video_url' => 'required',
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
            'title' => $request->title,
            'desc' => $request->desc,
            'lang' => $request->lang
        ];
    }
}
