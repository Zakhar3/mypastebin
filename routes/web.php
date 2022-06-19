<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('newpaste');
});

Route::get('/allpaste', function () {
    return view('allpaste');
});

Route::name('user.')->group(function(){
    Route::view('/mypaste', 'mypaste')->middleware('auth')->name('mypaste');

    Route::get('/login', function(){
        if(Auth::check()){
            return redirect(route('user.mypaste'));
        }
        return view('login');
    })->name('login');

    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

    Route::get('/logout', function(){
        Auth::logout();
    })->name('logout');

    Route::get('/registration', function(){
        if(Auth::check()){
            return redirect(route('user.mypaste'));
        }
        return view('registration');
    })->name('registration');

        Route::post('/registration',[\App\Http\Controllers\RegisterController::class, 'save']);
});