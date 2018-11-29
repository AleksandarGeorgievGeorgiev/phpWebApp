<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Blogsters') }}
            </a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="nav" style="margin-right: 60% !important">
                <li><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                <li><a class="nav-link" href="{{ url('/posts') }}">Posts</a></li>
            </ul>
            <ul class="nav">
                @if(Auth::guest())
                    <li><a class="btn btn-outline-warning btn-rounded waves-effect" href="{{ route('login') }}">Login</a></li>
                    &nbsp;&nbsp;
                    <li><a class="btn btn btn-primary btn-rounded waves-effect" href="{{ route('register') }}">Sign up</a></li>
                @else
                <li class="dropdown">
                    <a id="navbarDropdown" class="dropdown-toggle text-success" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu bg-dark" role="menu">
                        <a class="dropdown-item text-primary" href="{{ url('/profile') }}">
                        Profile
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item text-primary" href="{{ url('/dashboard') }}">Dashboard</a>  
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>                                             
                    </ul>
                </li>
                @endguest
            </ul>
        </div>   
    </div>
</nav>
