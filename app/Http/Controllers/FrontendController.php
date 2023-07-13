<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function show_videos(){
        return view('frontend.videos.videos');
    }

    public function show_photos(){
        return view('frontend.photos.photos');
    }

    public function donation(){
        return view('frontend.donation');
    }

    public function careers(){
        return view('frontend.careers');
    }

    public function contact(){
        return view('frontend.contact');
    }
}
