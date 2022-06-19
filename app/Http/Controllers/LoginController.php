<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    Public function login(Request $request){
        if(Auth::check()){
            return redirect(route('user.mypaste'));
        }
        
        $formFields = $request->only(['name', 'password']);

        if(Auth::attempt($formFields)){
            return redirect()->intended(route('user.mypaste'));
        }

        return redirect(route('user.login'))->withErrors([
            'name' => 'Не удалось авторизоваться'
        ]);
    }
}
