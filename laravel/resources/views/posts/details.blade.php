@extends('layouts.app')

@section('content')
    <br>
    <a href="/web3-app/laravel/public/posts" class="btn btn-primary">Go Back</a>   
    <br><br>
    <h1>{{$post->title}}</h1>
    <img class="card-img flex-auto d-none d-md-block" src="{{ URL::to('/') }}/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
    <br>
    <div>
        {!!$post->body!!}
    </div>
    <small>Written on {{$post->created_at}} by {{Auth::user()->name}}</small>
    <br><br>
    @if(!Auth::guest())
        @if(Auth::user()->id === $post->user_id)
            <a href="/web3-app/laravel/public/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection