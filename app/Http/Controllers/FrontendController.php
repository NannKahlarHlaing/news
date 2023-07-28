<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Career;
use App\Models\Social;
use App\Models\Post;
use App\Models\PhotoEssay;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home_page(){
        $latest = Post::orderBy('created_at', 'desc')->first();

        $most_view = Post::orderBy('views', 'desc')->first();

        $maxViews = $most_view->views;

        $latestFive = Post::where('views', '<', $maxViews)
                        ->orderBy('views', 'desc')
                        ->take(2)
                        ->get();

        return view('frontend.home', compact('latest', 'most_view', 'latestFive'));
    }

    public function show_videos(){
        $posts = Video::where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    ->get();
        $latest = Video::latest()->first();
        $recents = Video::latest()->skip(1)->take(4)->get();
        $categories = NewsCategory::where('deleted_at', NULL)->get();
        return view('frontend.videos.videos', compact('posts', 'latest', 'recents', 'categories'));
    }

    public function show_photos(){
        $posts = Photo::where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    ->get();
        return view('frontend.photos.photos', compact('posts'));
    }

    public function photo_essays(){
        $posts = PhotoEssay::where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    ->get();
        return view('frontend.photo_essays.essays', compact('posts'));
    }

    public function donation(){
        return view('frontend.donation');
    }
    public function pages( $language, $title){
        // dd($title);
        $posts = Page::where('title_en', $title)
                    ->where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    ->get();
        $post = $posts->first();
        return view('frontend.pages', compact('post'));
    }

    public function pagesEn($title){
        return call_user_func_array([$this, 'pages'], ['en', $title]);
    }

    public function careers(){
        $posts = Career::where('deleted_at', NULL)
            ->orderBy('id', 'desc')
            ->get();
        return view('frontend.careers', compact('posts'));
    }

    public function contact(){
        $info = Social::find(1);

        $email = [];
        $phone = [];
        $facebook = [];
        $youtube = [];
        $instagram = [];
        $twitter = [];
        $linked_in = [];
        $whatsapp = [];
        $line = [];

        if($info != null){
            $email = $this->stringToArray($info->email);
            $phone = $this->stringToArray($info->contact);
            $facebook = $this->stringToArray($info->facebook);
            $youtube = $this->stringToArray($info->youtube);
            $instagram = $this->stringToArray($info->instagram);
            $twitter = $this->stringToArray($info->twitter);
            $linked_in = $this->stringToArray($info->linked_in);
            $whatsapp = $this->stringToArray($info->whatsapp);
            $line = $this->stringToArray($info->line);
        }

        return view('frontend.contact', compact('info', 'email', 'phone', 'facebook', 'youtube', 'instagram', 'twitter', 'linked_in','whatsapp', 'line'));
    }

    public function cartoons(){
        return view('frontend.cartoons');
    }

    private function stringToArray($str){
        $arr = explode(',', $str);
        return $arr;
    }
}
