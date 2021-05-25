@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-10 mx-auto">
           <div class="card">
               <div class="card-body">
                    <h4 class="card-title">
                        {{$lesson->category->title}}
                    </h4>
                    <p class="card-text">
                         {{$lesson->category->description}}   
                    </p>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Status</th>
                                <th>Question</th>
                                <th>Your Answer</th>
                                <th>Correct Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                                @foreach ($answers as $option)
                                    <tr>
                                        <td>
                                        @if ($option->ur_answer == $option->option->question->correctAnswer->options)
                                                <p class="text-success">Correct</p>
                                        @else
                                            <p class="text-danger">Wrong </p>
                                        @endif
                                        </td>
                                        <td>
                                            {{$option->option->question->question}}
                                        </td>
                                        <td>
                                            {{$option->ur_answer}}
                                        </td>
                                        <td>
                                            {{$option->option->question->correctAnswer->options}}
                                        </td>
                                    </tr> 
                                @endforeach
                        </tbody>
                    </table>
               </div>
           </div>
       </div>
   </div>
    
</div>
@endsection
