@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">{{$name}}</h2>
        <form action="">
            @foreach ($questions as $question)
                <div>
                    <div>
                        {{$question->question}}
                    </div>
                    <fieldset class="row mb-3">
                        <div class="col-sm-10">
                            @foreach ($question->option as $option)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        {{$option->option}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>
                </div>
            @endforeach
        </form>    
    </div>
@endsection