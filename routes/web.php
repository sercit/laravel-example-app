<?php

use App\Http\Controllers\FormController;
use App\Models\User;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function(){
    Route::get('/profile', function(){
        return view('profile');
    });
});

Route::get('/form', [FormController::class, 'show'])
    ->name('form');


Route::get('/user', function() {
    $user = User::find(1);
    $user->email = $user->email . 'test';
    $user->unknown();
    \App\Events\UserRegistered::dispatch();
//   Cache::remember('user:1', '30', function () {
//       return \App\Models\User::find(1);
//   });
});
