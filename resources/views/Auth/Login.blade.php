@extends('Layouts.Master')

@section('content')
<div class="container main-container">
    <form class="form-signin" id="loginForm" method="POST" action="{{ route('loginAttempt') }}">
        @csrf
        <input type="hidden" name="siteKey" id="siteKey" value="{{ env("GCAPTCHA_SITE_KEY") }}">

        <h2 class="text-center">{{ env("APP_NAME") }}</h2>
        <h3 class="text-center">{{ __('auth.login.title') }}</h3>

        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <div class="form-group">
            <label for="inputEmail" class="sr-only">{{ __('auth.login.email') }}</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="{{ __('auth.login.email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="inputPassword" class="sr-only">{{ __('auth.password') }}</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="{{ __('auth.login.password') }}" required>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="remember" value="1"> {{ __('auth.login.rememberme') }}
            </label>
        </div>

        <button  class="btn btn-success text-white" type="button" id="loginButton">{{ __('auth.login.title') }}</button>
        <a href="{{ route("lostPassword") }}" class="btn btn-info text-white">{{ __('auth.login.lostPassword') }}</a>
        <a href="{{ route('register') }}" class="btn btn-primary text-white">{{ __('auth.login.register') }}</a>
    </form>
</div>
@endsection