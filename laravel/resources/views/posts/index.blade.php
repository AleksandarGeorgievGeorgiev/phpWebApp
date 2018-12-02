@extends('layouts.app')

@section('content')
    <h1>Recent Posts</h1>
    @if(count($posts) > 0)
        <div class="row">
            @foreach($posts as $post)  
                    <div class="col-md-6" style="padding-top:70px">
                        <div class="blog-body card flex-md-row mb-0 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <h3 class="mb-2">
                                    <a class="text-dark" href="{{ url('/posts') }}/{{$post->id}}">{{$post->title}}</a>
                                </h3>
                                <div class="mb-1 text-muted">
                                <small class="text-muted">Written on {{$post->created_at}} by {{Auth::user()->name}}</small>
                                </div>
                            </div>                        
                        </div>
                    </div>                 
            @endforeach
        </div>
    @else
        <p>No posts found!</p>
    @endif
@endsection