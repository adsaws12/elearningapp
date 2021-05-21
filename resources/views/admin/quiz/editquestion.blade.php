@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12 mx-auto">
        <div class="card p-3" style="box-shadow:0 0.5rem 1rem rgb(0 0 0 / 15%)">
            <div class="card-title">
                <h3>Edit a Question</h3>
                <hr>
            </div>
            <form class="form-group" action="{{url('/admin/dashboard/categories/category/question/'. $category->id. '/edit/' . $question->id).'/update/'}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                        <div class="col-6">
                            <label>Question Text</label>
                            <input type="text" name="question" class="form-control" value="{{$question->question}}">
                        </div>
                        <div class="col-6">
                            @foreach ($question->options as $key => $option)
                            <div class="form-radio mb-3 col-12">
                                <label>Choice 1</label>
                                <input type="text" name="options[{{$key + 1}}]" class="form-control" value="{{$option->options}}">
                                <label class="form-radio-label" style="cursor: pointer">
                                    <input type="radio" class="form-radio-input" name="correct_answer" value="{{ $key + 1 }}" required="" {{ $option->correct_answer == true ? 'checked' : null }}>
                                    Correct Answer
                                </label>
                            </div>
                            @endforeach
                        </div>
                    <div class="col-12 ">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary mr-2">Update Question</i></button>
                            <a href="{{route('admin.dashboard.categories.view', $category->id)}}" class="btn btn-secondary mr-2">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
