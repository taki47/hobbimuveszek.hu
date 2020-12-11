@extends('Layouts.Master')

@section('content')
<div class="container main-container">
    <form class="form-signin" id="lostPasswordGenerateForm" method="POST" action="{{ route('sendGenerateNewPassword',[$user->email, $user->confirm]) }}">
        @csrf
        <input type="hidden" name="siteKey" id="siteKey" value="{{ env("GCAPTCHA_SITE_KEY") }}">

        <h3 class="text-center">{{ __('auth.lostPassword.generate.title') }}</h3>

        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br />
                @endforeach
            </div>
        @endif
        
        <div class="form-group">
            <label for="inputEmail" class="sr-only">{{ __('auth.lostPassword.email') }}</label>
            <input type="email" name="email" id="inputEmail" class="form-control" disabled value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">{{ __('auth.lostPassword.generate.password') }}</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="{{ __('auth.lostPassword.generate.password') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="inputEmail" class="sr-only">{{ __('auth.lostPassword.generate.passwordRetry') }}</label>
            <input type="password" name="password_confirmation" id="inputPassword" class="form-control" placeholder="{{ __('auth.lostPassword.generate.passwordRetry') }}" required>
        </div>

        <button  class="btn btn-success text-white" type="button" id="lostPasswordGenerateButton">{{ __('auth.lostPassword.generate.submit') }}</button>
    </form>
</div>
@endsection