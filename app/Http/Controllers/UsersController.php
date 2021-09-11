<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use App\User;

class UsersController extends Controller
{
    public function show($name) {
        // $users = User::find($id)->id;
        // $posts = $users->posts()->get();
        $user = User::where('name', $name)->first();
        $posts = Post::where('user_id', $user->id)->get();

        return view('users.show,', ['posts' => $posts]);
        // return view('users.show', compact('posts'));
    }
}
