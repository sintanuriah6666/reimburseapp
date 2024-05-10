@extends('layouts.velzonlogin')

@section('title', 'Verify Email | ' . env('APP_NAME'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">

            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h5 class="text-primary">{{ __('Verify Your Email') }}</h5>
                    <p class="text-muted"></p>
                </div>
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we
                    just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                
                        <div>
                            <button class="btn btn-primary btn-block">{{ __('Resend Verification Email') }}</button>
                        </div>
                    </form>
                
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                
                        <button type="submit"
                            class="btn btn-secondary btn-block">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection