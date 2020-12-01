@extends('layouts.app')

@section('content')
        <form method="POST" class="form-signin" action="{{ route('password.update') }}">
            @csrf

            <h1 class="h3 mb-3 font-weight-normal">{{ __('Reset Password') }}</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="email" type="email" placeholder="email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input id="password-confirm" type="password" placeholder="confirm password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Reset Password') }}</button>
        </form>
@endsection
