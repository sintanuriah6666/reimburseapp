@extends('layouts.velzonlogin')

@section('title', 'Confirm Password | ' . env('APP_NAME'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">

            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h5 class="text-primary">{{ __('Confirm Password') }}</h5>
                    <p class="text-muted"></p>
                </div>
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </div>
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                
                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label" for="password-input">{{ __('Password') }}</label>
                        <div class="position-relative auth-pass-inputgroup mb-3">
                            <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" name="password"
                                required autocomplete="current-password" id="password-input">
                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                        </div>
                    </div>
                
                    <div class="flex justify-end mt-4">
                        <button class="btn btn-success w-100" type="submit">{{ __('Confirm') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- password-addon init -->
<script src="{{ asset('storage/default') }}/js/pages/password-addon.init.js"></script>
@endsection