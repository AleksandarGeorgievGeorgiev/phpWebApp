@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p style="text-align:center"><strong>{{ Auth::user()->name }}</strong>, these are all users!</p>
                    @if($users != null)
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Account Status</th>
                                <th>Account Action</th>
                                <th>Administration</th>
                            </tr>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}} </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->deleted_at != NULL ? 'Deactivated' : 'Active'}}</td>
                                <td>
                                    @if($user->deleted_at == NULL)
                                        @if($user->is_admin)
                                            Cannot delete admin account!
                                        @else
                                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the account?')" href="{{URL::to('/profile/destroy/'. $user->id)}}">Delete Account</a>
                                        @endif 
                                    @else
                                        <a class="btn btn-primary" href="{{URL::to('/profile/restore/'. $user->email)}}">Restore Account</a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn {{ $user->is_admin ? 'btn-danger' : 'btn-primary' }}" href="{{URL::to('/profile/adminRights/'. $user->email)}}">
                                        {{ $user->is_admin ? 'Remove Rights' : 'Make Admin' }}
                                    </a>
                                </td>
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