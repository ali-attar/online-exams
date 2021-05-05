@extends('layouts.app')

@section('content')
    @guest
        <p>fuck this world</p>
    @endguest
    
@endsection
@include('components.footer')