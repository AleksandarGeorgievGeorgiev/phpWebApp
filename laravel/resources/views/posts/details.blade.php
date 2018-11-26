@extends('layouts.app')

@section('content')
    <br>
    <a href="{{ url('/posts') }}" class="btn btn-secondary">Go back</a>
    <h1>{{$post->title}}</h1>
    <small>Written on {{$post->created_at}}</small>
    <div class="list-group-item">
        {{$post->body}}
    </div>
@endsection