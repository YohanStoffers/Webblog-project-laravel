<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function store()
    {
        $login = request()->validate([
            'username' => ['required',],
            'password' => ['required',],
        ]);

        if(auth()->attempt($login)){
            return redirect('/');
        }

        return back()
        ->withInput()
        ->withErrors(['username'=> 'Incorrect username or password']);
    }

    public function destroy()
    {
       auth()->logout();
       return redirect('/');
    }
}
