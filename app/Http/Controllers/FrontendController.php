<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Video;
use App\Models\Career;
use App\Models\PhotoEssay;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
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
