@extends('Layouts.Master')

@section('content')
<div class="container main-container">
    <form class="form-signin" method="POST" action="{{ route('sendRegister') }}">
        @csrf

        <h1 class="text-center">{{ env("APP_NAME") }}</h1>
        <h2 class="text-center">{{ __('auth.register.title') }}</h2>

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
            <input type="password" id="inputPassword" name="password" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}" placeholder="{{ __('auth.register.passwordFieldPlaceholder') }}" required>
        </div>

        <div class="form-group">
            <label for="inputPasswordRetry">* {{ __('auth.register.passwordRetryFieldLabel') }}</label>
            <input type="password" id="inputPasswordRetry" name="password_confirmation" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}" placeholder="{{ __('auth.register.passwordRetryFieldPlaceholder') }}" required>
        </div>

        <div class="form-row">
            <div class="form-group col-12 col-md-6">
                <label for="inputAddress">* {{ __('auth.register.address1FieldLabel') }}</label>
                <input type="text" class="form-control {{ $errors->has("address1") ? "is-invalid" : "" }}" name="address1" id="inputAddress" placeholder="{{ __('auth.register.address1FieldPlaceholder') }}" value="{{ old('address1') }}">
            </div>
            <div class="form-group col-12 col-md-6">
                <label for="inputAddress2">{{ __('auth.register.address2FieldLabel') }}</label>
                <input type="text" class="form-control {{ $errors->has("address2") ? "is-invalid" : "" }}" name="address2" id="inputAddress2" placeholder="{{ __('auth.register.address2FieldPlaceholder') }}" value="{{ old('address2') }}">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-12 col-md-6">
                <label for="inputCity">* {{ __('auth.register.cityFieldLabel') }}</label>
                <input type="text" class="form-control {{ $errors->has("city") ? "is-invalid" : "" }}" name="city" id="inputCity" placeholder="{{ __('auth.register.cityFieldPlaceholder') }}" value="{{ old('city') }}">
            </div>
            <div class="form-group col-12 col-md-3">
                <label for="inputState">* {{ __('auth.register.stateFieldLabel') }}</label>
                <select id="inputState" name="state" class="form-control {{ $errors->has("state") ? "is-invalid" : "" }}">
                    <option>{{ __('auth.register.stateFieldPlaceholder') }}</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}" {{ old("state") && old("state")==$province->id ? "selected" : "" }}>{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 col-md-3">
                <label for="inputZip">* {{ __('auth.register.zipFieldLabel') }}</label>
                <input type="text" class="form-control {{ $errors->has("zip") ? "is-invalid" : "" }}" id="inputZip" name="zip" placeholder="{{ __('auth.register.zipFieldPlaceholder') }}" value="{{ old('zip') }}">
            </div>
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
