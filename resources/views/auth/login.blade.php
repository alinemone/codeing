@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center h-100vh">
        <div class="col-md-6 text-right">
                <h2>به بخش ورود {{config('app.name')}} خوش آمدید</h2>
                <p class="d-flex flex-column text-dark">با ورود به  {{config('app.name')}}  شما می توانید به دنیای از فایل های دیجیتال دسترسی داشته باشید و اقدام به خرید و فروش کنید.</p>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-white text-center">{{ __('fa.Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-right">{{ __('fa.E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback text-right" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-right">{{ __('fa.Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback text-right" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8 text-right">
                                <div class="form-check pr-2">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label mr-4" for="remember">
                                        {{ __('fa.Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 pr-0">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-ok w-100 text-right" href="{{ route('password.request') }}">
                                        {{ __('fa.Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-ok w-100">
                                    {{ __('fa.Login') }}
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
