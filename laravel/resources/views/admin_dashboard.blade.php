@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p style="text-align:center"><strong>{{ Auth::user()->name }}</strong>, these are all users!</p>
                    @if(Auth::user()->users() != null)
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            @foreach(Auth::user()->users() as $user)
                            <tr>
                                <td>{{$user->name}} </td>
                                <td>{{$user->email}}</td>
                            </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no users !</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection