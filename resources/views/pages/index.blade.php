@extends('pages.layouts.app')

@section('content')
      <div class="jumbotron text-center">
            <h1>Welcome!</h1>
            <p>Make yourself right at home.</p>
            @if (Route::has('login'))
                  <div class="top-right links">
                  @auth
                        
                  @else
                  <p><a class="btn btn-primary btn-lg" href="/Hello/public/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/Hello/public/register" role="button">Register</a></p>
                  @endauth
                  </div>
            @endif
      </div>
@endsection