<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        $tags = Tag::all();
        return view('backend.posts.index', compact('posts', 'tags'));
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
        $relatedPosts = Post::where('category_id', $post->category_id)
                        ->where('id', '<>', $post->id)
                        ->limit(5)
                        ->get();
        $main_menus = MenuItem::where('menu_id', '1')->get();

        return view('/backend.posts.detail', compact('main_menus', 'post', 'relatedPosts'));
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

        $post->save();

        return $addedValue;
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

        $main_menus = MenuItem::where('menu_id', '1')->get();

        return view('frontend.search', compact('main_menus', 'posts', 'search'));
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
            'short_desc_en' => str_replace("\n", "\r\n", $request->short_desc_en),
            'short_desc_mm' => str_replace("\n", "\r\n", $request->short_desc_mm),
            'short_desc_ch' => str_replace("\n", "\r\n", $request->short_desc_ch),
            'desc_en' => str_replace("\n", "\r\n", $request->desc_en),
            'desc_mm' => str_replace("\n", "\r\n", $request->desc_mm),
            'desc_ch' => str_replace("\n", "\r\n", $request->desc_ch),
            'views' => 0
        ];
    }
}

