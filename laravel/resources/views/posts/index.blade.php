@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Recent Posts</h1>    
    </div>
    @if(count($posts) > 0)
        <div class="row">
            @foreach($posts as $post)  
                    <div class="col-md-6" style="padding-top:70px">
                        <div class="blog-body card flex-md-row mb-0 box-shadow h-md-250 border border-primary">
                            <div class="card-body d-flex flex-column align-items-start">
                                <h3 class="mb-2">
                                    <a class="text-dark" href="{{ url('/posts') }}/{{$post->id}}">{{$post->title}}</a>
                                </h3>
                                <div class="mb-1 text-muted">
                                <small class="text-muted">Written on {{$post->created_at}} by {{$post->user->name}}</small>
                                </div>
                            </div>  
                            <img class="cover-image card-img-right flex-auto d-none d-md-block"
                            src="{{ URL::to('/') }}/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">                       
                        </div>
                    </div>                 
            @endforeach
        </div>
        <br>
    @else
        <p>No posts found!</p>
    @endif
    {{$posts->links()}}
@endsection