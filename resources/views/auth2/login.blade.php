@extends('layouts.velzonlogin')

@section('title', 'Sign in | ' . env('APP_NAME'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">
            <div class="card-body p-4">
                <div class="text-center">
                    <img src="{{ asset('storage/default/images/reimburs-logo.png') }}" alt="Logo" height="150">
                </div>
                <div class="text-center mt-2">
                    <h5 class="text-primary">Welcome Back !</h5>
                    <p class="text-muted">Sign in to continue.</p>
                </div>
                <div class="text-left mt-2">
                @include('layouts.notif')
                </div>
                <div class="p-2 mt-4">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nip" class="form-label">{{ __('NIP') }}</label>
                            <input type="text" class="form-control" name="nip" id="nip" placeholder="Enter NIP" required>
                            @error('nip')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            @if (Route::has('password.request'))
                            <div class="float-end">
                                <a href="{{ route('password.request') }}" class="text-muted">{{ __('Forgot your password?') }}</a>
                            </div>
                            @endif
                            <label class="form-label" for="password-input">{{ __('Password') }}</label>
                            <div class="position-relative auth-pass-inputgroup mb-3">
                                <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" name="password" required autocomplete="current-password"
                                id="password-input">
                                <button
                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                            </div>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check" name="remember">
                            <label class="form-check-label" for="auth-remember-check">{{ __('Remember me') }}</label>
                        </div>
                        
                        <div class="mt-4">
                            <button class="btn btn-success w-100" type="submit">{{ __('Sign In') }}</button>
                        </div>
                        
                        <div class="mt-4 text-center">
                            <div class="signin-other-title">
                                <h5 class="fs-13 mb-4 title">{{ __('Sign In with') }}</h5>
                            </div>
                            <div>
                                <a href="#" class="btn btn-outline-danger waves-effect waves-light">
                                    <i class="ri-google-fill fs-16"></i>
                                    Login with Google
                                </a>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
        
        <div class="mt-4 text-center">
            <p class="mb-0">{{ __("Don't have an account ?") }} <a href=""
                class="fw-semibold text-primary text-decoration-underline"> {{ __('Signup') }} </a> </p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- password-addon init -->
<script src="{{ asset('storage/default') }}/js/pages/password-addon.init.js"></script>
@endsection