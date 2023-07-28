<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('deleted_at', NULL)->get();
        $tags = Tag::where('deleted_at', NULL)->get();
        return view('backend.posts.index', compact('posts', 'tags'));
    }

    public function create_form(){
        $categories = Category::where('deleted_at', NULL)->get();
        $sub_categories = SubCategory::where('deleted_at', NULL)->get();
        $tags = Tag::where('deleted_at', NULL)->get();
        return view('backend.posts.create', compact('categories', 'sub_categories', 'tags'));
    }

    public function create(Request $request){
        $this->validation($request);
        $data = $this->getData($request);

        Post::create($data);

        return redirect ('/admin/posts');
    }

    public function update_form($id){
        $post = Post::find($id);
        $categories = Category::where('deleted_at', NULL)->get();
        $sub_categories = SubCategory::where('deleted_at', NULL)->get();
        $tags = explode(',', $post->tags);
        $all_tags = Tag::where('deleted_at', NULL)->get();
        return view('backend.posts.update', compact('post','categories', 'sub_categories', 'tags', 'all_tags'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = Post::find($request->id);

        $post->img_link = $request->img_link;
        $post->category_id = $request->category;
        $post->sub_category_id = $request->sub_category;
        $post->tags = implode(',', $request->input('tags'));
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
        return view('/backend.posts.detail', compact('post'));
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

    private function validation($request){
        Validator::make($request->all(),[
            'title_en' => 'required',
            'category' => 'required',
            'short_desc_en' => 'required',
        ])->validate();
    }

    private function getData($request){
        return [
            'img_link' => $request->img_link,
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

