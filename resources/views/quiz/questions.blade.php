@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('question_set_view',$id)}}" class="btn btn-primary">addQuestion</a>
        @isset($questions)
            @foreach ($questions as $key=>$name_category)
                <h3>{{$key}}</h3>
                <ul>
                    @foreach ($name_category as $question)
                    <li>
                        <p >{{$question->question}} <a href="{{route('del_question',['id'=>$id,'id_question'=>$question->id])}}" class="btn btn-outline-danger">del</a> 
                            <a href="{{route('edit_question_view',['id'=>$id,'id_question'=>$question->id])}}"> edit</a>
                        </p>
                        <ul>
                            @foreach ($question->option()->get() as $option)
                                <li>
                                    @if ($question->answer==$option->id)
                                        <p class="btn btn-success">answer</p> {{$option->option}}
                                    @else
                                        {{$option->option}}
                                    @endif
                                    <a href="{{route('del_option',['id'=>$id,'id_option'=>$option->id])}}" class="btn btn-danger">del</a>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{route('add_option_view',['id'=>$id,'id_question'=>$question->id])}}" class="btn btn-primary">add option</a>
                    </li>
                    @endforeach
                </ul>
            @endforeach
        @endisset
    </div>
@endsection