<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Career;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function show_videos(){
        return view('frontend.videos.videos');
    }

    public function show_photos(){
        $posts = Photo::where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    ->get();
        return view('frontend.photos.photos', compact('posts'));
    }

    public function donation(){
        return view('frontend.donation');
    }

    public function careers(){
        $posts = Career::where('deleted_at', NULL)
            ->orderBy('id', 'desc')
            ->get();
        return view('frontend.careers', compact('posts'));
    }

    public function contact(){
        return view('frontend.contact');
    }
}
