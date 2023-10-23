<?php

namespace App\Providers;

use App\Models\Social;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('frontend.index', function ($view) {
            Log::info('View composer executed');
            $app_url = config('app.url');
            $all_menus = Category::orderBy('order')->get();
            $main_menus_en = MenuItem::where('menu_id', '1')->orderBy('order')->get();
            $main_menus_mm = MenuItem::where('menu_id', '2')->orderBy('order')->get();
            $main_menus_ch = MenuItem::where('menu_id', '3')->orderBy('order')->get();
            $footer_menus_en = MenuItem::where('menu_id', '4')->orderBy('order')->get();
            $footer_menus_mm = MenuItem::where('menu_id', '5')->orderBy('order')->get();
            $footer_menus_ch = MenuItem::where('menu_id', '6')->orderBy('order')->get();
            $main_menus_ta = MenuItem::where('menu_id', '7')->orderBy('order')->get();
            $footer_menus_ta = MenuItem::where('menu_id', '8')->orderBy('order')->get();

            $info = Social::find(1);

            $email = [];

            if($info != null){
                $email = explode(',', $info->email);
            }

            $facebook_link = $this->stringToArray($info->facebook);
            $youtube_link = $this->stringToArray($info->youtube);
            $instagram_link = $this->stringToArray($info->instagram);

            $view->with([
                'all_menus' => $all_menus,
                'main_menus_en' => $main_menus_en,
                'main_menus_mm' => $main_menus_mm,
                'main_menus_ch' => $main_menus_ch,
                'main_menus_ta' => $main_menus_ta,
                'footer_menus_en' => $footer_menus_en,
                'footer_menus_mm' => $footer_menus_mm,
                'footer_menus_ch' => $footer_menus_ch,
                'footer_menus_ta' => $footer_menus_ta,
                'app_url' => $app_url,
                'info' => $info,
                'facebook_link' => $facebook_link,
                'youtube_link' => $youtube_link,
                'instagram_link' => $instagram_link
            ]);
        });
    }

    private function stringToArray($str)
    {
        $arr = explode(',', $str);
        return $arr[0];
    }
}
