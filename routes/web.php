<?php

use App\Features\BlackTheme;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Laravel\Pennant\Feature;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function(){
    Route::get('/post', [PostController::class, 'index']);

    Route::get('/profile', function(){
        return view('profile');
    });
});

Route::get('/form', [FormController::class, 'show'])
    ->name('form');

//Route::group([
//        'prefix' => '/card',
//        'middleware' => ['feature:black-theme']
//    ],function () {
//       Route::get('/info');
//       Route::delete('/delete');
//});
Route::get('/test', function ($request) {
    return Feature::for($request->user()->subcription)->active(BlackTheme::class)
    ? 'active'
    : 'inactive';
})->middleware(['feature:']);
