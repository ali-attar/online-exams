@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">{{$name}}</h2>
        <form action="{{route('exams_submit',$id)}}" method="POST">
            @csrf
            @php
                $i=1;
            @endphp
            @foreach ($questions as $question)
                <div>
                    <div>
                        {{$i++}}) {{$question->question}}
                    </div>
                    <fieldset class="row mb-3">
                        <div class="col-sm-12">
                            @php
                                $j=1;
                            @endphp
                            @foreach ($question->option as $option)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="{{$question->id}}" value="{{$option->id}}" >
                                    <label class="form-check-label" for="{{$question->id}}">
                                        {{$j++}}- {{$option->option}}
                                    </label>
                                </div>
                            @endforeach
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{$question->id}}" id="{{$question->id}}" value="0" checked>
                                <label class="form-check-label" for="{{$question->id}}">
                                    none
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            @endforeach
            <div class="col-12">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
        </form>    
    </div>
@endsection