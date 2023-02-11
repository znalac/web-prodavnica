
@section('title')
    Register
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 ">
          
                
                
                <div class="loginbox ">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            

                            <div class="col-sm-8">
                                <label for="name">Name</label>
                                <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name"  value="{{ old('name') }}"  required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                           
                            <div class="col-sm-8">
                                <label for="email">E-mail</label>
                                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                           

                            <div class="col-sm-8">
                                <label for="email">password</label>
                                <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            

                            <div class="col-sm-8">
                                <label for="confirm-password">  Confirm password</label>
                                <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password" >
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-sm-8">
                                <button type="submit" >
                                    {{ __('Register') }}
                                </button>
                                <br>
                                @if (Route::has('login'))
                                <a  href="{{ route('login') }}">
                                    Already have an account?
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
