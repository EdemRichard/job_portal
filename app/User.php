<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Like;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users'; // should be users

    // public function post(){
    //     return $this->hasOne(Post::class);
    // }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function regions(){
        return $this->hasMany(Region::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
}
