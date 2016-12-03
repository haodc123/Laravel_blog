<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\RecommendationRequest;
use App\Http\Controllers\Controller;
use App\Articles;
use App\Mailers\ArticlesMailer;

class RecommendationController extends Controller
{
	public function create(Articles $article)
    {
        return view('recommendations.create', compact('article'));
    }
	
    public function store(RecommendationRequest $request, Articles $articles, ArticlesMailer $mailer) {
		$mailer->recommendTo($request->input('dest-email'), $articles);
		session()->flash('flash_message', 'Your recommendation was sent.');
 
        if (Request::wantsJson()) {
            return ['Your recommendation was sent.'];
        } else {
            return redirect('articles');
        }
        
	}
}
