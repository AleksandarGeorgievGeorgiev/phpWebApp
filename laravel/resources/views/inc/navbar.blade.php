<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Blogsters') }}
        </a>
        <ul class="nav justify-content-center">
            <li><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li><a class="nav-link" href="{{ url('/about') }}">About</a></li>
        </ul>
    </div>   
</nav>
