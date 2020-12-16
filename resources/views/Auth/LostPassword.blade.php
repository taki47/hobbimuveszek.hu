@extends('Layouts.Master')

@section('content')
<div class="container main-container">
    <form class="form-signin" id="form" method="POST" action="{{ route('sendLostPassword') }}">
        @csrf

        <h3 class="text-center">{{ __('auth.lostPassword.title') }}</h3>

        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        
        <p>{{ __('auth.lostPassword.description') }}</p>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">{{ __('auth.lostPassword.email') }}</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="{{ __('auth.lostPassword.email') }}" required autofocus value="{{ old("email") }}">
        </div>

        <input type="hidden" name="gRecaptchaResponse" id="gRecaptchaResponse" value="">

        <button class="btn btn-success text-white g-recaptcha" type="submit" data-sitekey="{{ env("GCAPTCHA_SITE_KEY") }}" data-callback="sendForm">{{ __('auth.lostPassword.submit') }}</button>
    </form>
</div>
@endsection