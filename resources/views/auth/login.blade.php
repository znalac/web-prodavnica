@section('title')
    Login
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            
                

                <div class="loginbox">
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                           

                            <div class="col-sm-8">
                                <label for="email">E-mail</label>
                                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                           

                            <div class="col-sm-8">
                                <label for="password">Password</label>
                                <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="off" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-sm-8">
                                <button type="submit" >
                                    {{ __('Login') }}
                                </button>
                                <br>
                                @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}">
                                         {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <br>
                                @if (Route::has('register'))
                                <a class="" href="{{ route('register') }}">
                                     Don't have an account?
                                </a>
                            @endif

                            </div>
                        </div>
                    </form>
                </div>
            
        </div>
    </div>
</div>
@endsection
