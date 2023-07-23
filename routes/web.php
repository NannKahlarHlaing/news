<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('frontend.home');
});





//backend
Route::prefix('/admin')->group(function(){
    Route::get('/', function () {
        return view('backend.dashboard');
    });

    Route::controller(App\Http\Controllers\AdminController::class)->group(function(){
        Route::get('/register', 'register_form')->name('admin.register_form');
        Route::post('/register', 'register')->name('admin.register');

        Route::get('/login', 'login_form')->name('admin.login_form');

        Route::post('/login', 'login')->name('admin.login');
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::controller(App\Http\Controllers\CategoryController::class)->group(function(){
            Route::get('/categories', 'index')->name('category');
            Route::get('/categories/create', 'create_form')->name('category.create_form');
            Route::post('/categories/create', 'create')->name('category.create');
            Route::get('/categories/update/{id}', 'update_form')->name('category.update_form');
            Route::post('/categories/update', 'update')->name('category.update');
            Route::delete('/categories/delete/{id}', 'destroy');
        });
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
        Route::get('/posts/update/{id}', 'update_form');
        Route::post('/posts/update', 'update')->name('backend.posts.update');
        Route::delete('/posts/delete/{id}', 'destroy');
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

});

// news details

Route::get('/category/{category}/{id}', [App\Http\Controllers\PostController::class, 'detailsEn']);

Route::get('/photo_essays/{id}', [App\Http\Controllers\PhotoEssayController::class, 'detailsEn']);

Route::get('/add_count_new', [App\Http\Controllers\PostController::class, 'addValue'])->name('new_views_count');

Route::get('/add_count_photo', [App\Http\Controllers\PhotoController::class, 'addValue'])->name('photo_views_count');

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
    // Route::get('/{title}', 'pagesEn')->name('frontend.pages');
    Route::get('/{title}', function($path){
        if($path == 'mm' || $path == 'ch'){
            return view('frontend.home');
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

    // dd($language);

    Route::get('/', function () {
        return view('frontend.home');
    })->name('home');

    Route::get('/category/{category}/{id}', [App\Http\Controllers\PostController::class, 'details'])->name('new.details');

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
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
