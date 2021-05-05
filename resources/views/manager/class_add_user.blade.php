@extends('layouts.app')
@section('content')
@if (in_array('admin' ,Auth::user()->permision()) or in_array('manager',Auth::user()->permision()))
<div class="container">
    <div class="row  justify-content-center">
        <div class="card col-6">
            <div class="card-body">
                <form action="{{route('class_add_user',$id)}}" method="POST">
                    @csrf
                    <h5 class="card-title">{{$name}} اضافه کردن فرد به کلاس</h5>
                    <div class="row mb-3">
                        <label for="code_melli" class="col-sm-2 col-form-label">کدملی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="code_melli" name="code_melli">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection