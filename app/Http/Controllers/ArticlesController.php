<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequestNewArticle;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Nette\Utils\Arrays;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $articles = Article::with('user')->get();
        
        return view('articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return view('create-article', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequestNewArticle $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        $article = Article::create($validated);
        $article->categories()->attach($validated['categories']);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Article $articles)
    {
        $article = $articles->load('user');
       
        return view('article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {   
        $i = 0;
        $categories = Category::all();
        $articleCategories = $article->categories;
        // dd($articleCategories[(1) - 1]->id);
        return view('edit-article', compact('article', 'categories','articleCategories', 'i'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequestNewArticle $request, Article $article)
    {
        
        $validated = $request->validated();
        $article->update($validated);

        return redirect(route('users.show', auth()->user()->id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $articles)
    {
        
    }
}
