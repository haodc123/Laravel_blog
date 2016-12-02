<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Author;
use Request;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        if (Request::wantsJson()) {
            return $authors;
        } else {
            return view('authors.index', compact('authors'));
        }
    }
 
    public function create() {
        return view('authors.create');
    }
    
    public function store(AuthorRequest $request)
    {
        $author = Author::create($request->all());
        if (Request::wantsJson()) {
            return $author;
        } else {
            return redirect('authors');
        }
    }
 
    public function show(Author $author)
    {
        if (Request::wantsJson()) {
            return $author;
        } else {
            return view('authors.show', compact('author'));
        }
    }
 
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }
    
    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request->all());
 
        if (Request::wantsJson()) {
            return $author;
        } else {
            return redirect('authors');
        }
    }
 
    public function destroy(Author $author)
    {
        $deleted = $author->delete();
 
        if (Request::wantsJson()) {
            return (string) $deleted;
        } else {
            return redirect('authors');
        }
    }
}
