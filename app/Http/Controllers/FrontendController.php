<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Career;
use App\Models\Social;
use App\Models\Category;
use App\Models\PhotoEssay;
use App\Models\SubCategory;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function home_page(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.openweathermap.org/data/2.5/weather?lat=16.86607&lon=96.195129&appid=887985b8bce1140c4ae6ee6a76f03744&units=metric',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        $main = $data['main'];
        $temperature = intval($main['temp']);

        $latest = Post::orderBy('created_at', 'desc')->first();

        $most_view = Post::orderBy('views', 'desc')->first();

        $maxViews = $most_view->views;

        $mostViews = Post::where('views', '<', $maxViews)
                        ->orderBy('views', 'desc')
                        ->take(4)
                        ->get();

        $latestTen = Post::orderBy('id', 'desc')
                    ->take(10)
                    ->get();

        $catBurma = 'Burma'; //subcategory
        $cat = SubCategory::where('name_en', $catBurma)->get();
        $burmas = Post::where('sub_category_id', $cat->first()->id)
                    ->orderBy('id', 'desc')
                    ->take(3)
                    ->get();

        $catBusiness = 'Business';
        $cat = Category::where('name_en', $catBusiness)->get();
        $businesses = Post::where('category_id', $cat->first()->id)
                    ->orderBy('id', 'desc')
                    ->take(3)
                    ->get();

        $catInperson = 'In Person';
        $cat = Category::where('name_en', $catInperson)->get();
        $persons = Post::where('category_id', $cat->first()->id)
                    ->orderBy('id', 'desc')
                    ->take(3)
                    ->get();

        $catOpinion = 'Opinion';
        $cat = Category::where('name_en', $catOpinion)->get();
        $opinions = Post::where('category_id', $cat->first()->id)
                    ->orderBy('id', 'desc')
                    ->take(3)
                    ->get();

        $catLifeStyle = 'LifeStyle';
        $cat = Category::where('name_en', $catLifeStyle)->get();
        $lifeStyles = Post::where('category_id', $cat->first()->id)
                    ->orderBy('id', 'desc')
                    ->take(3)
                    ->get();

        $catSpecial = 'Specials';
        $cat = Category::where('name_en', $catSpecial)->get();
        $specials = Post::where('category_id', $cat->first()->id)
                    ->orderBy('id', 'desc')
                    ->take(3)
                    ->get();
        // dd($specials);
        return view('frontend.home', compact('latest', 'most_view', 'mostViews', 'latestTen', 'temperature', 'burmas', 'businesses', 'persons', 'opinions', 'lifeStyles', 'specials', 'catBurma', 'catBusiness', 'catInperson', 'catOpinion', 'catLifeStyle', 'catSpecial'));
    }

    public function sub_categories($sub_category){
        $cat= SubCategory::where('name_en', $sub_category)->get();
        $sub_cat = $cat->first();
        $latest = Post::where('sub_category_id', $sub_cat->id)
                ->orderBy('id', 'desc')
                ->first();
                // dd($sub_cat);

        $latestTen = Post::orderBy('id', 'desc')
            ->take(9)
            ->get();

        $most_view = Post::orderBy('views', 'desc')->first();

        $maxViews = $most_view->views;

        $mostViews = Post::where('views', '<', $maxViews)
                        ->orderBy('views', 'desc')
                        ->take(4)
                        ->get();

        return view('frontend.sub_page', compact('sub_cat', 'latest', 'most_view', 'mostViews', 'latestTen'));
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
