<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LikesController extends Controller
{
    // public function store(User $user){
    //     return Auth()->user()->like()->toggle()->count();
    // }

    public function store(Request $request, Post $post)
{

    $comment= new Comment;

    $comment->body = $request->body;

    $comment->post_id = $post->id;

    $comment->save();

    return back();
}
}
