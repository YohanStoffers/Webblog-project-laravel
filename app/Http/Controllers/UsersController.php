<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequestNewAccount;
use App\Http\Requests\StorePostRequestPremium;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all()->sortByDesc('updated_at');
        return view('index', compact('articles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequestNewAccount $request)
    {
        $validated = $request->validated();
        $validated['password']=bcrypt($validated['password']);

        $user = User::create($validated);

        auth()->login($user);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        $user->articles->sortByDesc('updated_at');
        $userAccount = $user->load('articles');
        // dd($userAccount);
        
        
        // dd($userAccount);
        return view('myAccount', compact('userAccount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('premium-paying');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequestPremium $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comments)
    {
        //
    }
}
