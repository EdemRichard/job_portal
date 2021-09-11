@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

         <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                <ul class="list-group">
                    @if (count($categories) > 0)
                            @foreach ($categories->all() as $category)
                                <li  class="list-group-item"><a href='{{ url("category/{$category->id}") }}'>{{$category->category}}</a></li>
                            @endforeach
                        @else
                            <p>No category Found</p>
                        @endif
                     </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                
                <div class="panel-body">
                   
                

                    @if (count($posts) > 0)
                            @foreach ($posts->all() as $post) 
                                <a href='{{ url("personal/{$post->id}") }}'><img src="{{$post->image}}" alt="" style="width:200px; height:200px;"/></a>
                                <ul class="list-group">
                                    <li  class="list-group-item">
                                    <h4>Name: {{$post->name}}</h4>
                                    <h4>Title: {{$post->designation}}</h4>
                                    <h4>Experience: {{$post->experience}}</h4>
                                    <h4>Address: {{$post->address}}</h4>
                                    <h4>Telephone: {{$post->telephone}}</h4>
                                    <h4>Region: {{$post->region}}</h4>
                                    <h4>About myself: {{$post->about}}</h4>
                                    <cite style="float:right;">Posted on: {{date('M j, Y H:i', strtotime($post->updated_at))}}</cite>
                                     </li>
                                     {{-- <cite style="float:right;">Posted on: {{date('M j, Y H:i', strtotime($post->updated_at))}}</cite> --}}
                                </ul>
                                 

                                <hr/>
                                
                            @endforeach
                           @else
                                <p>No post available</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
