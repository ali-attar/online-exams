@extends('layouts.app')

@section('content')
<div class="conmtainer">
    <div class="row justify-content-center">
        <div class="col-8 ">
            <form action="{{route('add_option',['id'=>$id,'id_question'=>$id_question])}}" method="POST" >
                <div class="mb-3 col-6">
                    @csrf
                    <label for="option" class="form-label">option</label>
                    <input type="text" class="form-control" id="option" name="option">
                </div>
                                                                    
                <div class="mb-3 form-check col-3">
                    <input type="checkbox" class="form-check-input col-2" id="exampleCheck" name="check">
                    <label class="form-check-label col-10" for="exampleCheck">set to answer</label>
                </div>
                <button type="submit" class="btn btn-primary">add</button>
            </form>
        </div>
    </div>
</div>
@endsection