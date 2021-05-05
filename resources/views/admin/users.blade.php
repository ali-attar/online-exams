@extends('layouts.docs')

@include('components.navbar')
@section('content')
    @if (in_array('admin',Auth::user()->permision()))
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
                    <th scope="col">نقش ها</th>
                    <th scope="col">ویرایش</th>
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
                        <td>
                            @php
                                $b= DB::table('permision_users')->where('user_id',$a->id)->get();
                            @endphp
                            @foreach ($b as $item)
                                @php
                                    $permision_item= DB::table('permisions')->find($item->permision_id);
                                @endphp
                                <p>{{$permision_item->role_persian}}</p>
                            @endforeach
                        </td>
                        <td><a href="{{route('page_change_user',$a->id)}}" class="btn">تغییر</a></td>
                        <td><a href="{{route('delete_user',$a->id)}}" class="btn">حذف</a></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        
    @endif
@endsection