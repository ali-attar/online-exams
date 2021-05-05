@extends('layouts.docs')

@include('components.navbar')
@section('content')
@if (in_array('admin' ,Auth::user()->permision()) or in_array('manager',Auth::user()->permision()))
    <div class="container">
        <div class="row  justify-content-center">
            <div class="card col-6">
                <div class="card-body">
                    <form action="{{route('create_class')}}" method="POST">
                        @csrf
                        <h5 class="card-title">اضافه کردن کلاس</h5>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">نام کلاس</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="admin" class="col-sm-2 col-form-label">مدیر کلاس</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="admin" name="admin">
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