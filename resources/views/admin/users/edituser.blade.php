@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Edit User</h4>
                    <form class="form-group" action="{{route('admin.dashboard.user.update', $user->id)}}" method="POST">
                        @csrf        
                        @method('PATCH')
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" name="name" id="name" required="" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" id="email" required="" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" name="password" id="password" required="">
                        </div>
                        <div class="form-group">
                          <label>Confirm Password</label>
                          <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required="">
                        </div>
                        <div class="form-check">
                            @if($user->usertype == 0)
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="usertype" id="admin" checked value="0">
                                    Admin
                                </label>
                                <label class="form-check-label ml-5">
                                    <input type="radio" class="form-check-input" name="usertype" id="user"  value="1">
                                    User
                                </label>
                            @elseif($user->usertype == 1)
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="usertype" id="admin"  value="0">
                                    Admin
                                </label>
                                <label class="form-check-label ml-5">
                                    <input type="radio" class="form-check-input" name="usertype" id="user" checked value="1">
                                    User
                                </label>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Create User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection