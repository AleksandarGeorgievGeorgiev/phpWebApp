@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Recent Posts</h1>    
    </div>
    @if(count($posts) > 0)
        <div class="row">
            @foreach($posts as $post)  
                    <div class="col-md-6" style="padding-top:70px">
                        <!-- Card Wider -->
                        <div class="card-posts card card-cascade wider">

                            <!-- Card image -->
                            <div class="view view-cascade overlay">
                                <a href="{{ url('/posts') }}/{{$post->id}}">
                                <img  class="card-cover-image card-img-top" src="{{ URL::to('/') }}/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">      
                                <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            
                            <!-- Card content -->
                            <div class="card-body card-body-cascade text-center">
                            
                                <!-- Title -->
                                <h4 class="card-title"><strong>{{$post->name}}</strong></h4>
                                <!-- Subtitle -->
                                <h5 class="blue-text pb-2"><strong>{{$post->title}}</strong></h5>
                                <!-- Text -->
                                <p class="card-text">Written on {{$post->created_at}}</p>
                            </div>    
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