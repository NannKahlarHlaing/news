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
        Route::get('/categories/news', 'index')->name('news.category');
        Route::get('/categories/news/create', 'create_form')->name('news.category.create_form');
        Route::post('/categories/news/create', 'create')->name('news.category.create');
        Route::get('/categories/news/update/{id}', 'update_form');
        Route::post('/categories/news/update', 'update')->name('news.category.update');
        Route::delete('/categories/news/delete/{id}', 'destroy');
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
        // Route::delete('/photos/delete/{id}', 'destroy');
    });
});

// news details

Route::get('/news/{id}', [App\Http\Controllers\NewController::class, 'details']);

Route::get('/add_value', [App\Http\Controllers\NewController::class, 'addValue'])->name('views_count');

//frontend

Route::controller(App\Http\Controllers\FrontendController::class)->group(function(){
    Route::get('/videos', 'show_videos')->name('frontend.videos');
    Route::get('/photos', 'show_photos')->name('frontend.photos');
    Route::get('/donation', 'donation')->name('frontend.donation');
    Route::get('/careers', 'careers')->name('frontend.careers');
    Route::get('/contact', 'contact')->name('frontend.contact');
});


