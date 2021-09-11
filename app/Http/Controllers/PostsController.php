<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
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

class PostsController extends Controller
{
    public function post(){
        // 
        $categories = Category::all();
        $regions = Region::all();
        $users = User::all();

        

        // return $categories;
        // exit();
        return view('posts.post', ['categories' => $categories, 'regions' => $regions, 'users' => $users]);
    }

    public function addpost(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'experience' => 'required',
            'address' => 'required',
            'region_id' => 'required',
            'about' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'telephone' => 'required'
        ]);
        $posts = new Post;
        $posts->user_id = Auth::user()->id;
        $posts->name = $request->input('name');
        $posts->designation = $request->input('designation');
        $posts->experience = $request->input('experience');
        $posts->telephone = $request->input('telephone');
        $posts->address = $request->input('address');
        $posts->region_id = $request->input('region_id');
        $posts->about = $request->input('about');
        $posts->category_id = $request->input('category_id');

        if(Input::hasFile('image')){
            $file = Input::file('image');
$file->move(public_path(). '/uploads/', $file->getClientOriginalName());
$url = URL::to("/"). '/uploads/'. $file->getClientOriginalName();
        // return $url;
        // exit();
        }
        $posts->image = $url;
        $posts->save();
        return redirect('/post')->with('response', 'Category Added successfully'); 
    }


    public function category($cat_id){
        $categories = Category::all();
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.*')
            ->where(['categories.id' => $cat_id])
            ->get();
          
        return view('categories.categoriespost', ['categories' => $categories, 'posts' => $posts]);
    }

    public function region($reg_id){
        $regions = Region::all();
        $posts = DB::table('posts')
            ->join('regions', 'posts.region_id', '=', 'regions.id')
            ->select('posts.*', 'regions.*')
            ->where(['regions.id' => $reg_id])
            ->get();
          
        return view('regions.region', ['regions' => $regions, 'posts' => $posts]);
    }

    public function personal($name){
        // $posts = Post::where('id', '=', $post_id)->get();

        // $posts = Post::all();
        // $users = User::with('posts');

        // return view('posts.personal', [
        //     "posts" => $posts
        // ]);
      
        // $posts = Post::all('posts.user_id');
        // $posts = Post::with('user')->get();
        

        // $users_ownposts = User::with('posts')->get();
        // $result = DB::Table('posts')->select('name','designation')->where('user_id',2)->get(); 
        // $post = Post::where('user_id', '=', '2')->get();


        //    return   $post ;   

        // return view('posts.personal', ['users' => $users, 'posts' => $posts]);
        // $likePost = Post::find($post_id);
        // $likeCtr = Like::where(['post_id' => $likePost->id])->count();
        


        $users = User::all();
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.*')
            ->where(['users.name' => $name])
            ->get();
        


        // $user = User::find($id);
        // $posts = $user->posts()->get();

        return view('posts.personal', ['users' => $users, 'posts' => $posts]);
        // return   $likePost ;   

    }

    public function usersPosts(){
        $post = Post::find(1);
        echo $post->id;
    //    return  $post;
    }

    public function edit($post_id){
        $posts = Post::find($post_id);
        // return view('posts.edit', ['categories' => $categories, 'posts' => $posts, 'category' => $category]);
        return $posts;
    }



    // public function showProfile($id)
    // {
    //     return view('posts.post', ['post' => Post::findOrFail($id)]);
    // }



    public function like(Post $post_id, $id){
        // $likePost = Post::find(1)->id;
        $likeCtr = Like::where(['post_id' => $id])->count();
       $loggin_user = Auth::user()->id;
       $like_user = Like::where(['user_id' => $loggin_user, 'post_id' => $id])->first();
    if(empty($like_user->user_id)){
        $user_id = Auth::user()->id;
        $email = Auth::user()->email;
        $post_id = $id;
        $like = new Like;
        $like->user_id = $user_id;
        $like->email = $email;
        $like->post_id = $post_id;
        $like->save();
        return redirect("home");

    }else{
        return redirect("home");
    }

    // return $likeCtr;
    }

    public function dislike($id){
        $loggin_user = Auth::user()->id;
       $dislike_user = Dislike::where(['user_id' => $loggin_user, 'post_id' => $id])->first();
    if(empty($dislike_user->user_id)){
        $user_id = Auth::user()->id;
        $email = Auth::user()->email;
        $post_id = $id;
        $dislike = new Dislike;
        $dislike->user_id = $user_id;
        $dislike->email = $email;
        $dislike->post_id = $post_id;
        $dislike->save();
            return redirect("home"); 
        }else{
            return redirect("home");
        }
        // return $id;
    }

    public function comment(Request $request, $post_id){
        $this->validate($request, [
            'comment' => 'required'
           
        ]);
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post_id;
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect("home")->with('response', 'Comment Posted Successfully');
    }

    public function search(Request $request){
        $user_id = Auth::user()->id;
        // $profile = Profile::find($user_id);
        $keyword = $request->input('search');
        $posts = Post::where('name', 'LIKE', '%'.$keyword.'%')->get();
        return view('posts.searchposts', [ 'posts' => $posts]);

        // return "hh";
     }
    
}
