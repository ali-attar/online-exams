@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="row g-3" action="{{route('question_set',$id)}}" method="POST">
            @csrf
            <div class="col-12">
              <label for="question" class="form-label">question</label>
              <input type="text" class="form-control" id="question" name="question" >
            </div>
            <div class="col-12">
                <label for="category" class="form-label">category</label>
                <input type="text" class="form-control" id="category" name="category" >
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">set</button>
            </div>
          </form>
    </div>
@endsection