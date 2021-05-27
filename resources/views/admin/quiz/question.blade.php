@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12 mx-auto">
        <div class="card p-3" style="box-shadow:0 0.5rem 1rem rgb(0 0 0 / 15%)">
            <div class="card-title">
                <h3>Add a Question</h3>
                <hr>
            </div>
            <form class="form-group" action="{{url('/admin/dashboard/categories/category/question/'. $category->id . '/answer')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label>Question Text</label>
                        <input type="text" name="question" class="form-control">
                    </div>
                    <div class="col-6">
                        <div class="form-radio mb-3 col-12">
                            <label>Choice 1</label>
                            <input type="text" name="options[1]" class="form-control">
                            <label class="form-radio-label" style="cursor: pointer">
                                <input type="radio" class="form-radio-input" name="correct_answer" value="1" required="">
                                Correct Answer
                            </label>
                        </div>
                        <div class="form-radio mb-3 col-12">
                            <label>Choice 2</label>
                            <input type="text" name="options[2]" class="form-control">
                            <label class="form-radio-label" style="cursor: pointer">
                                <input type="radio" class="form-radio-input" name="correct_answer" value="2" required="">
                                Correct Answer
                            </label>
                        </div>
                        <div class="form-radio mb-3 col-12">
                            <label>Choice 3</label>
                            <input type="text" name="options[3]" class="form-control">
                            <label class="form-radio-label" style="cursor: pointer">
                                <input type="radio" class="form-radio-input" name="correct_answer" value="3" required="">
                                Correct Answer
                            </label>
                        </div>
                        <div class="form-radio mb-3 col-12">
                            <label>Choice 4</label>
                            <input type="text" name="options[4]" class="form-control">
                            <label class="form-radio-label" style="cursor: pointer">
                                <input type="radio" class="form-radio-input" name="correct_answer" value="4" required="">
                                Correct Answer
                            </label>
                        </div>
                    </div>
                    <div class="col-12 ">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary mr-2">Create Question</i></button>
                            <a href="{{route('admin.dashboard.categories.view', $category->id)}}" class="btn btn-secondary mr-2">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
