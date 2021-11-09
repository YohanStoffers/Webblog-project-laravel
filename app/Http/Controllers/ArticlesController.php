<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequestNewArticle;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

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
        $path = null;

        if(array_key_exists('image', $validated)){
            $path = Storage::putFile('photos', new File($validated['image']));
        }
        
        
        $validated['image'] = $path;
        $validated['user_id'] = auth()->user()->id;
        
        if (!array_key_exists('categories', $validated)) {
            $validated += ['categories' => [9]];
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
        $categories = Category::all();
        return view('edit-article', compact('article', 'categories'));
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
        $path = null;

        if (array_key_exists('image', $validated)) {
            $path = Storage::putFile('photos', new File($validated['image']));
        }

        $validated['image'] = $path;

        if (!array_key_exists('categories', $validated)) {
            $validated += ['categories' => [9]];
        }
        
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
        $article->comments()->delete();
        $article->categories()->detach();
        $article->delete();
        return redirect(route('users.show', auth()->user()->id));
    }
}
