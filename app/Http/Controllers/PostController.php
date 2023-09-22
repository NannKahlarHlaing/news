<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(Request $request){

        $search = $request->search;
        $title = $request->title;
        $category = $request->category;

        if(isset($search)){
            $posts = Post::where(function($query) use ($title) {
                        $query->where('title_en', 'LIKE', '%'. $title. '%')
                        ->orWhere('short_desc_en','LIKE', '%'. $title. '%')
                        ->orWhere('desc_en','LIKE', '%'. $title. '%');
                        })
                    ->when($category, function ($query) use ($category) {
                        return $query->where('category_id', '=', $category);
                    })
                    ->orderBy('id', 'desc')
                    ->paginate(4);
        }else{
            $posts = Post::orderby('id', 'desc')->paginate(5);
        }

        $tags = Tag::all();
        $categories = Category::all();

        $route = 'post_index';
        return view('backend.posts.index', compact('posts', 'tags', 'categories', 'title', 'category', 'route'));
    }

    public function trashed(Request $request){

        $search = $request->search;
        $title = $request->title;
        $category = $request->category;

        if(isset($search)){
            $posts = Post::onlyTrashed()
                    ->where(function($query) use ($title) {
                        $query->where('title_en', 'LIKE', '%'. $title. '%')
                        ->orWhere('short_desc_en','LIKE', '%'. $title. '%')
                        ->orWhere('desc_en','LIKE', '%'. $title. '%');
                        })
                    ->when($category, function ($query) use ($category) {
                        return $query->where('category_id', '=', $category);
                    })
                    ->orderBy('id', 'desc')
                    ->paginate(4);
        }else{
            $posts = Post::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        }

        $tags = Tag::all();
        $categories = Category::all();

        $route = 'post_trashed';
        return view('backend.posts.index', compact('posts', 'tags', 'categories', 'title', 'category', 'route'));
    }

    public function restore($id){
        $post = Post::onlyTrashed()->find($id);

        $post->restore();

        return redirect ('/admin/posts');
    }

    public function create_form(){
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $tags = Tag::all();
        return view('backend.posts.create', compact('categories', 'sub_categories', 'tags'));
    }

    public function create(Request $request){
        Validator::make($request->all(),[
            'img_link' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
            'tags' => 'required',
        ])->validate();

        $this->validation($request);

        $data = $this->getData($request);

        Post::create($data);

        return redirect ('/admin/posts');
    }

    public function update_form($id){
        $post = Post::find($id);
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $tags = $post->tags;
        $all_tags = Tag::all();
        return view('backend.posts.update', compact('post','categories', 'sub_categories', 'tags', 'all_tags'));
    }

    public function update(Request $request){
        $this->validation($request);


        $post = Post::find($request->id);

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

        $post->category_id = $request->category;
        $post->sub_category_id = $request->sub_category;
        $post->tags = $request->input('tags');
        $post->title_en = $request->title_en;
        $post->title_mm = $request->title_mm;
        $post->title_ch = $request->title_ch;
        $post->topic_en = $request->topic_en;
        $post->topic_mm = $request->topic_mm;
        $post->topic_ch = $request->topic_ch;
        $post->short_desc_en = str_replace("\n", "\r\n", $request->short_desc_en);
        $post->short_desc_mm = str_replace("\n", "\r\n", $request->short_desc_mm);
        $post->short_desc_ch = str_replace("\n", "\r\n", $request->short_desc_ch);
        $post->desc_en = str_replace("\n", "\r\n", $request->desc_en);
        $post->desc_mm = str_replace("\n", "\r\n", $request->desc_mm);
        $post->desc_ch = str_replace("\n", "\r\n", $request->desc_ch);

        $post->save();

        return redirect ('/admin/posts')->with('status', 'Post is updated successfully!');

    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();

        return redirect ('/admin/posts')->with('status', 'Post is deleted successfully!');

    }

    public function details($language, $category, $id){

        $post = Post::find($id);
        $comments= Comment::where('post_id', $id)->latest()->get();
        $relatedPosts = Post::where('category_id', $post->category_id)
                        ->where('id', '<>', $post->id)
                        ->limit(5)
                        ->get();

        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();

        return view('/backend.posts.detail', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch', 'post', 'relatedPosts', 'comments'));
    }

    public function detailsEn($category, $id){
        return call_user_func_array([$this, 'details'], ['en', $category, $id]);
    }

    public function addValue(Request $request){
        $ip = $request->ip();

        $value = $request->input('value');
        $id = $request->input('id');

        $addedValue = $value + 1;

        $post = Post::find($id);

        $post->views = $addedValue;

        $post->save();

        return $ip;
    }

    public function searchEn(Request $request){
        return call_user_func_array([$this, 'search'], ['en', $request]);
    }

    public function search($language, Request $request){

        $search = $request->search;

        if($language == 'mm'){
            $posts = Post::where('title_mm', 'LIKE', '%' . $search . '%')
                ->orWhere('topic_mm', 'LIKE', '%' . $search . '%')
                ->orWhere('short_desc_mm', 'LIKE', '%' . $search . '%')
                ->orWhere('desc_mm', 'LIKE', '%' . $search . '%')
                ->paginate(4);
        }elseif($language == 'ch'){
            $posts = Post::where('title_ch', 'LIKE', '%' . $search . '%')
                ->orWhere('topic_ch', 'LIKE', '%' . $search . '%')
                ->orWhere('short_desc_ch', 'LIKE', '%' . $search . '%')
                ->orWhere('desc_ch', 'LIKE', '%' . $search . '%')
                ->paginate(4);
        }else{
            $posts = Post::where('title_en', 'LIKE', '%' . $search . '%')
                ->orWhere('topic_en', 'LIKE', '%' . $search . '%')
                ->orWhere('short_desc_en', 'LIKE', '%' . $search . '%')
                ->orWhere('desc_en', 'LIKE', '%' . $search . '%')
                ->paginate(4);
        }

        $route = 'post_search';

        return view('frontend.search', compact('posts', 'search', 'route'));
    }

    private function validation($request){
        Validator::make($request->all(),[
            'title_en' => 'required',
            'category' => 'required',
            'short_desc_en' => 'required',
        ])->validate();
    }

    public function create_path(){
        $path_image = public_path('storage/images/original');
        $path_thumbnail = public_path('storage/images/thumbnail');

        if(!File::isDirectory($path_image)){
            File::makeDirectory($path_image, 0777, true, true);
        }

        if(!File::isDirectory($path_thumbnail)){
            File::makeDirectory($path_thumbnail, 0777, true, true);
        }
    }

    public function likePost($postId) {
        // $cookieName = "liked_" . $postId;
        $post = Post::find($postId);
        $like = $post->like;
        $post->like = $like + 1;
        $post->save();

        return response('Already liked');
    }

    public function lovePost($postId) {
        $post = Post::find($postId);
        $love = $post->love;
        $post->love = $love + 1;
        $post->save();

        return response('Already love');
    }

    public function wowPost($postId) {
        $post = Post::find($postId);
        $wow = $post->wow;
        $post->wow = $wow + 1;
        $post->save();

        return response('Already wow');
    }

    public function sadPost($postId) {
        $post = Post::find($postId);
        $sad = $post->sad;
        $post->sad = $sad + 1;
        $post->save();

        return response('Already sad');
    }

    private function getData($request){

        $this->create_path();

        $image = $request->file('img_link');

        $imageName = uniqid() . time().'.'.$image->extension();
        $original = Image::make($image->path());
        $image->move(public_path('storage/images/original'), $imageName);

        $thumbnail = $original->fit(400, 300, function($constraint){
            $constraint->aspectRatio();
        })->save(public_path('storage/images/thumbnail/' . $imageName));


        return [
            'img_link' => $imageName,
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'tags' => $request->input('tags'),
            'title_en' => $request->title_en,
            'title_mm' => $request->title_mm,
            'title_ch' => $request->title_ch,
            'topic_en' => $request->topic_en,
            'topic_mm' => $request->topic_mm,
            'topic_ch' => $request->topic_ch,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_mm' => $request->short_desc_mm,
            'short_desc_ch' => $request->short_desc_ch,
            'desc_en' => $request->desc_en,
            'desc_mm' => $request->desc_mm,
            'desc_ch' => $request->desc_ch,
            'views' => 0,
            'like' => 0,
            'love' => 0,
            'wow' => 0,
            'sad' => 0,
        ];
    }
}

