@extends('layouts.app')

@section('content')
    <br>
    <a href="/web3-app/laravel/public/posts" class="btn btn-primary">Go Back</a>   
    <br><br>
    <h1>{{$post->title}}</h1>
    <img class="card-img flex-auto d-none d-md-block post-image" src="{{ URL::to('/') }}/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
    <br>
    <div>
        {!!$post->body!!}
    </div>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <br><br>
    @if(!Auth::guest())
        <table class="table table-striped">
            <tr>
                <th>Edit</th>
                <th>Create PDF</th>
                <th>Delete</th>
            </tr>
            <tr>
                @if(Auth::user()->id === $post->user_id && !Auth::user()->isAdmin())
                    <td>
                        <a href="/web3-app/laravel/public/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                    </td>
                    <td><a href="{{ url('/pdf') }}/{{$post->id}}" class="btn btn-danger">Create PDF</a></td>
                    <td>
                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                @endif
                @if(Auth::user()->isAdmin())
                    <td>
                        <a href="/web3-app/laravel/public/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                    </td>
                    <td><a href="{{ url('/pdf') }}/{{$post->id}}" class="btn btn-danger">Create PDF</a></td>
                    <td>
                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                @endif
            </tr>
        </table>
    @endif
@endsection