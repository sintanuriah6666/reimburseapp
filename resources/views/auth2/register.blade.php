@extends('layouts.velzonlogin')

@section('title', 'Register | ' . env('APP_NAME'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4">

            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h5 class="text-primary">Create New Account</h5>
                    <p class="text-muted">Get your free velzon account now</p>
                </div>
                <div class="p-2 mt-4">
                    <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="" data-bitwarden-watching="1">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username" placeholder="Enter name" required name="name" value="{{ old('name') }}">
                            <div class="invalid-feedback">
                                Please enter a Name
                            </div>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="useremail" class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="useremail" placeholder="Enter email address" name="email"
                                required value="{{ old('email') }}">
                            <div class="invalid-feedback">
                                Please enter a valid email
                            </div>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="password-input">{{ __('Password') }}</label>
                            <div class="position-relative auth-pass-inputgroup">
                                <input type="password" class="form-control pe-5 password-input" onpaste="return false"
                                    placeholder="Enter password" id="password-input" aria-describedby="passwordInput"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="" name="password">
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

                        <div class="mb-3">
                            <label class="form-label" for="confirm_password">{{ __('Confirm Password') }}</label>
                            <div class="position-relative auth-pass-inputgroup">
                                <input type="password" class="form-control pe-5 confirm_password" onpaste="return false"
                                    placeholder="Confirm password" id="confirm_password" aria-describedby="passwordInput"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="" name="password_confirmation">
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

                        <div class="mb-4">
                            <p class="mb-0 fs-12 text-muted fst-italic">{{ __('By registering you agree to ' . env('APP_NAME') . ' ') }}<a
                                    href="#" class="text-primary text-decoration-underline fst-normal fw-medium">{{ __('Terms and conditions') }}</a></p>
                        </div>

                        <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                            <h5 class="fs-13">Password must contain:</h5>
                            <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                            <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                            <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                            <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-success w-100" type="submit">{{ __('Sign Up') }}</button>
                        </div>

                        <div class="mt-4 text-center">
                            <div class="signin-other-title">
                                <h5 class="fs-13 mb-4 title text-muted">{{ __('Create account with')}}</h5>
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
            <p class="mb-0">{{ __('Already have an account?') }} <a href="{{ route('login') }}"
            class="fw-semibold text-primary text-decoration-underline"> {{ __('Signin') }} </a> </p>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<!-- validation init -->
<script src="{{ asset('storage/default') }}/js/pages/form-validation.init.js"></script>
<!-- password create init -->
<script src="{{ asset('storage/default') }}/js/pages/passowrd-create.init.js"></script>
@endsection