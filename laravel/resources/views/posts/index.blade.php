@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <a href="posts/{{$post->id}}">
                <div class="list-group-item list-group-item-action" role="tabpanel" >
                    <h3>{{$post->title}}</h3>
                    <small>Written on {{$post->created_at}}</small>
                    <img src="" alt="" class="float-right">
                </div>
                <br>
            </a>
        @endforeach
    @else
        <p>No posts found!</p>
    @endif
@endsection