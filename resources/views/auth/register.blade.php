@extends('layouts.auth')
@section('title')
    Sign up
@endsection
@section('content')
    <h6 class="mb-4 text-muted">Create new account</h6>
    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <div class="mb-3 text-start">
            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />

            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="mb-3 text-start">
            <label for="username" class="form-label">Username</label>
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" />

            @error('username')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>



        <div class="mb-3 text-start">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="mb-3 text-start">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="mb-3 text-start">
            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="password-confirm" />
        </div>

        <div class="mb-3 text-start">
            <div class="form-check">
                <input class="form-check-input" name="confirm" type="checkbox" value="" id="confirm">
                <label class="form-check-label" for="confirm">
                    I agree to the <a href="#" tabindex="-1">terms and policy</a>.
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary shadow-2 mb-4">{{ __('Register') }}</button>
    </form>
    <p class="mb-0 text-muted">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
@endsection
