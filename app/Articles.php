<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //
    protected $fillable = ['title', 'content', 'author_id'];
    
    public function author() {
        return $this->belongsTo('App\Author');
    }
}
