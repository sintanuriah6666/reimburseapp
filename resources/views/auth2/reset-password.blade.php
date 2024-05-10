@extends('layouts.velzonlogin')

@section('title', 'Reset Password | ' . env('APP_NAME'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">

            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h5 class="text-primary">{{ __('Reset your password') }}</h5>
                    <p class="text-muted"></p>
                </div>
                <div class="p-2 mt-4">
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="mb-3">
                            <label class="form-label" for="password-input">{{ __('Password') }}</label>
                            <div class="position-relative auth-pass-inputgroup">
                                <input type="password" class="form-control pe-5 password-input" onpaste="return false"
                                    placeholder="Enter password" id="password-input" aria-describedby="passwordInput"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="" name="password">
                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                    type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                <div class="invalid-feedback">
                                    {{ __('Please enter a valid password') }}
                                </div>
                            </div>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="confirm_password">{{ __('Confirm Password') }}</label>
                            <div class="position-relative auth-pass-inputgroup">
                                <input type="password" class="form-control pe-5 confirm_password" onpaste="return false"
                                    placeholder="Confirm password" id="confirm_password"
                                    aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    required="" name="password_confirmation">
                                <button
                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                    type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                <div class="invalid-feedback">
                                    {{ __('Please enter a valid password') }}
                                </div>
                            </div>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                            <h5 class="fs-13">Password must contain:</h5>
                            <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                            <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                            <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                            <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-success w-100" type="submit">{{ __('Reset Password') }}</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>
@endsection

@section('scripts')
<!-- validation init -->
<script src="{{ asset('storage/default') }}/js/pages/form-validation.init.js"></script>
<!-- password create init -->
<script src="{{ asset('storage/default') }}/js/pages/passowrd-create.init.js"></script>
@endsection