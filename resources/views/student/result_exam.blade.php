@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">question_number</th>
                <th scope="col">my answer</th>
                <th scope="col">ttrue answer</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($answers as $item)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$item[0]}}</td>
                    <td>{{$item[1]}}</td>
                    <td>{{$item[2]}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection