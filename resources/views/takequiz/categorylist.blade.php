@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Categories</h1>

    <div class="row mt-5">
        @foreach ($categories as $category)
            <div class="col-6 mt-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title">{{$category->title}}</h4>
                        <p class="card-text">{{$category->description}}</p>
                        <form action="{{route('lesson')}}" method="POST">        
                            @csrf
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <button type="submit" class="btn btn-primary float-right">Take Quiz</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
