@extends('layouts.app')

@section('content')
    <form method="POST" class="form-signin" action="{{ route('password.email') }}">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">{{ __('Reset Password') }}</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-group row">
            <div class="col-md-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
    </form>
@endsection
