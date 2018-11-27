@extends('layouts.app')

@section('content')
    <br>
    <a href="{{ url('/posts') }}" class="btn btn-secondary">Go back</a>
    <hr>
    <h1>{{$post->title}}</h1>
    <br>
    <small>Written on {{$post->created_at}}</small>
    <div class="list-group-item">
        {{$post->body}}
    </div>
@endsection