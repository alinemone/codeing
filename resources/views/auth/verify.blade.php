@extends('layouts.app')

@section('content')
<div class="container h-100vh">
    <div class="row justify-content-center text-right">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('fa.Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('fa.A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('fa.Before proceeding, please check your email for a verification link.') }}
                    {{ __('fa.If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-ok btn-sm align-baseline mt-2">{{ __('fa.click here to request another') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
