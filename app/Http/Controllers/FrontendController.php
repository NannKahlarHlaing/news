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

        $most_view = Post::orderBy('views', 'desc')->first();

        $maxViews = $most_view->views;

        $mostViews = $this->mostFiveViews($most_view);

        $latestTen = Post::orderBy('id', 'desc')
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

        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();

        return view('frontend.home', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch','latest', 'most_view', 'mostViews', 'latestTen', 'temperature', 'burmas', 'businesses', 'persons', 'opinions', 'lifeStyles', 'specials', 'catBurma', 'catBusiness', 'catInperson', 'catOpinion', 'catLifeStyle', 'catSpecial', 'latest_photo', 'latest_cartoon', 'lasts_cartoons'));

    }

    public function main_categoriesEn($category){
        return call_user_func_array([$this, 'main_categories'], ['en', $category]);
    }

    public function main_categories($language, $name){
        $category = Category::where('name_en', $name)->first();

        $id = $category->id;

        $sub_cat = $category;

        $posts = Post::where('category_id', $id)
                ->orderBy('id', 'desc')
                ->get();

        $latest = Post::where('category_id', $id)
        ->orderBy('id', 'desc')
        ->first();

        $posts = Post::orderBy('id', 'desc')->paginate(9);

        $most_view = Post::orderBy('views', 'desc')->first();

        $mostViews = $this->mostFiveViews($most_view);

        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();

        return view('frontend.sub_page', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch', 'sub_cat', 'latest', 'most_view', 'mostViews', 'posts'));
    }

    public function sub_categories($language, $sub_category){
        $cat= SubCategory::where('name_en', $sub_category)->get();
        $sub_cat = $cat->first();
        $latest = Post::where('sub_category_id', $sub_cat->id)
                ->orderBy('id', 'desc')
                ->first();

        $posts = Post::orderBy('id', 'desc')->paginate(9);

        $most_view = Post::orderBy('views', 'desc')->first();

        $mostViews = $this->mostFiveViews($most_view);

        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();

        return view('frontend.sub_page', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch', 'sub_cat', 'latest', 'most_view', 'mostViews', 'posts'));
    }

    public function sub_categoriesEn($sub_category){
        return call_user_func_array([$this, 'sub_categories'], ['en', $sub_category]);
    }

    public function show_videos(){
        $posts = Video::where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    ->paginate(8);
        $latest = Video::latest()->first();
        $categories = Category::where('deleted_at', NULL)->get();

        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();

        return view('frontend.videos.videos', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch', 'posts', 'latest', 'categories'));
    }

    public function show_photos(){
        $posts = Photo::where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    ->paginate(8);

        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();

        return view('frontend.photos.photos', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch', 'posts'));
    }

    public function photo_essays(){
        $sub_cat = ['photo_essays', 'Photo Essays'];
        $latest = PhotoEssay::orderBy('created_at', 'desc')
                    ->first();

        $posts = PhotoEssay::orderBy('id', 'desc')->paginate(9);

        $most_view = Post::orderBy('views', 'desc')->first();

        $mostViews = $this->mostFiveViews($most_view);

        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();

        return view('frontend.sub_page', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch', 'sub_cat', 'latest', 'most_view', 'mostViews', 'posts'));
    }

    public function donation(){
        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();
        return view('frontend.donation', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch'));
    }

    public function pages( $language, $title){
        // dd($title);
        $posts = Page::where('title_en', $title)
                    ->where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    ->get();
        $post = $posts->first();

        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();

        return view('frontend.pages', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch','post'));
    }

    public function pagesEn($title){
        return call_user_func_array([$this, 'pages'], ['en', $title]);
    }

    public function careers(){
        $posts = Career::where('deleted_at', NULL)
            ->orderBy('id', 'desc')
            ->get();

        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();

        return view('frontend.careers', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch', 'posts'));
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

        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();

        return view('frontend.contact', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch', 'info', 'email', 'phone', 'facebook', 'youtube', 'instagram', 'twitter', 'linked_in','whatsapp', 'line'));
    }

    public function cartoons(){

        $latest = Cartoon::latest()->first();

        $cartoons = Cartoon::orderBy('id', 'desc')->get();

        $main_menus_en = MenuItem::where('menu_id', '1')->get();
        $main_menus_mm = MenuItem::where('menu_id', '2')->get();
        $main_menus_ch = MenuItem::where('menu_id', '3')->get();
        $footer_menus_en = MenuItem::where('menu_id', '4')->get();
        $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
        $footer_menus_ch = MenuItem::where('menu_id', '6')->get();

        return view('frontend.cartoons', compact('main_menus_en', 'main_menus_mm', 'main_menus_ch', 'footer_menus_en', 'footer_menus_mm', 'footer_menus_ch', 'latest', 'cartoons'));
    }

    private function stringToArray($str){
        $arr = explode(',', $str);
        return $arr;
    }

    private function mostFiveViews($most_view){
        $maxViews = $most_view->views;

        $mostViews = Post::where('views', '<', $maxViews)
                    ->orderBy('views', 'desc')
                    ->take(4)
                    ->get();

        return $mostViews;
    }
}
