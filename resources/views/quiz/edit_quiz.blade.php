@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <form class="row g-3" method="post" action="{{route('edit_exam',$id)}}">
                @csrf
                <div class="col-md-12">
                    <label for="name" class="form-label">نام آزمون</label>
                    <input type="text" class="form-control" name="name" id="name" disabled value="{{$quiz->name}}">
                </div>
                <div class="col-md-4">
                    <label for="date" class="form-label">روز</label>
                    <input type="date" class="form-control" name="date" id="date" value="{{$quiz->date}}">
                </div>
                <div class="col-md-4">
                    <label for="start_time" class="form-label">ساعت شروع</label>
                    <input type="time" class="form-control" id="start_time" name="start_time" value="{{$quiz->start_time}}">
                </div>
                <div class="col-md-4">
                    <label for="end_time" class="form-label">ساعت پایان</label>
                <input type="time" class="form-control" id="end_time" name="end_time" value="{{$quiz->end_time}}">
                </div>
                <div class="col-12">
                    <div class="form-check float-end" dir="ltr" >
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">ساخت</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection