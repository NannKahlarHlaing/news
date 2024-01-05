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
use Illuminate\Support\Facades\DB;
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

        $latestPosts = Post::whereIn('id', function ($query) {
            $query->select(\DB::raw('MAX(id)'))
                  ->from('posts')
                  ->groupBy('lang');
        })->latest('created_at')->get();

        $latest = Post::orderBy('created_at', 'desc')->first();

        $mostViews = Post::orderBy('views', 'desc')->take(5)->get();

        // $mostViewedPosts = Post::select('lang', DB::raw('MAX(views) as max_views'))
        // ->groupBy('lang')
        // ->orderBy('max_views', 'desc')
        // ->take(5)
        // ->get();

        // $mostViewedPostsData = Post::whereIn('lang', $mostViewedPosts->pluck('lang'))
        // ->whereIn('views', $mostViewedPosts->pluck('max_views'))
        // ->get();

        $latestTen = Post::select('posts.*')
        ->join(
            \DB::raw('(SELECT id, lang, ROW_NUMBER() OVER (PARTITION BY lang ORDER BY created_at DESC) as row_num FROM posts WHERE deleted_at IS NULL) as ranked_posts'),
            function ($join) {
                $join->on('posts.id', '=', 'ranked_posts.id');
            }
        )
        ->where('ranked_posts.row_num', '<=', 10)
        ->orderBy('posts.lang')
        ->orderBy('ranked_posts.row_num')
        ->get();

        // $latestTen = Post::orderBy('id', 'desc')
        //             ->where('id', '!=', $latest->id)
        //             ->take(6)
        //             ->get();

        // $catBurma = 'Burma'; //subcategory
        // $cat = SubCategory::where('name_en', $catBurma)->get();
        // $burmas = Post::where('sub_category_id', $cat->first()->id)
        //             ->orderBy('id', 'desc')
        //             ->take(3)
        //             ->get();

        $catBurma = 'Burma'; // subcategory
        $subCategory = SubCategory::where('name_en', $catBurma)->first();

        $burmas = Post::select('posts.*')
            ->join(
                \DB::raw('(SELECT id, ROW_NUMBER() OVER (PARTITION BY lang ORDER BY created_at DESC) as row_num FROM posts WHERE deleted_at IS NULL AND sub_category_id = ' . $subCategory->id . ') as ranked_posts'),
                function ($join) {
                    $join->on('posts.id', '=', 'ranked_posts.id');
                }
            )
            ->where('ranked_posts.row_num', '<=', 3)
            ->orderBy('posts.lang')
            ->orderBy('ranked_posts.row_num')
            ->get();

        $catBusiness = 'Business';
        $subCategory = Category::where('name_en', $catBusiness)->first();
        $businesses = Post::select('posts.*')
            ->join(
                \DB::raw('(SELECT id, ROW_NUMBER() OVER (PARTITION BY lang ORDER BY created_at DESC) as row_num FROM posts WHERE deleted_at IS NULL AND category_id = ' . $subCategory->id . ') as ranked_posts'),
                function ($join) {
                    $join->on('posts.id', '=', 'ranked_posts.id');
                }
            )
            ->where('ranked_posts.row_num', '<=', 3)
            ->orderBy('posts.lang')
            ->orderBy('ranked_posts.row_num')
            ->get();

        $catInperson = 'In Person';
        $subCategory = Category::where('name_en', $catInperson)->first();
        $persons = Post::select('posts.*')
            ->join(
                \DB::raw('(SELECT id, ROW_NUMBER() OVER (PARTITION BY lang ORDER BY created_at DESC) as row_num FROM posts WHERE deleted_at IS NULL AND category_id = ' . $subCategory->id . ') as ranked_posts'),
                function ($join) {
                    $join->on('posts.id', '=', 'ranked_posts.id');
                }
            )
            ->where('ranked_posts.row_num', '<=', 3)
            ->orderBy('posts.lang')
            ->orderBy('ranked_posts.row_num')
            ->get();

        $catOpinion = 'Opinion';
        $subCategory = Category::where('name_en', $catOpinion)->first();
        $opinions = Post::select('posts.*')
            ->join(
                \DB::raw('(SELECT id, ROW_NUMBER() OVER (PARTITION BY lang ORDER BY created_at DESC) as row_num FROM posts WHERE deleted_at IS NULL AND category_id = ' . $subCategory->id . ') as ranked_posts'),
                function ($join) {
                    $join->on('posts.id', '=', 'ranked_posts.id');
                }
            )
            ->where('ranked_posts.row_num', '<=', 3)
            ->orderBy('posts.lang')
            ->orderBy('ranked_posts.row_num')
            ->get();

        $catLifeStyle = 'LifeStyle';
        $subCategory = Category::where('name_en', $catLifeStyle)->first();
        $lifeStyles = Post::select('posts.*')
            ->join(
                \DB::raw('(SELECT id, ROW_NUMBER() OVER (PARTITION BY lang ORDER BY created_at DESC) as row_num FROM posts WHERE deleted_at IS NULL AND category_id = ' . $subCategory->id . ') as ranked_posts'),
                function ($join) {
                    $join->on('posts.id', '=', 'ranked_posts.id');
                }
            )
            ->where('ranked_posts.row_num', '<=', 3)
            ->orderBy('posts.lang')
            ->orderBy('ranked_posts.row_num')
            ->get();

        $catSpecial = 'Specials';
        $subCategory = Category::where('name_en', $catSpecial)->first();
        $specials = Post::select('posts.*')
            ->join(
                \DB::raw('(SELECT id, ROW_NUMBER() OVER (PARTITION BY lang ORDER BY created_at DESC) as row_num FROM posts WHERE deleted_at IS NULL AND category_id = ' . $subCategory->id . ') as ranked_posts'),
                function ($join) {
                    $join->on('posts.id', '=', 'ranked_posts.id');
                }
            )
            ->where('ranked_posts.row_num', '<=', 3)
            ->orderBy('posts.lang')
            ->orderBy('ranked_posts.row_num')
            ->get();


        $latest_photos = Photo::select('photos.*')
            ->join(
                \DB::raw('(SELECT MAX(id) as max_id, lang FROM photos GROUP BY lang) as latest_photos'),
                function ($join) {
                    $join->on('photos.id', '=', 'latest_photos.max_id');
                }
            )
            ->get();


        $latest_cartoons = Cartoon::select('cartoons.*')
        ->join(
            \DB::raw('(SELECT MAX(id) as max_id, lang FROM cartoons GROUP BY lang) as latest_cartoons'),
            function ($join) {
                $join->on('cartoons.id', '=', 'latest_cartoons.max_id');
            }
        )
        ->get();

        // $latest_photo = Photo::orderBy('id', 'desc')->first();

        // $latest_cartoon = Cartoon::orderBy('id', 'desc')->first();

        // $lasts_cartoons = Cartoon::latest()->take(6)->get();

        $lasts_cartoons = Cartoon::select('cartoons.*')
        ->join(
            \DB::raw('(SELECT id, lang, ROW_NUMBER() OVER (PARTITION BY lang ORDER BY created_at DESC) as row_num FROM cartoons WHERE deleted_at IS NULL) as ranked_cartoons'),
            function ($join) {
                $join->on('cartoons.id', '=', 'ranked_cartoons.id');
            }
        )
        ->where('ranked_cartoons.row_num', '<=', 10)
        ->orderBy('cartoons.lang')
        ->orderBy('ranked_cartoons.row_num')
        ->get();

        return view('frontend.home', compact('latestPosts', 'mostViews', 'latestTen', 'temperature', 'burmas', 'businesses', 'persons', 'opinions', 'lifeStyles', 'specials', 'catBurma', 'catBusiness', 'catInperson', 'catOpinion', 'catLifeStyle', 'catSpecial', 'latest_photos', 'latest_cartoons', 'lasts_cartoons'));

    }

    public function main_categoriesEn($category){
        return call_user_func_array([$this, 'main_categories'], ['en', $category]);
    }

    public function main_categories($language, $name){
        $category = Category::where('url_slug', $name)->first();
        $id = $category->id;
        $sub_cat = $category;

        $sub_categories = SubCategory::where('category_id', $id)->latest()->get();
        $latestPosts= Post::select('posts.*')
            ->join(
                \DB::raw("(SELECT id, lang, ROW_NUMBER() OVER (PARTITION BY lang ORDER BY id DESC) as row_num FROM posts WHERE category_id = {$id}) as ranked_posts"),
                function ($join) {
                    $join->on('posts.id', '=', 'ranked_posts.id');
                }
            )
            ->where('ranked_posts.row_num', '=', 1)
            ->get();

        $posts = Post::where('category_id', $id)
                    ->orderBy('id', 'desc')
                    ->paginate(9);

        $mostViews = Post::orderBy('views', 'desc')->take(5)->get();

        return view('frontend.sub_page', compact('sub_categories', 'sub_cat', 'latestPosts', 'mostViews', 'posts'));
    }

    public function sub_categories($language, $main_categroy, $sub_category){
        $sub_cat = SubCategory::where('url_slug', $sub_category)->first();
        $id = $sub_cat->id;
        // $latest = Post::where('sub_category_id', $sub_cat->id)
        //         ->orderBy('id', 'desc')
        //         ->first();

        $latestPosts= Post::select('posts.*')
            ->join(
                \DB::raw("(SELECT id, lang, ROW_NUMBER() OVER (PARTITION BY lang ORDER BY id DESC) as row_num FROM posts WHERE sub_category_id = {$sub_cat->id}) as ranked_posts"),
                function ($join) {
                    $join->on('posts.id', '=', 'ranked_posts.id');
                }
            )
            ->where('ranked_posts.row_num', '=', 1)
            ->get();

        $posts = Post::where('sub_category_id', $id)
                ->orderBy('id', 'desc')
                ->paginate(9);

        $mostViews = Post::orderBy('views', 'desc')->take(5)->get();

        return view('frontend.sub_page', compact('sub_cat', 'latestPosts', 'mostViews', 'posts'));
    }

    public function sub_categoriesEn($main_categroy, $sub_category){
        return call_user_func_array([$this, 'sub_categories'], ['en', $main_categroy, $sub_category]);
    }

    public function show_videos(){
        $posts = Video::where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    ->paginate(12);

        $latestVideos = Video::whereIn('id', function ($query) {
            $query->select(\DB::raw('MAX(id)'))
            ->from('videos')
            ->groupBy('lang');
            })->latest('created_at')->get();

        $categories = Category::where('deleted_at', NULL)->get();

        return view('frontend.videos.videos', compact('posts', 'latestVideos', 'categories'));
    }

    public function show_photos(){
        $posts = Photo::where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    ->paginate(8);

        return view('frontend.photos.photos', compact('posts'));
    }

    public function photo_essays(){
        $sub_cat = ['photo_essays', 'Photo Essays'];
        $latestPosts = PhotoEssay::whereIn('id', function ($query) {
            $query->select(\DB::raw('MAX(id)'))
                  ->from('photo_essays')
                  ->groupBy('lang');
        })->latest('created_at')->get();

        $posts = PhotoEssay::orderBy('id', 'desc')->paginate(9);

        $mostViews = Post::orderBy('views', 'desc')->take(5)->get();

        return view('frontend.sub_page', compact('sub_cat', 'latestPosts', 'mostViews', 'posts'));
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

        $latestCartoons = Cartoon::whereIn('id', function ($query) {
            $query->select(\DB::raw('MAX(id)'))
            ->from('cartoons')
            ->groupBy('lang');
            })->latest('created_at')->get();

        $cartoons = Cartoon::orderBy('id', 'desc')->paginate(16);

        return view('frontend.cartoons', compact('latestCartoons', 'cartoons'));
    }

    private function stringToArray($str){
        $arr = explode(',', $str);
        return $arr;
    }

}
