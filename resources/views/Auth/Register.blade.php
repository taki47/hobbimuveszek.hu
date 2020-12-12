@extends('Layouts.Master')

@section('content')
<div class="container main-container">
    <form class="form-signin" method="POST" action="{{ route('sendRegister') }}">
        @csrf

        <h1 class="text-center">{{ env("APP_NAME") }}</h1>
        <h2 class="text-center">{{ __('auth.register.title') }}</h2>

        <p class="text-center">
            {!! __('auth.register.description') !!}
        </p>

        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            {{ $error }}<br />
            @endforeach
        </div>
        @endif

        <div class="form-group">
            <label for="inputName">* {{ __('auth.register.nameFieldLabel') }}</label>
            <input type="text" id="inputName" name="name" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" placeholder="{{ __('auth.register.nameFieldPlaceholder') }}" required autofocus value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="inputEmail">* {{ __('auth.register.emailFieldLabel') }}</label>
            <input type="email" id="inputEmail" name="email" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}" placeholder="{{ __('auth.register.emailFieldPlaceholder') }}" required value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="inputPassword">* {{ __('auth.register.passwordFieldLabel') }}</label>
            <small id="passwordHelp" class="form-text text-muted d-inline">{{ __('auth.register.passwordHelp') }}</small><br />
            <input type="password" id="inputPassword" name="password" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}" placeholder="{{ __('auth.register.passwordFieldPlaceholder') }}" required>
        </div>

        <div class="form-group">
            <label for="inputPasswordRetry">* {{ __('auth.register.passwordRetryFieldLabel') }}</label>
            <input type="password" id="inputPasswordRetry" name="password_confirmation" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}" placeholder="{{ __('auth.register.passwordRetryFieldPlaceholder') }}" required>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input {{ $errors->has("term") ? "is-invalid" : "" }}" type="checkbox" value="1" name="term" id="inputTerm" required>
                <label class="form-check-label" for="inputTerm">
                    {!! __('auth.register.term') !!}
                </label>
                <div class="invalid-feedback">
                    {{ __('auth.register.validation.term') }}
                </div>
            </div>
        </div>
        
        <button class="btn btn-success text-white" type="submit">{{ __('auth.register.submitButton') }}</button>
    </form>
</div>
@endsection
