@extends('layouts.docs')

@include('components.navbar')
@section('content')
    @if (Auth::user()->name=='admin01')
        <div class="container">
            <div class="row  justify-content-center">
                <div class="card col-6">
                    <div class="card-body">
                    <form action="{{route('permision')}}" method="POST">
                        @csrf
                      <h5 class="card-title">اضافه کردن نقش</h5>
                      <div class="row mb-3">
                        <label for="permision_fa" class="col-sm-2 col-form-label">فارسی</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="permision_fa" name="permision_fa">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="permision_en" class="col-sm-2 col-form-label">انگلیسی</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="permision_en" name="permision_en">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">اضافه کردن</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="row  justify-content-center">
                <div class="col-6">
                    <p>:نقش ها</p>
                    @php
                        $a= DB::table('permisions')->get();
                    @endphp
                    @foreach ($a as $item)
                        <p>{{$item->id}}/{{$item->role_english}}/{{$item->role_persian}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection