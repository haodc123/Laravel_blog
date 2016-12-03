<?php
 
namespace App\Mailers;
 
use Mail;
use App\Articles;
 
class ArticlesMailer
{
	public function recommendTo($email, Articles $articles) {
		Mail::send('emails.articles', ['articles'=>$articles], function ($message) use ($email) {
			$message->to($email)->subject('Recommendation');
		});
	}
	
	
	
}