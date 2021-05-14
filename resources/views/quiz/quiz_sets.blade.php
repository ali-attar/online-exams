@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('create_quiz')}}" class="btn btn-success">new quiz with question pdf</a>
        <a href="{{route('create_quiz')}}" class="btn btn-primary">new quiz</a>
        @foreach ($quizs as $quiz)
        <div class="card" style="width: 28rem;">
            <div class="card-body">
                <h4 class="card-title">{{$quiz->name}}</h4>
                @if (in_array('admin',Auth::user()->permision()))
                    <h5>{{$quiz->admin_name()}}</h5>
                @endif
                <h6 class="card-subtitle mb-2 text-muted">{{$quiz->date}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">{{$quiz->start_time}} to {{$quiz->end_time}}</h6>
                <a href="{{route('question_view',$quiz->id)}}" class="card-link btn btn-success m-0">questions</a>
                <a href="{{route('edit_exam_view',$quiz->id)}}" class="card-link btn btn-primary m-0">edit</a>
                <a href="{{route('del_exam',$quiz->id)}}" class="card-link btn btn-danger m-0">delete</a>
                <a href="{{route('exam_class',$quiz->id)}}" class="card-link btn btn-warning m-0">users</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection