@extends('layouts.app')

@section('content')
<div class="container mb-auto">
    <div class="box">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <span class="text-center">Login</span>

            <div class="input-container">
                <input type="text" id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required/>
                <label for="email">{{ __('Email') }}</label>	
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror	
            </div>

            <div class="input-container">		
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required/>
                <label for="password">{{ __('Password') }}</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <button type="submit" class="btn btn-outline-light">{{ __('Login') }}</button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>	
    </div>
</div>
@endsection
