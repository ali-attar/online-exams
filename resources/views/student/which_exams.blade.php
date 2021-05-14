@extends('layouts.app')

@section('content')
    @php
        $time=Carbon\Carbon::now()->setTimezone('Asia/Tehran')->isoFormat('HH:mm');
    @endphp
    <div class="container">
        @foreach ($quizs as $quiz)
        <div class="card" style="width: 28rem;">
            <div class="card-body">
                <h4 class="card-title">{{$quiz->name}}</h4>
                <h6 class="card-subtitle mb-2 text-muted">{{$quiz->date}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">{{$quiz->start_time}} to {{$quiz->end_time}}</h6>
                <a href="{{route('exams_view',$quiz->id)}}" class="card-link btn btn-danger m-0">start</a>
                @if ($time>=$quiz->start_time and $time<=$quiz->end_time)
                    <a href="{{route('exams_view',$quiz->id)}}" class="card-link btn btn-danger m-0">start</a>
                @else
                    <a href="" class="card-link btn btn-outline-danger m-0" >start</a>
                @endif
                <a href="{{route('exams_result',$quiz->id)}}" class="card-link btn btn-primary m-0">natije</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection

