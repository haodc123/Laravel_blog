<?php

namespace App\Http\Controllers;

use Request;
use App\Author;
use App\Articles;
use App\Http\Requests\ArticlesRequest;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Articles::all();
        if (Request::wantsJson()) {
            return $articles;
        } else {
            return view('articles.index', compact('articles'));
        }
    }
    public function create()
    {
        $article = new Articles;
        $authors = Author::pluck('name', 'id')->all();
        return view('articles.create', compact('article', 'authors'));
    }
    
    public function store(ArticlesRequest $request)
    {
        $articles = Articles::create($request->all());
		session()->flash('flash_message', 'Article was stored with success');
		
        if (Request::wantsJson()) {
            return $articles;
        } else {
            return redirect('articles');
        }
        
    }
    public function show(Articles $article)
    {
        if (Request::wantsJson()) {
            return $article;
        } else {
            return view('articles.show', compact('article'));
        }
    }
 
    public function edit(Articles $article)
    {
        $authors = Author::pluck('name', 'id')->all();
        return view('articles.edit', compact('article', 'authors'));
    }
 
    public function update(ArticlesRequest $request, Articles $article)
    {
        $article->update($request->all());
        session()->flash('flash_message', 'Article was updated with success');
		
        if (Request::wantsJson()) {
            return $article;
        } else {
            return redirect('articles');
        }
    }
 
    public function destroy(Articles $article)
    {
        $deleted = $article->delete();
		session()->flash('flash_message', 'Article was removed with success');
		
        if (Request::wantsJson()) {
            return (string) $deleted;
        } else {
            return redirect('articles');
        }
    }
}
