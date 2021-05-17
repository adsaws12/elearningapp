@extends('layouts.app')
<link rel="stylesheet" href="/css/styless.css">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="card">
                    <img src="/img/3.jpg" class="card-img-top mx-auto" alt="Profile Picture">
                    <div class="card-body">
                        <h4 class="card-title text-center">{{auth()->user()->name}}</h4>
                        <div class="text-center">
                            <a href="{{route('admin.dashboard.user.edit.user', auth()->user()->id)}}" class="btn btn-primary w-50">Edit</a>
                        </div>
                        <hr class="mt-2">
                        <div class="row text-center">
                            <div class="col-6">
                                <a href="#">{{auth()->user()->following()->count()}}</a>
                                <p>following</p>
                            </div>
                            <div class="col-6">
                                <a href="#">{{auth()->user()->followers()->count()}}</a>
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