<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\RecommendationRequest;
use App\Http\Controllers\Controller;
use App\Articles;
use App\Mailers\ArticlesMailer;
use App\Jobs\SendMailJob;

class RecommendationController extends Controller
{
	public function create(Articles $article)
    {
        return view('recommendations.create', compact('article'));
    }
	
    public function store(RecommendationRequest $request, Articles $articles, ArticlesMailer $mailer) {
		$mailer->recommendTo($request->input('dest-email'), $articles); // using my own mailer and without queue
		//$this->dispatch((new SendMailJob())->delay(60 * 1)); // using build-in Mailer and with queue
		session()->flash('flash_message', 'Your recommendation was sent.');
 
        if (Request::wantsJson()) {
            return ['Your recommendation was sent.'];
        } else {
            return redirect('articles');
        }
        
	}
}
