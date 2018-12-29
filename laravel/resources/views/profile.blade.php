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
        <aside class="profile-card">
            <br><br><br>
            <div class="content">
                <div class="row justify-content-center">
                    <div class="profile-header-container">
                        <div class="profile-header-img rounded-circle">
                            <img class="profile-image" src="{{ URL::to('/') }}/storage/profile_images/{{ $user->profile_image}}" />
                        </div>
                        <div class="middle">
                            <button class="text btn btn-success" id="slide" >{{$user->name}}</button>
                        </div>
                    </div>
                </div>
            </div>
                    <br><br>
            <div class="editable" style="display:none">
                Edit user stats
                <br>
                {!!Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST', 'enctype'=>'multipart/form-data'])!!}
                    {{-- <input class="form-control input justify-content-center" type="text" placeholder="username">
                    <br> --}}
                    {{Form::text('name', '', ['class' => 'username form-control', 'placeholder' => 'username'])}}
                    <br>
                    <div class="form-group">
                        {{Form::file('profile_image')}}
                    </div>
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the account?')"  href="{{URL::to('/profile/delete')}}">Delete Account</a>
                {!!Form::close()!!}
            </div>
        </aside>
    </div>
@endsection