@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>

            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="profile-header-container">
                <div class="profile-header-img rounded-circle">
                    <img class="profile-image" src="{{ URL::to('/') }}/storage/profile_images/{{ $user->profile_image}}" />
                </div>
                <div class="middle">
                    <span class="text">{{$user->name}}</span>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row justify-content-center">
            {!!Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
                <div class="form-group">
                    {{Form::file('profile_image')}}
                </div>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!!Form::close()!!}
        </div>
    </div>
@endsection