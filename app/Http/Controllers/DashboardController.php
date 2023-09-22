<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $mostViews = Post::orderBy('views', 'desc')->take(5)->get();

        $mostReacts  = DB::table('posts')
        ->leftJoin('categories', 'posts.category_id', 'categories.id')
        ->select('posts.id', 'posts.category_id', 'posts.title_en as title', 'categories.name_en as category_name', DB::raw('SUM(`like` + love + wow + sad) AS total_reactions'))
        ->groupBy('posts.id', 'posts.category_id', 'posts.title_en', 'categories.name_en')
        ->orderByRaw('total_reactions DESC')
        ->limit(5)
        ->get();

        $mostComments = Post::withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->limit(5)
            ->get();
        // dd($mostComments);

        return view('backend.dashboard', compact('mostViews', 'mostReacts', 'mostComments'));
    }
}
