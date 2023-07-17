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

    Route::controller(App\Http\Controllers\NewsCategoryController::class)->group(function(){
        Route::get('/categories', 'index')->name('category');
        Route::get('/categories/create', 'create_form')->name('category.create_form');
        Route::post('/categories/create', 'create')->name('category.create');
        Route::get('/categories/update/{id}', 'update_form');
        Route::post('/categories/update', 'update')->name('category.update');
        Route::delete('/categories/delete/{id}', 'destroy');
    });

    Route::controller(App\Http\Controllers\NewController::class)->group(function(){
        Route::get('/news', 'index')->name('backend.news');
        Route::get('/news/create', 'create_form')->name('backend.news.create_form');
        Route::post('/news/create', 'create')->name('backend.news.create');
        Route::get('/news/update/{id}', 'update_form');
        Route::post('/news/update', 'update')->name('backend.news.update');
        Route::delete('/news/delete/{id}', 'destroy');
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

});

// news details

Route::get('/news/{id}', [App\Http\Controllers\NewController::class, 'details']);

Route::get('/photo_essays/{id}', [App\Http\Controllers\PhotoEssayController::class, 'details']);

Route::get('/add_count_new', [App\Http\Controllers\NewController::class, 'addValue'])->name('new_views_count');

Route::get('/add_count_photo', [App\Http\Controllers\PhotoController::class, 'addValue'])->name('photo_views_count');

//frontend

Route::controller(App\Http\Controllers\FrontendController::class)->group(function(){
    Route::get('/videos', 'show_videos')->name('frontend.videos');
    Route::get('/photos', 'show_photos')->name('frontend.photos');
    Route::get('/photo_essays', 'photo_essays')->name('frontend.photo_essays');
    Route::get('/donation', 'donation')->name('frontend.donation');
    Route::get('/careers', 'careers')->name('frontend.careers');
    Route::get('/contact', 'contact')->name('frontend.contact');
});


