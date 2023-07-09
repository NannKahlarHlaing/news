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
        Route::get('/categories/news/delete/{id}', 'destroy');
    });

    Route::controller(App\Http\Controllers\NewController::class)->group(function(){
        Route::get('/categories/news', 'index')->name('backend.news');
        Route::get('/news/create', 'create_form')->name('backend.news.create');
    });
});


