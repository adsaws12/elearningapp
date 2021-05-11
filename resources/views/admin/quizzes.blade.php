@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mx-auto" style="width:30%">
                <div class="m-3">
                <h3 class="mb-3">{{$category->title}}</h3>
                <p>{{$category->description}}</p>
                </div>
            </div>
        </div>
        <div class="ml-auto mt-2 mb-2 mr-2">
            <a href="{{ route('admin.dashboard.categories.question', $category->id ) }}" class="btn btn-primary">Add a Question</i></a>
        </div>
        <table class="table table-striped  justify-content-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Question</th>
                    <th scope="col">Choices</th>
                    <th scope="col">Action</th>
                </tr> 
            </thead>
            {{-- @foreach ($categories as $category) --}}
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('admin.dashboard.categories.view', $category->id)}}">{{$category->title}}</a></td>
                    <td>{{$category->description}}</td>
                    <td class="row">
                        <form method="POST"action="#">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                        </form>
                        <a href="#" class="btn btn-warning ml-2"><i class="bi bi-pencil-square"></i></a>
                    </td>
                </tr>
            {{-- @endforeach --}}
           
        </table>
    </div>
        
</div>
@endsection
