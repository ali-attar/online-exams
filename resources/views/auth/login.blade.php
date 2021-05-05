@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">ورود</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row m-4">
                            <label for="code_melli" class="col-md-4 col-form-label text-md-right">کد ملی:</label>

                            <div class="col-md-6">
                                <input id="code_melli" type="text" class="form-control " name="code_melli" value="{{ old('code_melli') }}" required autocomplete="code_melli" autofocus>
                            </div>
                        </div>

                        <div class="form-group row m-4">
                            <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    ورود
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        فراموشی رمز عبور
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
