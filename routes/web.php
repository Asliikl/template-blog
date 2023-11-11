<?php

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\BlogController;
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

Route::get('/',[DefaultController::class,'index'])->name('admin.home');
Route::group(['prefix'=>'blog'],function(){
    Route::get("",[BlogController::class,"blog"])->name('admin.blog');

    Route::group(['prefix'=>'add'],function(){
        Route::get("",[BlogController::class,"blogAdd"])->name('admin.blogAdd');
        Route::post("",[BlogController::class,"blogStore"])->name('admin.blogStore');
    });
    Route::get("edit/{blog}",[BlogController::class,"blogEdit"])->name("admin.blogEdit");
    Route::post("update/{blog}",[BlogController::class,"blogUpdate"])->name("admin.blogUpdate");
    Route::get("delete/{blog}",[BlogController::class,"blogDelete"])->name("admin.blogDelete");
});
