<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Video;
use App\Models\Career;
use App\Models\Social;
use App\Models\Cartoon;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\PhotoEssay;
use App\Models\SubCategory;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

        $mostViews = Post::orderBy('views', 'desc')->take(5)->get();

        $latestTen = Post::orderBy('id', 'desc')
                    ->where('id', '!=', $latest->id)
                    ->take(6)
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

        $latest_photo = Photo::orderBy('id', 'desc')->first();

        $latest_cartoon = Cartoon::orderBy('id', 'desc')->first();

        $lasts_cartoons = Cartoon::latest()->take(6)->get();

        return view('frontend.home', compact('latest', 'mostViews', 'latestTen', 'temperature', 'burmas', 'businesses', 'persons', 'opinions', 'lifeStyles', 'specials', 'catBurma', 'catBusiness', 'catInperson', 'catOpinion', 'catLifeStyle', 'catSpecial', 'latest_photo', 'latest_cartoon', 'lasts_cartoons'));

    }

    public function main_categoriesEn($category){
        return call_user_func_array([$this, 'main_categories'], ['en', $category]);
    }

    public function main_categories($language, $name){
        $category = Category::where('url_slug', $name)->first();
        $id = $category->id;
        $sub_cat = $category;

        $sub_categories = SubCategory::where('category_id', $id)->latest()->get();
        $latest = Post::where('category_id', $id)
                    ->orderBy('id', 'desc')
                    ->first();

        $posts = Post::where('category_id', $id)
                    ->where('id', '!=', $latest->id)
                    ->orderBy('id', 'desc')
                    ->paginate(9);

        $mostViews = Post::orderBy('views', 'desc')->take(5)->get();

        return view('frontend.sub_page', compact('sub_categories', 'sub_cat', 'latest', 'mostViews', 'posts'));
    }

    public function sub_categories($language, $main_categroy, $sub_category){
        $sub_cat = SubCategory::where('url_slug', $sub_category)->first();
        $id = $sub_cat->id;
        $latest = Post::where('sub_category_id', $sub_cat->id)
                ->orderBy('id', 'desc')
                ->first();

        $posts = Post::where('sub_category_id', $id)
                ->where('id', '!=', $latest->id)
                ->orderBy('id', 'desc')
                ->paginate(9);

        $mostViews = Post::orderBy('views', 'desc')->take(5)->get();

        return view('frontend.sub_page', compact('sub_cat', 'latest', 'mostViews', 'posts'));
    }

    public function sub_categoriesEn($main_categroy, $sub_category){
        return call_user_func_array([$this, 'sub_categories'], ['en', $main_categroy, $sub_category]);
    }

    public function show_videos(){
        $posts = Video::where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    ->paginate(2);
        $latest = Video::latest()->first();
        $categories = Category::where('deleted_at', NULL)->get();

        return view('frontend.videos.videos', compact('posts', 'latest', 'categories'));
    }

    public function show_photos(){
        $posts = Photo::where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    ->paginate(8);

        return view('frontend.photos.photos', compact('posts'));
    }

    public function photo_essays(){
        $sub_cat = ['photo_essays', 'Photo Essays'];
        $latest = PhotoEssay::latest('id')->first();

        $posts = PhotoEssay::where('id', '!=', $latest->id)->orderBy('id', 'desc')->paginate(9);

        $mostViews = Post::orderBy('views', 'desc')->take(5)->get();

        return view('frontend.sub_page', compact('sub_cat', 'latest', 'mostViews', 'posts'));
    }

    public function pages( $language, $title){
        $posts = Page::where('url_slug', $title)
                    ->where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    ->get();
        $post = $posts->first();

        return view('frontend.pages', compact('post'));
    }

    public function pagesEn($title){
        return call_user_func_array([$this, 'pages'], ['en', $title]);
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

        $latest = Cartoon::latest()->first();

        $cartoons = Cartoon::orderBy('id', 'desc')->get();

        return view('frontend.cartoons', compact('latest', 'cartoons'));
    }

    private function stringToArray($str){
        $arr = explode(',', $str);
        return $arr;
    }

}
