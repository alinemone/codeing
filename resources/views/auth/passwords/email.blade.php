@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center h-100vh ">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('fa.Reset Password') }}</div>

                <div class="text-center p-md-3 p-3">
                    <p>ایمیل خود را وارد کنید. رمز عبور برای شما ایمیل خواهد شد.</p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('fa.E-Mail Address') }}</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-ok">
                                    {{ __('fa.Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
