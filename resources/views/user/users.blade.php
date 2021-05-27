@extends('layouts.app')
<link rel="stylesheet" href="/css/styless.css">

@section('content')
    <div class="container">
            <div class="card w-75 mx-auto mt-2" >
                <div class="card-title">
                    <h1 class="p-2">All Users</h1>
                    <hr>
                </div>
                    @foreach ($users as $user)
                    <div class="card-body row">
                        <div>
                            <img src="/img/3.jpg" alt="" width="50" class="ml-3">
                        </div>
                        <div>
                            <a href="{{route('home.userslist.profileview', $user->id)}}" class=" nav-link mt-2 ml-1">{{$user->name}}</a>
                        </div>
                        <div class="ml-auto">
                            @if (auth()->user()->is_following($user->id))
                                <form action="{{route('home.userslist.unfollow', ['unfollowed_id'=>$user->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-2 float-right mb-2 mr-2">UnFollow</button>
                                </form>
                            @else
                                <form action="{{ route('home.userslist.follow', ['followed_id'=>$user->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary mt-2 float-right mb-2 mr-2">Follow</button>
                                </form>
                                {{-- <a href="{{route('home.userslist.follow', ['followed_id'=>$user->id]) }}" class="btn btn-primary mt-2 float-right mb-2 mr-2">Follow</a> --}}
                            @endif
                            {{-- <button type="submit" class="btn btn-primary mr-2 mt-2">Follow</button> --}}
                        </div>
                    </div>
                    @endforeach
            </div>
    </div>
@endsection