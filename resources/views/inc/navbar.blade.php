      <nav class="navbar navbar-expand-md navbar-dark bg-dark"data-ng-include="'/views/header.html'" data-role="navigation">
            <span class="navbar-brand">Big Smile</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="/Hello/public/">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/Hello/public/about">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="/Hello/public/services">Services</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link disabled" href="/Hello/public/posts">Albums</a>
                    </li>
                </ul>
                {{-- <ul class="nav navbar-nav navbar-right">
                  <li><a href="/Hello/public/posts/create">Create Post</a><li>
                </ul> --}}

                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                        <a class="nav-link disabled" href="/Hello/public/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="/Hello/public/register">Register</a>
                            </li>
                      </ul>
                  @else
                      <li class="dropdown">
                          <a href="/Hello/public/home" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>
  
                          <ul class="dropdown-menu" role="menu">
                              <li><a href="/Hello/public/home">Dashboard</a></li>
                              <li>
                                  <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>
  
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                  @endif
              </ul>
            </div>
          </nav>
        </header>