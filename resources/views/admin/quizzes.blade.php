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
            <a href="{{ route('admin.dashboard.categories.question', $category->id) }}" class="btn btn-primary">Add a Question</i></a>
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
            @foreach ($category->questions as $question)
                @if($question->category_id == $category->id)
                    <tr>
                        <td>{{$question->id}}</td>
                        <td>{{$question->question}}</td>
                        <td>
                            <ul class="list-group list-group-horizontal">
                                @foreach($question->answers as $answer)
                                <li class="list-unstyled mr-4" style='{{ $answer->correct_answer ? 'color: green;' : null }}'>  {{$answer->options}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="row">
                            <form method="POST"action="#">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                            </form>
                            <a href="#" class="btn btn-warning ml-2"><i class="bi bi-pencil-square"></i></a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
        <div class="ml-auto mt-2 mb-2 mr-2">
            <a href="{{ route('admin.dashboard.categories')}}" class="btn btn-secondary">Back</i></a>
        </div>
    </div>
        
</div>
@endsection
