<?php

namespace App\Http\Controllers;

use App\Models\PhotoEssay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $post->img_link = $request->img_link;
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

    private function validation($request){
        Validator::make($request->all(),[

        ])->validate();
    }

    private function getData($request){
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
            'img_link' => $request->img_link,
            'author' => $request->author,
            'date' => $request->date,
        ];
    }
}
