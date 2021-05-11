@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-12 mx-auto">
        <div class="card p-3" style="box-shadow:0 0.5rem 1rem rgb(0 0 0 / 15%)">
            <div class="card-title">
                <h3>Add a Question</h3>
                <hr>
            </div>
            <form class="form-group" action="#" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <label>Question Text</label>
                        <input type="text" name="question" class="form-control">
                    </div>
                    <div class="col-6">
                        <label>Choice 1</label>
                        <input type="text" name="choice" class="form-control">
                        <div class="form-radio mb-3">
                            <label class="form-radio-label" style="cursor: pointer">
                                <input type="radio" class="form-radio-input" name="correct_answer" value="1" required="">
                                Correct Answer
                            </label>
                        </div>
                        <label>Choice 2</label>
                        <input type="text" name="choice" class="form-control">
                        <div class="form-radio mb-3">
                            <label class="form-radio-label" style="cursor: pointer">
                                <input type="radio" class="form-radio-input" name="correct_answer" value="1" required="">
                                Correct Answer
                            </label>
                        </div>
                        <label>Choice 3</label>
                        <input type="text" name="choice" class="form-control">
                        <div class="form-radio mb-3">
                            <label class="form-radio-label" style="cursor: pointer">
                                <input type="radio" class="form-radio-input" name="correct_answer" value="1" required="">
                                Correct Answer
                            </label>
                        </div>
                        <label>Choice 4</label>
                        <input type="text" name="choice" class="form-control">
                        <div class="form-radio mb-3">
                            <label class="form-radio-label" style="cursor: pointer">
                                <input type="radio" class="form-radio-input" name="correct_answer" value="1" required="">
                                Correct Answer
                            </label>
                        </div>

                    </div>
                    <div class="col-12 ">
                        <form method="POST"action="#">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary float-right mr-2">Create Question</i></button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
