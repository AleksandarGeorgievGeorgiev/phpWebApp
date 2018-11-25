<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Blogsters') }}
    </a>
    <div class="collapse navbar-collapse justify-content-center">
        <ul class="nav">
            <li><a class="nav-link" href="{{ url('/') }}">Home</a></li>
            <li><a class="nav-link" href="{{ url('/about') }}">About</a></li>
        </ul>
    </div>   
</nav>
