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
                <form class="form-signin" enctype="multipart/form-data" method="POST" action="{{ route('adminUserUpdate', $user->id) }}">
                    @csrf
            
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif

                    <div class="form-row">
                        <div class="col-12 col-md-6">
                            <label for="inputStatus">* {{ __('admin.users.edit.statusFieldLabel') }}</label>
                            <select name="status" class="form-control" id="inputStatus">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}" {{ $user->user_status_id==$status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="inputRole">* {{ __('admin.users.edit.roleFieldLabel') }}</label>
                            <select name="role" class="form-control" id="inputRole">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->user_role_id==$role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            
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
            
                    <div class="form-group">
                        <label for="inputPhone">{{ __('admin.users.edit.phoneFieldLabel') }}</label>
                        <input type="text" id="inputPhone" name="phone" class="form-control {{ $errors->has("phone") ? "is-invalid" : "" }}" placeholder="{{ __('admin.users.edit.phoneFieldPlaceholder') }}" value="{{ old() ? old('phone') : $user->phone }}">
                    </div>

                    <div class="form-group">
                        <label for="inputDescription">{{ __('admin.users.edit.descriptionFieldLabel') }}</label>
                        <textarea name="description" id="inputDescription" class="form-control" rows="5">{{ old() ? old('description') : $user->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputAvatar">{{ __('admin.users.edit.avatarFieldLabel') }}</label>
                        <input type="file" id="inputAvatar" name="avatar" class="form-control {{ $errors->has("avatar") ? "is-invalid" : "" }}">
                        @if ( $user->avatar )
                            <img src="/uploads/{{ $user->slug }}/avatar.png">
                            <a href="{{ route("deleteAvatar",$user->id) }}" class="btn btn-sm btn-danger">{{ __("admin.users.edit.avatarRemoveButton") }}</a>
                        @endif
                    </div>

                    <div class="form-row">
                        <div class="col-12 col-md-6">
                            <label for="inputState">{{ __('admin.users.edit.stateFieldLabel') }}</label>
                            <select name="state" class="form-control">
                                <option value="">{{ __('admin.users.edit.stateFieldPlaceholder') }}</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}" {{ $user->province_id == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="inputCity">{{ __('admin.users.edit.cityFieldLabel') }}</label>
                            <input type="text" id="inputCity" name="locationCity" class="form-control {{ $errors->has("locationCity") ? "is-invalid" : "" }}" placeholder="{{ __('admin.users.edit.cityFieldPlaceholder') }}" value="{{ old() ? old('locationCity') : $user->locationCity }}">
                        </div>
                    </div>

                    <!-- számlázási adatok -->
                    <div id="billingDatas" class="{{ $user->user_role_id=="3" ? "d-block" : "d-none" }}">
                        <hr />
                        <h4 class="font-weight-bolder">{{ __("admin.users.edit.billingDataTitle") }}</h4>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input billingType" type="radio" name="billingType" id="billingType_person" value="1" {{ (old() && old("billingType")=="1") || (!old() && $user->billing && $user->billing->billing_type_id=="1") ? "checked" : "" }}>
                            <label class="form-check-label" for="billingType_person">{{ __('admin.users.edit.billingDataTypePerson') }}</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input billingType" type="radio" name="billingType" id="billingType_company" value="2" {{ (old() && old("billingType")=="2") || (!old() && $user->billing && $user->billing->billing_type_id=="2") ? "checked" : "" }}>
                            <label class="form-check-label" for="billingType_company">{{ __('admin.users.edit.billingDataTypeCompany') }}</label>
                        </div>
                        
                        <div class="form-row {{ (old() && old("billingType")=="2") || (!old() && $user->billing && $user->billing->billing_type_id=="2") ? "d-block" : "d-none" }}" id="companyRow">
                            <div class="form-group col-12 col-md-6">
                                <label for="inputCompanyName">* {{ __('admin.users.edit.billingCompanyNameFieldLabel') }}</label>
                                <input type="text" class="form-control {{ $errors->has("billingCompanyName") ? "is-invalid" : "" }}" name="billingCompanyName" id="inputCompanyName" placeholder="{{ __('admin.users.edit.billingCompanyNameFieldPlaceholder') }}" value="{{ old() || (!old() && !$user->billing) ? old('billingCompanyName') : $user->billing->company_name }}">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="inputTaxNumber">* {{ __('admin.users.edit.billingTaxNumberFieldLabel') }}</label>
                                <input type="text" class="form-control {{ $errors->has("billingTaxNumber") ? "is-invalid" : "" }}" name="billingTaxNumber" id="inputTaxNumber" placeholder="{{ __('admin.users.edit.billingTaxNumberFieldPlaceholder') }}" value="{{ old() || (!old() && !$user->billing) ? old('billingTaxNumber') : $user->billing->tax_number }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-md-3">
                                <label for="inputState">* {{ __('admin.users.edit.billingStateFieldLabel') }}</label>
                                <select id="inputState" name="billingState" class="form-control {{ $errors->has("state") ? "is-invalid" : "" }}" required>
                                    <option value="">{{ __('admin.users.edit.billingStateFieldPlaceholder') }}</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}" {{ (old() && old("billingState")==$province->id) || (!old() && $user->billing && $user->billing->province_id==$province->id) ? "selected" : "" }}>{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label for="inputZip">* {{ __('admin.users.edit.billingZipFieldLabel') }}</label>
                                <input type="text" class="form-control {{ $errors->has("billingZip") ? "is-invalid" : "" }}" id="inputZip" name="billingZip" placeholder="{{ __('admin.users.edit.billingZipFieldPlaceholder') }}" value="{{ old() || (!old() && !$user->billing) ? old('billingZip') : $user->billing->postcode }}">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="inputCity">* {{ __('admin.users.edit.billingCityFieldLabel') }}</label>
                                <input type="text" class="form-control {{ $errors->has("billingCity") ? "is-invalid" : "" }}" name="billingCity" placeholder="{{ __('admin.users.edit.billingCityFieldPlaceholder') }}" value="{{ old() || (!old() && !$user->billing) ? old('city') : $user->billing->city }}">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-12 col-md-6">
                                <label for="inputAddress">* {{ __('admin.users.edit.billingAddress1FieldLabel') }}</label>
                                <input type="text" class="form-control {{ $errors->has("billingAddress") ? "is-invalid" : "" }}" name="billingAddress" id="inputAddress" placeholder="{{ __('admin.users.edit.billingAddress1FieldPlaceholder') }}" value="{{ old() || (!old() && !$user->billing) ? old('billingAddress') : $user->billing->address }}" required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="inputAddress2">{{ __('admin.users.edit.billingAddress2FieldLabel') }}</label>
                                <input type="text" class="form-control {{ $errors->has("billingAddress2") ? "is-invalid" : "" }}" name="billingAddress2" id="inputAddress2" placeholder="{{ __('admin.users.edit.billingAddress2FieldPlaceholder') }}" value="{{ old() || (!old() && !$user->billing) ? old('billingAddress2') : $user->billing_address2 }}">
                            </div>
                        </div>
                    </div>
                    <!-- számlázási adatok -->
                    
                    <br /><br />
                    <button class="btn btn-success text-white" type="submit">{{ __('admin.users.edit.submitButton') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/admin/assets/js/users.js"></script>
@endsection