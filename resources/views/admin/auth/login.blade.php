@extends('layouts.admin-auth')
@section('title')
    Login
@endsection
@section('content')
    <h4>Administratior Login</h4>
    <form action="{{ route('admin-login.post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        {{-- <div class="checkbox">
            <label>
                <input type="checkbox"> Remember Me
            </label>
            <label class="pull-right">
                <a href="#">Forgotten Password?</a>
            </label>

        </div> --}}
        <button type="submit" class="btn btn-primary btn-flat m-b-10 m-t-10">Sign in</button>
        {{--<div class="register-link m-t-10 text-center">
            <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
        </div>--}}
    </form>

@endsection
