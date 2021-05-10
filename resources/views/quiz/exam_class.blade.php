@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">this exam classes</h3>
        @if (in_array('admin',Auth::user()->permision()) or in_array('manager',Auth::user()->permision()))
        <a class="btn btn-dark" href="{{route('add_exam_class',$id)}}">اضافه کردن کلاس</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام ادمین</th>
                    <th scope="col">نام کلاس</th>
                    <th scope="col">ایدی کلاس</th>
                    <th scope="col">تعداد شاگردان</th>
                    <th scope="col">شاگردان</th>
                    <th scope="col">حذف</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @isset($class)
                    @foreach ($class as $a)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{DB::table('users')->find($a->admin_id)->name}}</td>
                            <td>{{$a->name}}</td>
                            <td>{{$a->id}}</td>
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
                            <td><a href="{{route('exam_class_users',['id'=>$id,'class_id'=>$a->id])}}" class="btn">شاگردان</a></td>
                            <td><a href="{{route('exam_class_del',['id'=>$id,'class_id'=>$a->id])}}" class="btn">حذف</a></td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    @endif
    </div>
@endsection