@extends('pages.layouts.app')

@section('content')
    <h1>Albums</h1>
    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/Hello/public/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></h3>
                        <small>Created on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>                
            </div> 
        @endforeach  
        {{$posts->links()}} 
    @else
        <p>No albums found.</p>
    @endif
@endsection