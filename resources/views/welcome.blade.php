@extends('layouts.app')

@section('content')
    @guest
        <p>fuck this world</p>
    @endguest
    <p>{{\Morilog\Jalali\Jalalian::forge('today')->format('%A, %d %B %Y')}}</p>
    <p>hqahha</p>
@endsection