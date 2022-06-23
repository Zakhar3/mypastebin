<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    Public function save(Request $request){        
        $validateFields = $request->validate([
            'title' => 'required',
            'code' => 'required'
        ]);

        $paste = Paste::create($validateFields);

        return redirect(route('paste.all'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении'
        ]);
    }

    public function post(){
        $paste = new Paste;
        return view('allpaste', ['data' => $paste->orderBy('created_at', 'desc')->get()]);
    }

    public function open($id){
        $paste = new Paste;
        return view('onepaste', ['data' => $paste->find($id)]);
    }
}
