@extends('pages.layouts.app')

@section('content')
<a href="/Hello/public/posts">Go Back</a>
    <h1>{{$post->title}}</h1>
    
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
        <hr>
        <a class="button" href="/Hello/public/photos/create/{{$post->id}}">Add Photos to Album</a>
        <a href="/Hello/public/posts/{{$post->id}}/edit" class="button secondary">Edit</a>
        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        <hr>
        @endif
    @endif
    <div>
        {!!$post->body!!}
    </div>
    <br><br>

    @if(count($post->photos) > 0)
        <div class="row text-center">
            @foreach($post->photos as $photo)
                <div class="card-body bg-light ">
                    <div class="row-md-4 row-sm-4">
                    <a href="/Hello/public/storage/photos/{{$photo->post_id}}/{{$photo->photo}}">
                    <img class="thumbnail" style="width:100%" src="/Hello/public/storage/photos/{{$photo->post_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                    </a>
                    <h4>{{$photo->title}}</h4>
                </div>
                </div>
            @endforeach 
        </div> 
    @else
        <p>No Photos To Display.</p>
    @endif

    {{-- Hiding elements from guest --}}

    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection