<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\PhotoEssay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class PhotoEssayController extends Controller
{
    public function index(){
        $posts = PhotoEssay::where('deleted_at', NULL)->get();
        return view('backend.photo_essays.index', compact('posts'));
    }

    public function create_form(){
        return view('backend.photo_essays.create');
    }

    public function create(Request $request){
        $this->validation($request);
        $data = $this->getData($request);

        PhotoEssay::create($data);

        return redirect ('/admin/photo_essays');
    }

    public function update_form($id){
        $post = PhotoEssay::find($id);

        return view('backend.photo_essays.update', compact('post'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = PhotoEssay::find($request->id);

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
        $post->author = $request->author;
        $post->date = $request->date;

        $post->save();

        return redirect ('/admin/photo_essays')->with('status', 'photo_essays is updated successfully!');

    }

    public function destroy($id){
        $post = PhotoEssay::find($id);
        $post->delete();

        return redirect ('/admin/photo_essays')->with('status', 'photo_essays is deleted successfully!');

    }

    public function details($language, $id){
        $post = PhotoEssay::find($id);

        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();

        return view('backend.photo_essays.detail', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch', 'post'));
    }

    public function detailsEn($id){
        return call_user_func_array([$this, 'details'], ['en', $id]);
    }

    public function addValue(Request $request){
        $value = $request->input('value');
        $id = $request->input('id');

        $addedValue = $value + 1;

        $post = PhotoEssay::find($id);

        $post->views = $addedValue;

        $post->save();

        return $addedValue;
    }

    public function likePost($postId) {
        $post = PhotoEssay::find($postId);
        $like = $post->like;
        $post->like = $like + 1;
        $post->save();

        return response('Already liked');
    }

    public function lovePost($postId) {
        $post = PhotoEssay::find($postId);
        $love = $post->love;
        $post->love = $love + 1;
        $post->save();

        return response('Already love');
    }

    public function wowPost($postId) {
        $post = PhotoEssay::find($postId);
        $wow = $post->wow;
        $post->wow = $wow + 1;
        $post->save();

        return response('Already wow');
    }

    public function sadPost($postId) {
        $post = PhotoEssay::find($postId);
        $sad = $post->sad;
        $post->sad = $sad + 1;
        $post->save();

        return response('Already sad');
    }

    private function validation($request){
        Validator::make($request->all(),[

        ])->validate();
    }

    private function getData($request){

        $postController = new PostController();

        $postController->create_path();

        $image = $request->file('img_link');

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
            'img_link' => $imageName,
            'author' => $request->author,
            'date' => $request->date,
        ];
    }
}
