<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    Public function save(Request $request){
        if(Auth::check()){
            return redirect(route('user.mypaste'));
        }
        
        $validateFields = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if(User::where('name', $validateFields['name'])->exists()){
            return redirect(route('user.registration'))->withErrors([
                'name' => 'Такой логин уже зарегистрирован'
            ]);
        }

        $user = User::create($validateFields);
        if($user){
            Auth::login($user);
            return redirect(route('user.mypaste'));
        }

        return redirect(route('user.login'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении пользователя'
        ]);
    }
}
