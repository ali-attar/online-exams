@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="row g-3" action="{{route('add_exam_class',$id)}}" method="POST">
            @csrf
            <div class="col-12">
              <label for="class_id" class="form-label">class id</label>
              <input type="text" class="form-control" id="class_id" name="class_id" >
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">set</button>
            </div>
        </form>
    </div>
@endsection