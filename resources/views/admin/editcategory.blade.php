@extends('layouts.app')

@section('content')
<div class="container">
        <div class="card w-50 mx-auto">
            <div class="m-3">
                <form class="form-group" action="{{route('admin.dashboard.categories.update', $category->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <h5 class="text-uppercase">Editing Category</h5>
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{$category->title}}">
                </div>
                    <label>Description</label>
                    <textarea class="form-control" rows="4" name='description'>{{$category->description}}</textarea>
                    <button type="submit" class="btn btn-primary mt-2 float-right ">Update Category</button>
                </form>
            </div>
        </div>
</div>
@endsection
