<?php

use App\Models\MenuItem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//frontend
Route::get('/', [App\Http\Controllers\FrontEndController::class, 'home_page']);

Route::prefix('/admin')->group(function(){

    Route::controller(App\Http\Controllers\AdminController::class)->group(function(){
        Route::get('/login', 'login_form')->name('admin.login_form');

        Route::post('/login', 'login')->name('admin.login');
        Route::post('/logout', 'logout')->name('admin.logout');

        Route::get('/register', 'register_form')->name('admin.register_form');
        Route::post('/register', 'register')->name('admin.register');

        Route::get('/forgot/password', 'forgot_password')->name('forgot_password');
    });



});

Route::get('admin/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('admin/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('admin/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('admin/password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');


//backend
Route::group(['middleware' => 'normal'], function () {

    Route::prefix('/admin')->group(function(){

        Route::get('/', function () {
            return view('backend.dashboard');
        })->name('admin');

        Route::group(['middleware' => 'admin'], function () {
            Route::controller(App\Http\Controllers\AdminController::class)->group(function(){
                Route::get('/users', 'index')->name('backend.users');
                Route::get('/users/create', 'create_form')->name('users.create_form');
                Route::post('/users/create', 'create')->name('users.create');
                Route::get('/users/update/{id}', 'update_form')->name('users.update_form');
                Route::post('/users/update', 'update')->name('users.update');
                Route::delete('/users/delete/{id}', 'destroy');
            });
        });

        Route::controller(App\Http\Controllers\CategoryController::class)->group(function(){
            Route::get('/categories', 'index')->name('category');
            Route::get('/categories/create', 'create_form')->name('category.create_form');
            Route::post('/categories/create', 'create')->name('category.create');
            Route::get('/categories/update/{id}', 'update_form')->name('category.update_form');
            Route::post('/categories/update', 'update')->name('category.update');
            Route::delete('/categories/delete/{id}', 'destroy');
        });

        Route::controller(App\Http\Controllers\SubCategoryController::class)->group(function(){
            Route::get('/sub_categories', 'index')->name('sub_category');
            Route::get('/sub_categories/create', 'create_form')->name('sub_category.create_form');
            Route::post('/sub_categories/create', 'create')->name('sub_category.create');
            Route::get('/sub_categories/update/{id}', 'update_form')->name('sub_category.update_form');
            Route::post('/sub_categories/update', 'update')->name('sub_category.update');
            Route::delete('/sub_categories/delete/{id}', 'destroy');
        });

        Route::controller(App\Http\Controllers\TagController::class)->group(function(){
            Route::get('/tag', 'index')->name('tag');
            Route::get('/tag/create', 'create_form')->name('tag.create_form');
            Route::post('/tag/create', 'create')->name('tag.create');
            Route::get('/tag/update/{id}', 'update_form')->name('tag.update_form');
            Route::post('/tag/update', 'update')->name('tag.update');
            Route::delete('/tag/delete/{id}', 'destroy');
        });

        Route::controller(App\Http\Controllers\PageController::class)->group(function(){
            Route::get('/pages', 'index')->name('backend.pages');
            Route::get('/pages/create', 'create_form')->name('backend.pages.create_form');
            Route::post('/pages/create', 'create')->name('backend.pages.create');
            Route::get('/pages/update/{id}', 'update_form');
            Route::post('/pages/update', 'update')->name('backend.pages.update');
            Route::delete('/pages/delete/{id}', 'destroy');
        });

        Route::controller(App\Http\Controllers\PostController::class)->group(function(){
            Route::get('/posts', 'index')->name('backend.posts');
            Route::get('/posts/create', 'create_form')->name('backend.posts.create_form');
            Route::post('/posts/create', 'create')->name('backend.posts.create');
            Route::get('/posts/update/{id}', 'update_form')->middleware('moderator');
            Route::post('/posts/update', 'update')->name('backend.posts.update')->middleware('moderator');
            Route::delete('/posts/delete/{id}', 'destroy')->middleware('moderator');
        });

        Route::controller(App\Http\Controllers\PhotoController::class)->group(function(){
            Route::get('/photos', 'index')->name('backend.photos');
            Route::get('/photos/create', 'create_form')->name('backend.photos.create_form');
            Route::post('/photos/create', 'create')->name('backend.photos.create');
            Route::get('/photos/update/{id}', 'update_form');
            Route::post('/photos/update', 'update')->name('backend.photos.update');
            Route::delete('/photos/delete/{id}', 'destroy');
        });

        Route::controller(App\Http\Controllers\VideoController::class)->group(function(){
            Route::get('/videos', 'index')->name('backend.videos');
            Route::get('/videos/create', 'create_form')->name('backend.videos.create_form');
            Route::post('/videos/create', 'create')->name('backend.videos.create');
            Route::get('/videos/update/{id}', 'update_form');
            Route::post('/videos/update', 'update')->name('backend.videos.update');
            Route::delete('/videos/delete/{id}', 'destroy');
        });

        Route::controller(App\Http\Controllers\CareerController::class)->group(function(){
            Route::get('/careers', 'index')->name('backend.careers');
            Route::get('/careers/create', 'create_form')->name('backend.careers.create_form');
            Route::post('/careers/create', 'create')->name('backend.careers.create');
            Route::get('/careers/update/{id}', 'update_form');
            Route::post('/careers/update', 'update')->name('backend.careers.update');
            Route::delete('/careers/delete/{id}', 'destroy');
        });

        Route::controller(App\Http\Controllers\SocialContoller::class)->group(function(){
            Route::get('/socials', 'index')->name('backend.socials');
            Route::post('/socials/create', 'create')->name('backend.socials.create');
        });

        Route::controller(App\Http\Controllers\PhotoEssayController::class)->group(function(){
            Route::get('/photo_essays', 'index')->name('backend.photo_essays');
            Route::get('/photo_essays/create', 'create_form')->name('backend.photo_essays.create_form');
            Route::post('/photo_essays/create', 'create')->name('backend.photo_essays.create');
            Route::get('/photo_essays/update/{id}', 'update_form');
            Route::post('/photo_essays/update', 'update')->name('backend.photo_essays.update');
            Route::delete('/photo_essays/delete/{id}', 'destroy');
        });

        Route::controller(App\Http\Controllers\CartoonController::class)->group(function(){
            Route::get('/cartoons', 'index')->name('backend.cartoons');
            Route::get('/cartoons/create', 'create_form')->name('backend.cartoons.create_form');
            Route::post('/cartoons/create', 'create')->name('backend.cartoons.create');
            Route::get('/cartoons/update/{id}', 'update_form');
            Route::post('/cartoons/update', 'update')->name('backend.cartoons.update');
            Route::delete('/cartoons/delete/{id}', 'destroy');
        });

        Route::controller(App\Http\Controllers\MenuController::class)->group(function(){
            Route::get('/menus', 'index')->name('backend.menus');
            Route::get('/menus/create', 'create_form')->name('backend.menus.create_form');

            Route::get('/create', 'create_menu')->name('menu_name.create');

            Route::get('/menu/update/{id}', 'update_menu')->name('backend.menu.update');

            Route::get('/menu_items/create', 'create_menuItems')->name('backend.menu_items.create');

            Route::get('/menu_items/update', 'update_menuItems')->name('backend.menu_items.update');
        });

        Route::get('/get/sub_category', [App\Http\Controllers\SubCategoryController::class, 'getSubCategory'])->name('sub_category.get');

    });
});

// news details

Route::get('/category/{category}/{id}', [App\Http\Controllers\PostController::class, 'detailsEn']);

Route::get('/photo_essays/{id}', [App\Http\Controllers\PhotoEssayController::class, 'detailsEn']);

Route::get('/add_count_new', [App\Http\Controllers\PostController::class, 'addValue'])->name('new_views_count');

Route::get('/add_count_photo', [App\Http\Controllers\PhotoController::class, 'addValue'])->name('photo_views_count');

Route::get('/posts/search', [App\Http\Controllers\PostController::class, 'searchEn'])->name('search');

//frontend

Route::controller(App\Http\Controllers\FrontendController::class)->group(function(){
    Route::get('/videos', 'show_videos')->name('frontend.videos');
    Route::get('/photos', 'show_photos')->name('frontend.photos');
    Route::get('/photo_essays', 'photo_essays')->name('frontend.photo_essays');
    Route::get('/donation', 'donation')->name('frontend.donation');
    Route::get('/careers', 'careers')->name('frontend.careers');
    Route::get('/contact', 'contact')->name('frontend.contact');
    Route::post('/contact', 'sendEmail')->name('frontend.email_sent');
    Route::get('/cartoons', 'cartoons')->name('frontend.cartoons');
    Route::get('/News/{sub_category}', 'sub_categoriesEn')->name('sub_pages');
    // Route::get('/{title}', 'pagesEn')->name('frontend.pages');
    Route::get('/{title}', function($path){
        if($path == 'mm' || $path == 'ch'){
            $frontendController = new FrontendController();

            $data = $frontendController->home_page();

            $latest = $data->latest;
            $most_view = $data->most_view;
            $mostViews = $data->mostViews;
            $latestTen = $data->latestTen;
            $temperature = $data->temperature;
            $burmas = $data->burmas;
            $businesses = $data->businesses;
            $persons = $data->persons;
            $opinions = $data->opinions;
            $lifeStyles = $data->lifeStyles;
            $specials = $data->specials;
            $catBurma = $data->catBurma;
            $catBusiness = $data->catBusiness;
            $catInperson = $data->catInperson;
            $catOpinion = $data->catOpinion;
            $catLifeStyle = $data->catLifeStyle;
            $catSpecial = $data->catSpecial;

            $main_menus = MenuItem::where('menu_id', '1')->get();

            return view('frontend.home', compact('main_menus', 'latest', 'most_view', 'mostViews', 'latestTen', 'temperature', 'burmas', 'businesses', 'persons', 'opinions', 'lifeStyles', 'specials', 'catBurma', 'catBusiness', 'catInperson', 'catOpinion', 'catLifeStyle', 'catSpecial'));
        }else{
            $controller = app()->make(App\Http\Controllers\FrontendController::class);
            return $controller->pagesEn($path);
        }
    });
});

Route::controller(App\Http\Controllers\ContactController::class)->group(function(){
    Route::post('/contact', 'sendEmail')->name('frontend.email_sent');
});

Route::group(['prefix' => '{language}'], function ($language) {

    Route::get('/', function () {
        $frontendController = new FrontendController();

        $data = $frontendController->home_page();

        $latest = $data->latest;
        $most_view = $data->most_view;
        $mostViews = $data->mostViews;
        $latestTen = $data->latestTen;
        $temperature = $data->temperature;
        $burmas = $data->burmas;
        $businesses = $data->businesses;
        $persons = $data->persons;
        $opinions = $data->opinions;
        $lifeStyles = $data->lifeStyles;
        $specials = $data->specials;
        $catBurma = $data->catBurma;
        $catBusiness = $data->catBusiness;
        $catInperson = $data->catInperson;
        $catOpinion = $data->catOpinion;
        $catLifeStyle = $data->catLifeStyle;
        $catSpecial = $data->catSpecial;
        $main_menus = MenuItem::where('menu_id', '1')->get();
        dd($main_menus);

        return view('frontend.home', compact('main_menus', 'latest', 'most_view', 'mostViews', 'latestTen', 'temperature', 'burmas', 'businesses', 'persons', 'opinions', 'lifeStyles', 'specials', 'catBurma', 'catBusiness', 'catInperson', 'catOpinion', 'catLifeStyle', 'catSpecial'));

    })->name('home');

    Route::get('/category/{category}/{id}', [App\Http\Controllers\PostController::class, 'details'])->name('new.details');

    Route::get('/posts/search', [App\Http\Controllers\PostController::class, 'search']);

    Route::get('/photo_essays/{id}', [App\Http\Controllers\PhotoEssayController::class, 'details']);

    Route::controller(App\Http\Controllers\FrontendController::class)->group(function(){
        Route::get('/videos', 'show_videos');
        Route::get('/photos', 'show_photos');
        Route::get('/photo_essays', 'photo_essays');
        Route::get('/donation', 'donation');
        Route::get('/careers', 'careers');
        Route::get('/contact', 'contact');
        Route::post('/contact', 'sendEmail');
        Route::get('/cartoons', 'cartoons');
        Route::get('/{title}', 'pages');
        Route::get('/News/{sub_category}', 'sub_categories');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

