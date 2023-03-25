@extends('layouts.auth')
@section('title')
    Login
@endsection
@section('content')
    <h4 class="mb-4 text-muted">{{ __('Login') }} to your account</h4>
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="mb-3 text-start">
            <label for="username" class="form-label">{{ __('Email adress') }}</label>
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus />
            @error('username')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="mb-3 text-start">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="mb-3 text-start">
            <div class="form-check">
                <input class="form-check-input" name="remember" type="checkbox" value="" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                <label class="form-check-label" for="check1">
                    Remember me on this device
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary shadow-2 mb-4">{{ __('Login') }}</button>
    </form>

    @if (Route::has('password.request'))
        <p class="mb-2 text-muted">{{ __('Forgot Your Password?') }}? <a href="{{ route('password.request') }}">Reset</a></p>
    @endif
    <p class="mb-0 text-muted">Don't have account yet? <a href="{{ route('register') }}">Signup</a></p>

@endsection
