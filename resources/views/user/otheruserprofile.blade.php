
@extends('layouts.app')
<link rel="stylesheet" href="/css/styless.css">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="card">
                    <img src="/img/3.jpg" class="card-img-top mx-auto" alt="Profile Picture">
                    <div class="card-body">
                        <h4 class="card-title text-center">{{$userprofile->name}}</h4>
                        <div class="text-center">
                            @if (auth()->user()->id != $userprofile->id )
                                @if (auth()->user()->is_following($userprofile->id))
                                    <a href="{{route('home.userslist.unfollow', ['unfollowed_id'=>$userprofile->id]) }}" class="btn btn-danger w-50">UnFollow</a>
                                @else
                                    <a href="{{route('home.userslist.follow', ['followed_id'=>$userprofile->id]) }}" class="btn btn btn-primary w-50">Follow</a>
                                @endif
                            @else
                                <a href="{{route('admin.dashboard.user.edit', auth()->user()->id)}}" class="btn btn-primary w-50">Edit</a>
                            @endif
                        </div>
                        <hr class="mt-2">
                        <div class="row text-center">
                            <div class="col-6">
                                <a href="#">{{$userprofile->following()->count()}}</a>
                                <p>following</p>
                            </div>
                            <div class="col-6">
                                <a href="#">{{$userprofile->followers()->count()}}</a>
                                <p>followers</p>  
                            </div>
                        </div>
                        <hr class="mt-3">
                        <div class="text-center">
                            <p>Learned 0 words</p>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-12">
                asdasdsa
            </div>
        </div>
    </div>
@endsection