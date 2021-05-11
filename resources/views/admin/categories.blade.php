@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Admin Dashboard | Categories</h1>

            <ul class="list-group list-group-horizontal mt-4 mb-3">
                <li class="list-unstyled "><a href="#">Categories</a></li>
                <li class="list-unstyled ml-3"><a href="#">Users</a></li>
            </ul>
            <hr class=" mb-5">
        </div>
        <div class="ml-auto mt-2 mb-2 mr-2">
            <a href="{{ route('admin.dashboard.categories.category') }}" class="btn btn-success">New Category</i></a>
        </div>
        <table class="table table-striped  justify-content-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr> 
            </thead>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('admin.dashboard.categories.view', $category->id)}}">{{$category->title}}</a></td>
                    <td>{{$category->description}}</td>
                    <td class="row">
                        <form method="POST"action="{{route('admin.dashboard.categories.delete',$category->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                        </form>
                        <a href="{{route('admin.dashboard.categories.edit', $category->id)}}" class="btn btn-warning ml-2"><i class="bi bi-pencil-square"></i></a>
                    </td>
                </tr>
            @endforeach
           
        </table>
    </div>
</div>
@endsection
