@extends('layouts.app')

@section('content')
@php
    $permisions=array();
    $b=Auth::user()->permisionUser;
    foreach ($b as $index) {
        array_push($permisions,$index->permision->role_english);
    }
    //dd(in_array('addmin',$permisions));
@endphp
    @php
        $id=intval($id);
    @endphp
    @if (in_array('admin',$permisions) )
        @php
            $users=DB::table('users')->find($id);
        @endphp
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">{{ __('تغییر') }}</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('change_user',$id) }}">
                                @csrf
                                <div class="form-group row m-4">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('نام و نام خانوادگی:') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$users->name}}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row m-4">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('شماره موبایل:') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="phone_number" type="text" class="form-control @error('name') is-invalid @enderror" name="phone_number" value="{{$users->phone_number}}" required autocomplete="phone_number" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row m-4">
                                    <label for="code_melli" class="col-md-4 col-form-label text-md-right">{{ __('کد ملی:') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="code_melli" type="text" class="form-control @error('name') is-invalid @enderror" name="code_melli" value="{{$users->code_melli}}" required autocomplete="code_melli" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row m-4">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ایمیل:') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$users->email}}" required autocomplete="email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                        
                                @php
                                    $b= DB::table('permision_users')->where('user_id',$id)->get();
                                @endphp
                                @foreach ($b as $item)
                                    @php
                                        $permision_item= DB::table('permisions')->find($item->permision_id);
                                    @endphp
                                    <p>{{$permision_item->role_persian}} :<a class="btn" href="{{route('deletePermisionUser',['id'=>$id,'per'=>$item->id])}}"> حذف</a></p>
                                @endforeach

                                <div class="form-group row m-4">
                                    <label for="permision" class="col-md-4 col-form-label text-md-right">{{ __('نقش:') }}</label>
        
                                    <div class="col-md-6">
                                        <select class="form-select" name="permision" id="permision" >
                                            <option selected value="nothing">......</option>
                                            @php
                                                $a= DB::table('permisions')->get();
                                            @endphp
                                            @foreach ($a as $item)
                                                <option value="{{$item->role_english}}">{{$item->role_persian}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('تغییر') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection