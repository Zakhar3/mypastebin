<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    Public function save(Request $request){        
        $validateFields = $request->validate([
            'title' => 'required',
            'code' => 'required',
            'author' => 'required',
            'typed' => 'required',
            'timer' => 'sometimes',
            'syntax' => 'required'
        ]);

        $paste = Paste::create($validateFields);
        if(Auth::check()){
            return redirect(route('user.mypaste'));
        }
        else{
        return redirect(route('paste.all'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении'
        ]);
    }
    }

    public function au(){
        $paste = new Paste;
        $my = auth()->user();
        if(Auth::check()){
            return view('newpaste', ['author' => $my->name, 'onlyau' => ''],
            ['datall' => $paste->where('typed', '=', 'public')->orderBy('created_at', 'desc')->limit(10)->get(),
            'mydat' => $paste->where('author', '=', $my->name)->orderBy('created_at', 'desc')->limit(10)->get()]);
        }
        else{
            return view('newpaste', ['author' => 'Не зарегистрированный пользователь', 'onlyau' => 'disabled'],
            ['datall' => $paste->where('typed', '=', 'public')->orderBy('created_at', 'desc')->limit(10)->get()]);
        }
    }

    public function post(){
        $paste = new Paste;
    if(Auth::check()){
        $my = auth()->user();
        return view('allpaste', ['data' => $paste->where('typed', '=', 'public')->orderBy('created_at', 'desc')->get()],
        ['datall' => $paste->where('typed', '=', 'public')->orderBy('created_at', 'desc')->limit(10)->get(),
        'mydat' => $paste->where('author', '=', $my->name)->orderBy('created_at', 'desc')->limit(10)->get()]);
    }
        return view('allpaste', ['data' => $paste->where('typed', '=', 'public')->orderBy('created_at', 'desc')->get()],
        ['datall' => $paste->where('typed', '=', 'public')->orderBy('created_at', 'desc')->limit(10)->get()]);
    }

    public function my(){
        $my = auth()->user();
        $paste = new Paste;
        return view('mypaste', ['data' => $paste->where('author', '=', $my->name)->orderBy('created_at', 'desc')->get()],
        ['datall' => $paste->where('typed', '=', 'public')->orderBy('created_at', 'desc')->limit(10)->get(),
        'mydat' => $paste->where('author', '=', $my->name)->orderBy('created_at', 'desc')->limit(10)->get()]);
    }

    public function open($id){
        $date1 = strtotime(Paste::where('id', $id)->max('created_at'));
        $date2 = strtotime(date("Y-m-d H:i:s"));
        $diff = abs($date2 - $date1);
        $minutes = floor($diff / 60);
        $pas = Paste::find($id);
        $my = auth()->user();
        if($pas->timer < $minutes){
        $deletedRows = $pas->delete();
        if(Auth::check()){
            return redirect(route('user.mypaste'))->withErrors([
                'name' => 'Срок доступа истек'
            ]);
        }
        else{
            return redirect(route('paste.all'))->withErrors([
                'name' => 'Срок доступа истек'
            ]);
        }
    }
    else{
        if(Auth::check() && $pas->typed == 'onlyauthor' && $pas->author == $my->name){
        $paste = new Paste;
        return view('onepaste', ['data' => $paste->find($id)],
        ['datall' => $paste->where('typed', '=', 'public')->orderBy('created_at', 'desc')->limit(10)->get(),
        'mydat' => $paste->where('author', '=', $my->name)->orderBy('created_at', 'desc')->limit(10)->get()]);
        }
        elseif(Auth::check() && $pas->typed == 'public' ||
        Auth::check() && $pas->typed == 'onlylink'){
            $paste = new Paste;
        return view('onepaste', ['data' => $paste->find($id)],
        ['datall' => $paste->where('typed', '=', 'public')->orderBy('created_at', 'desc')->limit(10)->get(),
        'mydat' => $paste->where('author', '=', $my->name)->orderBy('created_at', 'desc')->limit(10)->get()]);
        }
        elseif($pas->typed == 'public' || $pas->typed == 'onlylink'){
            $paste = new Paste;
        return view('onepaste', ['data' => $paste->find($id)],
        ['datall' => $paste->where('typed', '=', 'public')->orderBy('created_at', 'desc')->limit(10)->get()]);
        }
        else{
        return redirect(route('paste.all'));
        }
    }
    }
}
