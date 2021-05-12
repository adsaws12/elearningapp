@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Admin Dashboard | Categories</h1>

            <ul class="list-group list-group-horizontal mt-4 mb-3">
                <li class="list-unstyled "><a href="{{ route('admin.dashboard.categories') }}">Categories</a></li>
                <li class="list-unstyled ml-3"><a href="{{ route('admin.dashboard.users') }}">Users</a></li>
            </ul>
            <hr class=" mb-5">
        </div>
        <div class="ml-auto mt-2 mb-2 mr-2">
            <a href="{{ route('admin.dashboard.user.register') }}" class="btn btn-info">New User</i></a>
        </div>


        <table class="table table-striped  justify-content-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr> 
            </thead>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if ($user->usertype == 1)
                        <td>User</td>
                    @elseif ($user->usertype == 0)
                        <td>Admin</td>    
                    @endif
                    <td class="row">
                        <form method="POST"action="{{route('admin.dashboard.user.delete',$user->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                        </form>
                        <a href="{{route('admin.dashboard.user.edit', $user->id)}}" class="btn btn-warning ml-2"><i class="bi bi-pencil-square"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
