<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Region;
use App\Post;
use App\Like;
use App\User;
use App\Dislike;
use App\Profile;
use auth;
use DB;
use App\comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $likeCtr = Like::where(['post_id' => $id])->count();       


        // $posts = Post::with(['like' => function ($q) {
        //     $q->where('user_id', auth()->id());
        // }])->get();



        // $song = DB::table('posts')->find($id);
        //   $posts=Post::find(1)->id;
        // $dislikes = Dislike::all();
        $likes =Like::all();
        $dislikes = Dislike::all();
        $comments = Comment::all();
        $users = User::all();
        $posts = Post::all();
        $regions = Region::all();
        $categories = Category::all();
        
        return view('home', ['categories' => $categories, 'posts' =>$posts, 'regions' =>  $regions, 'users' => $users, 'likes' => $likes,
        'dislikes' =>  $dislikes,
        'comments' => $comments
         ]);

        // return $posts;

    }
}
