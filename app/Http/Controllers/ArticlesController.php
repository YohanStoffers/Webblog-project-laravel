<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequestNewArticle;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Mockery\Undefined;
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
        $categories = Category::all();
        $articles = Article::with('user')->get()->sortByDesc('created_at');
        return view('articles', compact('articles','categories'));
    }

    public function indexFilter(Category $categories)
    {
        $articles = Article::with('user')->get()->sortByDesc('created_at');
        return view('articles-filter', compact('articles', 'categories'));
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

        if (!array_key_exists('categories', $validated)) {
            $validated += ['categories' => [8]];
        }

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
        $comments = $articles->load('comments');
        $categories = $article->load('categories');
        $userOfComment = Comment::with('user')->get();
        // dd($userOfComment);
       
        return view('article', compact('article', 'comments','userOfComment', 'categories'));
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
        
        return view('edit-article', compact('article', 'categories', 'i'));
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
      
        $article->categories()->sync($validated['categories']);
        $article->update($validated);

        return redirect(route('users.show', auth()->user()->id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //dd($article->categories);
        $article->comments()->delete();
        $article->categories()->detach();
        $article->delete();
        return redirect(route('users.show', auth()->user()->id));
    }
}
