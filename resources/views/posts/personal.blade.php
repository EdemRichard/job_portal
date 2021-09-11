@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

         <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                
                <div class="panel-body">
                    {{-- @foreach ($posts->all() as $post)
                             @endforeach
                        <h2>{{$post->name}}</h2>



                    @if (count($posts) > 0)
                            @foreach ($posts->all() as $post)
                                <img src="{{$post->image}}" alt="" style="width:200px; height:200px;"/>
                             @endforeach
                        @else
                            <p>No post Found</p>
                        @endif  
 --}}


                    {{-- @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->posts->isNotEmpty())
                                    {{ $user->posts->sortByDesc('created_at')->first()->created_at->format('M j, Y \a\t g:i a') }}
                                @else
                                    Never
                                @endif
                            </td>
                         </tr>
                    @endforeach --}}







                    
                         
                
                    {{-- @foreach(Auth::user()->posts as $post)

                     {{ $post->id }}
        
                    @endforeach --}}
                   jj
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
