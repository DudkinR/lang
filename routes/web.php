<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TailController;
use App\Http\Controllers\PictController;
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

Route::get('/', function () {
    return view('index');
});

Route::resource('page', PageController::class);
Route::resource('pict', PictController::class);
Route::resource('tail', TailController::class);
Route::resource('story', StoryController::class);
Route::resource('test', TestController::class);

Auth::routes();
Route::get('tail/{id}', [App\Http\Controllers\TailController::class, 'show'])->name('tail.show');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
