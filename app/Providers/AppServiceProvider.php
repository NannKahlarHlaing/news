<?php

namespace App\Providers;

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
            $all_menus = Category::orderBy('order')->get();
            $main_menus_en = MenuItem::where('menu_id', '1')->get();
            $main_menus_mm = MenuItem::where('menu_id', '2')->get();
            $main_menus_ch = MenuItem::where('menu_id', '3')->get();
            $footer_menus_en = MenuItem::where('menu_id', '4')->get();
            $footer_menus_mm = MenuItem::where('menu_id', '5')->get();
            $footer_menus_ch = MenuItem::where('menu_id', '6')->get();
            $view->with([
                'all_menus' => $all_menus,
                'main_menus_en' => $main_menus_en,
                'main_menus_mm' => $main_menus_mm,
                'main_menus_ch' => $main_menus_ch,
                'footer_menus_en' => $footer_menus_en,
                'footer_menus_mm' => $footer_menus_mm,
                'footer_menus_ch' => $footer_menus_ch,
            ]);
        });
    }
}
