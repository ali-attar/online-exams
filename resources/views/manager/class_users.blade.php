@extends('layouts.app')

@section('content')
    @if (in_array('manager',Auth::user()->permision()))

        @php
            $i=1;
        @endphp
        <a href="{{route('class_add_user_view',$id)}}" class="btn btn-danger">اضافه کردن عضو جدید</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام</th>
                    <th scope="col">شماره موبایل</th>
                    <th scope="col">کد ملی</th>
                    <th scope="col">ایمیل</th>
                    <th scope="col">حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $a)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$a->name}}</td>
                        <td>{{$a->phone_number}}</td>
                        <td>{{$a->code_melli}}</td>
                        <td>{{$a->email}}</td>
                        <td><a href="{{route('delete_user_class',['id'=>$id,'user'=>$a->id])}}" class="btn">حذف</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection