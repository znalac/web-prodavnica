@section('title')
    Get reset link
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
           

                <div class="loginbox">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                           

                            <div class="col-sm-8">
                                <label for="email" >{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-sm-8">
                                <button type="submit" >
                                    {{ __('Get  reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
           
        </div>
    </div>
</div>
@endsection
