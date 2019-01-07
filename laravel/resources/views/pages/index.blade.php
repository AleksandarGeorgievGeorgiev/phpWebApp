@extends('layouts.app')

@section('content')
<div class="jumbotron text-center border border-primary">
    <h2>{{$title}}</h2>
</div>
<div id="image-homepage">
    <img id="loading" src="{{ URL::to('/') }}/storage/logo.png" height="20%">
</div>
@endsection