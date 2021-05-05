@extends('layouts.docs')

@include('components.navbar')
@section('content')
    @guest
        <p>fuck this world</p>
    @endguest
    
@endsection
@include('components.footer')