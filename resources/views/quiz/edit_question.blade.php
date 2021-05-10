@extends('layouts.app')

@section('content')
<div class="container">
    <form class="row g-3" action="{{route('edit_question',['id'=>$id,'id_question'=>$question->id])}}" method="POST">
        @csrf

        <div class="col-12">
          <label for="question" class="form-label">question</label>
          <input type="text" class="form-control" id="question" name="question" value="{{$question->question}}">
        </div>
        <div class="col-12">
            <label for="category" class="form-label">category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{$category}}">
        </div>
        @foreach ($question->option()->get() as $option)
        <div class="col-12">
            <label for="option" class="form-label">option</label>
            <input type="text" class="form-control" id="option" name="{{$option->id}}" value="{{$option->option}}">
            @if ($option->id==$question->answer)
                <i class="bi bi-check-square"></i>
            @endif
        </div>
        @endforeach
        <div class="col-12">
          <button type="submit" class="btn btn-primary">change</button>
        </div>
      </form>
</div>
@endsection