@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

         <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                <ul class="list-group">
                    {{-- @if (count($categories) > 0)
                            @foreach ($categories->all() as $category)
                                <li  class="list-group-item"><a href='{{ url("category/{$category->id}") }}'>{{$category->category}}</a></li>
                            @endforeach
                        @else
                            <p>No category Found</p>
                        @endif --}}

                    @foreach ($users as $user)
                            <h3>{{$user->name}}</h3> 
                            @foreach ($user->posts as $post)
                                <h5>{{$user->posts->count()}}</h5>
                                <h5>{{$post->name}}</h5>  

                            @endforeach 
                    @endforeach

                      <!-- @foreach ($likes as $like)
                            <h3>{{$like->count()}}</h3> 
                            
                    @endforeach  -->


                     </ul>
                </div>
            </div>
        </div>
                            @foreach ($regions->all() as $region)
                               
                            @endforeach
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="row">
                         <div class="col-md-4">Dasboard</div>
                         <div class="col-lg-8">
                            <form class="form-horizontal" method="POST" action='{{ url("/search") }}' enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class ="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default-sm" type="submit">
                                            Go
                                        </button>
                                    </span>
                                </div>
                            </form>
                         </div>
                    </div>
                 
                 </div>
                
                <div class="panel-body">
                   
                

                    @if (count($posts) > 0)
                            @foreach ($posts->all() as $post) 
                                <a href='{{ url("personal/{$post->name}") }}'><img src="{{$post->image}}" alt="" style="width:200px; height:200px;"/></a>
                                <ul class="list-group">
                                    <li  class="list-group-item">
                                    <h4>Name: {{$post->name}}</h4>
                                    <h4>Title: {{$post->designation}}</h4>
                                    <h4>Experience: {{$post->experience}}</h4>
                                    <h4>Address: {{$post->address}}</h4>
                                    <h4>Telephone: {{$post->telephone}}</h4>
                                    <h4>Region: {{$region->region}}</h4>
                                    <h4>About myself: {{$post->about}}</h4>
                                    
                                    <cite style="float:right;">Posted on: {{date('M j, Y H:i', strtotime($post->updated_at))}}</cite>
                                     </li>
                                     {{-- <cite style="float:right;">Posted on: {{date('M j, Y H:i', strtotime($post->updated_at))}}</cite> --}}
                                </ul>
                                  <ul class="nav nav-pills">
                                    <li role="presentation">
                                        <a href='{{ url("/like/{$post->id}")}}'>
                                            <span class="fa fa-thumbs-up"> Like (
                                                <!-- {{ $post->likes->count() }} -->

                                                ) </span>
                                        </a>
                                    </li>
                                     <li role="presentation">
                                        <a href='{{ url("/dislike/{$post->id}")}}'>
                                            <span class="fa fa-thumbs-down"> Dislike (
                                                <!-- {{ $post->dislikes->count() }}                                                 -->
                                                ) </span>
                                        </a>
                                    </li>
                                     <li role="presentation">
                                        <a href='{{ url("/home")}}'>
                                            <span class="fa fa-comment-o"> Comment </span>
                                        </a>
                                    </li>
                                </ul>

                                 <form class="form-horizontal" method="POST" action='{{url("/comment/{$post->id}")}}' enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    <div class="form-group">
                                        <textarea id="comment" rows="4" class="form-control" name="comment" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button id="comment" rows="4" class="btn btn-success btn-lg btn-block">Post Comment</button>
                                    </div>        
                                </form>

                                {{-- <h3>Comment</h3>
                        @if (count($comments) > 0)
                            @foreach ($comments->all() as $comment)
                                <p>{{ $user->name }}: {{ $comment->comment }}</p>
                                <p>Posted by {{ $user->name }}</p>
                            @endforeach
                        @else
                                <p>No post available</p>
                        @endif --}}

                                <hr/>
                            @endforeach
                           @else
                                <p>No post available</p>
                        @endif
                       
                                {{-- {{$posts->links()}} --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
