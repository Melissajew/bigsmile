@extends('pages.layouts.app')

@section('content')
  <h3>{{$photo->title}}</h3>
  <p>{{$photo->body}}</p>
  <a href="/albums/{{$photo->post_id}}">Back To Gallery</a>
  <hr>
  <img src="/storage/photos/{{$photo->post_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
  <br><br>
  {!!Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete Photo', ['class' => 'button alert'])}}
  {!!Form::close()!!}
  <hr>
  <small>Size: {{$photo->size}}</small>
@endsection
