<?php

namespace App;
use App\User;
use App\Post;
use App\Like;
use App\Dislike;
use App\comment;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts'; // should be komens

    // define the inverse of the user model's komens() method
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function dislikes(){
        return $this->hasMany(Dislike::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
