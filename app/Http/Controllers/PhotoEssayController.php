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
        $posts = PhotoEssay::where('deleted_at', NULL)->paginate(10);
        return view('backend.photo_essays.index', compact('posts'));
    }

    public function create_form(){
        return view('backend.photo_essays.create');
    }

    public function create(Request $request){
        Validator::make($request->all(),[
            'img_link' => 'required',
        ])->validate();

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

        $post->title = $request->title;
        $post->topic = $request->topic;
        $post->short_desc = $request->short_desc;
        $post->desc = $request->desc;
        $post->author = $request->author;
        $post->lang = $request->lang;

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

        return view('backend.photo_essays.detail', compact('post'));
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
            'title' => 'required',
            'short_desc' => 'required',
            'img_link' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lang' => 'required'
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
            'title' => $request->title,
            'topic' => $request->topic,
            'short_desc' => $request->short_desc,
            'desc' => $request->desc,
            'img_link' => $imageName,
            'author' => $request->author,
            'lang' => $request->lang,
            'like' => 0,
            'love' => 0,
            'wow' => 0,
            'sad' => 0,
            'country' => '',
        ];
    }
}
