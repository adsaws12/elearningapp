@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-4">
                
                @foreach ($questions as $question)
                <h1>

                    {{$question->category->title}}    
                    <span class="float-right">  {{$questions->currentPage()}} / {{$questions->lastPage()}}</span>
                </h1>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h1>
                                        {{$question->question}}
                                    </h1>
                                    @foreach ($question->options as $key => $option)
                                        <form action="{{route('lessons.answer', ['lesson' => $lesson])}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="nextPageUrl" value="{{ $questions->nextPageUrl()}}">
                                            <input type="hidden" name="lastPageUrl" value="{{$questions->lastPage()}}">
                                            <input type="hidden" name="option_id" value="{{$option->id}}">
                                            <input type="hidden" name="question_id" value="{{$question->id}}">
                                            <button type="submit" class="btn my-2 btn-primary btn-lg btn-block" name="ur_answer[{{$key + 1}}]" value="{{$option->options}}">{{$option->options}}</button>
                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection