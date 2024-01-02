<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $mostViewsCountries = DB::table('countries')
            ->select('country', DB::raw('COUNT(country) as country_count'))
            ->groupBy('country')
            ->orderByDesc('country_count')
            ->take(10)
            ->get();
        $mostViews = Post::orderBy('views', 'desc')->take(5)->get();

        $mostReacts  = DB::table('posts')
                ->leftJoin('categories', 'posts.category_id', 'categories.id')
                ->select('posts.id', 'posts.category_id', 'posts.title as title', 'categories.name_en as category_name', 'categories.url_slug as url_slug', DB::raw('SUM(`like` + love + wow + sad) AS total_reactions'))
                ->groupBy('posts.id', 'posts.category_id', 'posts.title', 'categories.name_en', 'categories.url_slug')
                ->orderByRaw('total_reactions DESC')
                ->limit(5)
                ->get();

        $mostComments = Post::withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->limit(5)
            ->get();

        return view('backend.dashboard', compact('mostViews', 'mostReacts', 'mostComments', 'mostViewsCountries'));
    }
}
