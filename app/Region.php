<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function categories(){
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
