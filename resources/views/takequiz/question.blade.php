@extends('layouts.app')

@section('content')


{{-- @foreach ($questions->options() as $option)
   
@endforeach --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-4">
                <h1>
                {{$questions->currentPage()}} / {{$questions->lastPage()}}
                {{-- {{$questions->category->questions}} --}}
                {{-- {{$questions->category->questions->currentPage()}} --}}
                    <span class="float-right">page</span>
                </h1>
                @foreach ($questions as $question)
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h1>
                                    {{$question->question}}
                                </h1>
                                @foreach ($question->options as $key => $choice)
                                    <form action="#" method="POST">
                                        @csrf
                                        <input type="hidden" name="nextPageUrl" value="">
                                        <button type="submit" class="btn my-2 btn-primary btn-lg btn-block">{{$choice->options}}</button>
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