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
Route::get('/st', [StoryController::class, 'index'])->name('stories');
Route::post('/st', [StoryController::class, 'store'])->name('story.store');
Route::get('/game', [App\Http\Controllers\GameController::class, 'index'])->name('game.index');
Route::get('/game/create', [App\Http\Controllers\GameController::class, 'create'])->name('game.create');
Route::post('/game', [App\Http\Controllers\GameController::class, 'store'])->name('game.store');
Route::get('/game/{id}', [App\Http\Controllers\GameController::class, 'show'])->name('game.show');
Route::get('/game/{id}/edit', [App\Http\Controllers\GameController::class, 'edit'])->name('game.edit');
Route::put('/game/{id}', [App\Http\Controllers\GameController::class, 'update'])->name('game.update');
Route::delete('/game/{id}', [App\Http\Controllers\GameController::class, 'destroy'])->name('game.destroy');






