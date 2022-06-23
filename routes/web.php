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

Route::name('paste.')->group(function(){
    
    Route::get('/', function(){
        return view('newpaste');
    })->name('new');

    Route::post('/', [\App\Http\Controllers\MainController::class, 'save']);
    
    // Route::get('/allpaste', function(){
    //     return view('allpaste');
    // })->name('all');

    Route::get('/onepaste/{id}', [\App\Http\Controllers\MainController::class, 'open'])->name('one');

    Route::get('/allpaste', [\App\Http\Controllers\MainController::class, 'post'])->name('all');
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
        return redirect(route('user.login'));
    })->name('logout');

    Route::get('/registration', function(){
        if(Auth::check()){
            return redirect(route('user.mypaste'));
        }
        return view('registration');
    })->name('registration');

        Route::post('/registration',[\App\Http\Controllers\RegisterController::class, 'save']);
});