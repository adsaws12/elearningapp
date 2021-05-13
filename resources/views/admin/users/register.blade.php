@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title">Create a new User</h4>
                    <form class="form-group" action="{{route('admin.dashboard.user.register.create')}}" method="POST">
                        @csrf        
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" name="name" id="name" required="">
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" id="email" required="">
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
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="usertype" id="admin" value="0">
                            Admin
                          </label>
                          <label class="form-check-label ml-5">
                            <input type="radio" class="form-check-input" name="usertype" id="admin" value="1">
                            User
                          </label>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Create User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

