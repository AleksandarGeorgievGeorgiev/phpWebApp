@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->isAdmin())
                        <a href="{{ url('/excel') }}" class="btn btn-warning pull-left">Export</a>
                    @endif
                    <a class="btn btn-primary float-right" href="{{url('/posts/create')}}">Create Post</a>
                    <br><br>        
                    <p style="text-align:center"><strong>{{ Auth::user()->name }}</strong>, these are your posts!</p>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>Export PDF</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>                
                                        <td><a href="posts/{{$post->id}}/edit" class="btn btn-info ">Edit</a></td>
                                        <td><a href="{{ url('/pdf') }}/{{$post->id}}" class="btn btn-danger">Create PDF</a></td>
                                        <td>
                                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    @else
                        <p>You have no posts !</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
