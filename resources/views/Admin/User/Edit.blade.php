@extends('Layouts.Admin')

@section('content')
<div class="row">
    <div class="col-12 ">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>{{ $user->name }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-signin" method="POST" action="{{ route('adminUserUpdate', $user->id) }}">
                    @csrf
            
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif
            
                    <div class="form-group">
                        <label for="inputName">* {{ __('admin.users.edit.nameFieldLabel') }}</label>
                        <input type="text" id="inputName" name="name" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" placeholder="{{ __('admin.users.edit.nameFieldPlaceholder') }}" required autofocus value="{{ old() ? old('name') : $user->name }}">
                    </div>
            
                    <div class="form-group">
                        <label for="inputEmail">* {{ __('admin.users.edit.emailFieldLabel') }}</label>
                        <input type="email" id="inputEmail" name="email" class="form-control {{ $errors->has("email") ? "is-invalid" : "" }}" placeholder="{{ __('admin.users.edit.emailFieldPlaceholder') }}" required value="{{ old() ? old('email') : $user->email }}">
                    </div>
            
                    <div class="form-group">
                        <label for="inputPassword">{{ __('admin.users.edit.passwordFieldLabel') }}</label>
                        <input type="password" id="inputPassword" name="password" class="form-control {{ $errors->has("password") ? "is-invalid" : "" }}" placeholder="{{ __('admin.users.edit.passwordFieldPlaceholder') }}">
                        <small id="passwordHelp" class="form-text text-muted">{{ __('admin.users.edit.passwordFieldHelp') }}</small>
                    </div>
            
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="inputAddress">* {{ __('admin.users.edit.address1FieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("address1") ? "is-invalid" : "" }}" name="address" id="inputAddress" placeholder="{{ __('admin.users.edit.address1FieldPlaceholder') }}" value="{{ old() ? old('address') : $user->address }}">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="inputAddress2">{{ __('admin.users.edit.address2FieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("address2") ? "is-invalid" : "" }}" name="address2" id="inputAddress2" placeholder="{{ __('admin.users.edit.address2FieldPlaceholder') }}" value="{{ old() ? old('address2') : $user->address2 }}">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="inputCity">* {{ __('admin.users.edit.cityFieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("city") ? "is-invalid" : "" }}" name="city" id="inputCity" placeholder="{{ __('admin.users.edit.cityFieldPlaceholder') }}" value="{{ old() ? old('city') : $user->city }}">
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label for="inputState">* {{ __('admin.users.edit.stateFieldLabel') }}</label>
                            <select id="inputState" name="state" class="form-control {{ $errors->has("state") ? "is-invalid" : "" }}">
                                <option>{{ __('admin.users.edit.stateFieldPlaceholder') }}</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}" {{ (!old() && $user->province_id==$province->id) || (old() && old("state")==$province->id) ? "selected" : "" }}>{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label for="inputZip">* {{ __('admin.users.edit.zipFieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("zip") ? "is-invalid" : "" }}" id="inputZip" name="zip" placeholder="{{ __('admin.users.edit.zipFieldPlaceholder') }}" value="{{ old() ? old('zip') : $user->postcode }}">
                        </div>
                    </div>
            
                    <button class="btn btn-success text-white" type="submit">{{ __('admin.users.edit.submitButton') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
