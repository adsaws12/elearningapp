@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h3>Dashboard</h3>
            {{-- {{dd($users)}} --}}
            <div class="row">
                <div class="col-md-4">
                    <img src="/img/3.jpg" alt="" width="100%" class="ml-3">
                </div>
                <div class="col-md-8">
                    <h1>
                        {{auth()->user()->name}}
                    </h1>
                </div>
            </div>
        </div>
        @include('activities');
    </div>
</div>
@endsection
