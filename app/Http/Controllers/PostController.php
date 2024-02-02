<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(Request $request){

        $search = $request->search;
        $title = $request->title;
        $category = $request->category;
        $lang = $request->lang;
        $search_date = $request->date;

        if(isset($search)){
            $posts = Post::where(function($query) use ($title) {
                        $query->where('title', 'LIKE', '%'. $title. '%')
                        ->orWhere('short_desc','LIKE', '%'. $title. '%')
                        ->orWhere('desc','LIKE', '%'. $title. '%');
                        })
                    ->when($category, function ($query) use ($category) {
                        return $query->where('category_id', '=', $category);
                    })
                    ->when($lang, function ($query) use ($lang) {
                        return $query->where('lang', '=', $lang);
                    })
                    ->when($search_date, function ($query) use ($search_date) {
                        return $query->where('created_at', 'LIKE', '%'. $search_date. '%');
                    })
                    ->orderBy('id', 'desc')
                    ->paginate(20);
        }else{
            $posts = Post::orderby('id', 'desc')->paginate(20);
        }

        $tags = Tag::all();
        $categories = Category::all();

        $route = 'post_index';
        return view('backend.posts.index', compact('posts', 'tags', 'categories', 'title', 'search_date', 'category', 'lang', 'route'));
    }

    public function trashed(Request $request){

        $search = $request->search;
        $title = $request->title;
        $category = $request->category;
        $search_date = $request->date;
        $lang = $request->lang;

        if(isset($search)){
            $posts = Post::onlyTrashed()
                    ->where(function($query) use ($title) {
                        $query->where('title', 'LIKE', '%'. $title. '%')
                        ->orWhere('short_desc','LIKE', '%'. $title. '%')
                        ->orWhere('desc','LIKE', '%'. $title. '%');
                        })
                    ->when($category, function ($query) use ($category) {
                        return $query->where('category_id', '=', $category);
                    })
                    ->when($lang, function ($query) use ($lang) {
                        return $query->where('lang', '=', $lang);
                    })
                    ->when($search_date, function ($query) use ($search_date) {
                        return $query->where('deleted_at', 'LIKE', '%'. $search_date. '%');
                    })
                    ->orderBy('id', 'desc')
                    ->paginate(4);
        }else{
            $posts = Post::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        }

        $tags = Tag::all();
        $categories = Category::all();

        $route = 'post_trashed';
        return view('backend.posts.index', compact('posts', 'tags', 'categories', 'title', 'search_date', 'category', 'lang', 'route'));
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
        $post->title = $request->title;
        $post->topic = $request->topic;
        $post->short_desc = $request->short_desc;
        $post->desc = $request->desc;
        $post->lang = $request->lang;

        $post->save();

        return redirect ('/admin/posts')->with('status', 'Post is updated successfully!');

    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();

        Comment::where('post_id', $id)->delete();

        Country::where('post_id', $id)->delete();

        return redirect ('/admin/posts')->with('status', 'Post is deleted successfully!');

    }

    public function force_delete($id){
        $post = Post::onlyTrashed()->find($id);
        $post->forceDelete();

        Comment::where('post_id', $id)->forceDelete();

        Country::where('post_id', $id)->forceDelete();

        return redirect ('/admin/posts')->with('status', 'Post is deleted permanently!');

    }

    public function details($language, $category, $id){

        $post = Post::find($id);
        $comments= Comment::where('post_id', $id)->latest()->get();
        $relatedPosts = Post::where('category_id', $post->category_id)
                        ->where('id', '<>', $post->id)
                        ->where('lang', $post->lang)
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
        $value = $request->input('value');
        $id = $request->input('id');

        $addedValue = $value + 1;

        $post = Post::find($id);
        $post->views = $addedValue;

        $ip = $request->ip();
        $country = '';
        $response = Http::get("http://ip-api.com/json/{$ip}");

        if ($response->successful()) {
            $data = $response->json();
            if ($data['status'] === 'success') {
                $country = $data['country'];
                Country::create([
                    'post_id' => $id,
                    'country' => $country
                ]);
            }

        }

        $post->save();

        return $addedValue;
    }

    public function searchEn(Request $request){
        return call_user_func_array([$this, 'search'], ['en', $request]);
    }

    public function search($language, Request $request){

        $search = $request->search;

        if($language == 'mm'){
            $posts = Post::where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('topic', 'LIKE', '%' . $search . '%')
                ->orWhere('short_desc', 'LIKE', '%' . $search . '%')
                ->orWhere('desc', 'LIKE', '%' . $search . '%')
                ->paginate(4);
        }elseif($language == 'ch'){
            $posts = Post::where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('topic', 'LIKE', '%' . $search . '%')
                ->orWhere('short_desc', 'LIKE', '%' . $search . '%')
                ->orWhere('desc', 'LIKE', '%' . $search . '%')
                ->paginate(4);
        }elseif($language == 'ta'){
            $posts = Post::where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('topic', 'LIKE', '%' . $search . '%')
                ->orWhere('short_desc', 'LIKE', '%' . $search . '%')
                ->orWhere('desc', 'LIKE', '%' . $search . '%')
                ->paginate(4);
        }else{
            $posts = Post::where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('topic', 'LIKE', '%' . $search . '%')
                ->orWhere('short_desc', 'LIKE', '%' . $search . '%')
                ->orWhere('desc', 'LIKE', '%' . $search . '%')
                ->paginate(4);
        }

        $route = 'post_search';

        return view('frontend.search', compact('posts', 'search', 'route'));
    }

    private function validation($request){
        Validator::make($request->all(),[
            'category' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'short_desc' => 'required',
            'lang' => 'required'
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
            'title' => $request->title,
            'topic' => $request->topic,
            'short_desc' => $request->short_desc,
            'desc' => $request->desc,
            'lang' => $request->lang,
            'views' => 0,
            'like' => 0,
            'love' => 0,
            'wow' => 0,
            'sad' => 0,
        ];
    }
}
