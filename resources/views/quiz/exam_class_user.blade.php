@extends('layouts.app')

@section('content')
    @if (in_array('manager',Auth::user()->permision()) or in_array('admin',Auth::user()->permision()) )

        @php
            $i=1;
        @endphp
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام</th>
                    <th scope="col">شماره موبایل</th>
                    <th scope="col">کد ملی</th>
                    <th scope="col">ایمیل</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection