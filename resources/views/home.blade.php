@extends('pages.layouts.app')

@section('content')
    {{-- @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id) --}}
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        
                        <div class="panel-body">
                            <a href="/Hello/public/posts/create" class="btn btn-primary">Create Album</a>
                            <br>
                            <h3>Your Albums</h3>
                            <br>
                            @if(count($posts) > 0)
                                <table class="table table-striped">
                                    <tr>
                                        <th>Title</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->title}}</td>
                                            <td><a href="/Hello/public/posts/{{$post->id}}/edit" class="btn btn-default">Edit</td>
                                            <td>
                                                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                {!!Form::close()!!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>     
                            @else  
                                <p>You have no albums</p>
                            @endif   
                    </div>
                </div>
            </div>
        </div>
    </div>           
@endsection

