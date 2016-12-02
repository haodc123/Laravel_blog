<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //
    protected $fillable = ['title', 'content'];
    
    public function author() {
        return $this->belongsTo('App\Author');
    }
}
