@extends('layouts.docs')

@include('components.navbar')
@section('content')
    @if (in_array('manager',Auth::user()->permision()) and  !in_array('admin',Auth::user()->permision()) )
        <a class="btn btn-dark" href="{{route('create_class_view')}}">کلاس جدید</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام کلاس</th>
                    <th scope="col">تعداد شاگردان</th>
                    <th scope="col">اضافه کردن</th>
                    <th scope="col">حذف</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=0;
                @endphp
                @isset($class)
                    @foreach ($class as $a)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$a->name}}</td>
                            <td>
                                @php
                                    $j=0;
                                @endphp
                                @foreach (DB::table('class_users')->where('class_id',$a->id)->get() as $item)
                                    @php
                                        $j=$j+1;
                                    @endphp
                                @endforeach
                                {{$j}}
                            </td>
                            <td><a href="{{route('page_change_user',$a->id)}}" class="btn">تغییر</a></td>
                            <td><a href="{{route('delete_user',$a->id)}}" class="btn">حذف</a></td>
                        </tr>
                    @endforeach
                @endisset
               
            </tbody>
          </table>
        
    @endif

    @if (in_array('admin',Auth::user()->permision()))
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام ادمین</th>
                    <th scope="col">نام کلاس</th>
                    <th scope="col">تعداد شاگردان</th>
                    <th scope="col">اضافه کردن</th>
                    <th scope="col">حذف</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=0;
                @endphp
                @isset($class)
                    @foreach ($class as $a)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{DB::table('users')->find($a->admin_id)->name}}</td>
                            <td>{{$a->name}}</td>
                            <td>
                                @php
                                    $j=0;
                                @endphp
                                @foreach (DB::table('classUser')->where('class_id',$a->id) as $item)
                                    @php
                                        $j=$j+1;
                                    @endphp
                                @endforeach
                                {{$j}}
                            </td>
                            <td><a href="{{route('page_change_user',$a->id)}}" class="btn">تغییر</a></td>
                            <td><a href="{{route('delete_user',$a->id)}}" class="btn">حذف</a></td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>

    @else

    
    @endif
@endsection