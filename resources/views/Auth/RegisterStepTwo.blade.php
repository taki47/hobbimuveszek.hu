@extends('Layouts.Master')

@section('content')
<div class="container main-container">
        <h1 class="text-center">{{ env("APP_NAME") }}</h1>
        <h2 class="text-center">{{ __('auth.register.title') }}</h2>

        <p class="text-center">
            {!! __('auth.register.stepTwo.description') !!}
        </p>

        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
            {{ $error }}<br />
            @endforeach
        </div>
        @endif

        <div class="row">
            <div class="col-12 col-md-6 text-center border regStepTwoArt {{ old() && old("registerRole")=="3" ? "active" : "" }}" id="regStepTwoSelectArt">
                <p class="font-weight-bold">{{ __('auth.register.stepTwo.artTitle') }}</p>
                {!! __('auth.register.stepTwo.artDescription') !!}
            </div>

            <div class="col-12 col-md-6 text-center border regStepTwoVisitor {{ old() && old("registerRole")=="2" ? "active" : "" }}" id="regStepTwoSelectVisitor">
                <p class="font-weight-bold">{{ __('auth.register.stepTwo.visitorTitle') }}</p>
                {!! __('auth.register.stepTwo.visitorDescription') !!}
            </div>
        </div>

        <div class="row border" id="regStepTwoArtRow" style="display: {{ (old() && old("registerRole")=="2") || !old() ? "none;" : "" }}">
            <!-- ART ROW -->
            <div class="col-12">
                <form class="form-regStepTwoArt" enctype="multipart/form-data" method="POST" action="{{ route('sendRegisterStepTwo',[$user->email,$user->confirm]) }}">
                    @csrf
                    <input type="hidden" name="registerRole" id="registerRoleArt" value="{{ old("registerRole") }}">
                    <strong>{{ __('auth.register.stepTwo.billingDataTitle') }}</strong><br />
                    <small id="billindDataHelp" class="form-text text-muted">{{ __('auth.register.stepTwo.billingDataDescription') }}</small><br />
                    
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="billingType" id="billingType_person" value="1" {{ (old() && old("billingType")=="1") || !old() ? "checked" : "" }}>
                        <label class="form-check-label" for="billingType_person">{{ __('auth.register.stepTwo.billingDataTypePerson') }}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="billingType" id="billingType_company" value="2" {{ old() && old("billingType")=="2" ? "checked" : "" }}>
                        <label class="form-check-label" for="billingType_company">{{ __('auth.register.stepTwo.billingDataTypeCompany') }}</label>
                    </div>
                    <div class="form-row" id="companyRow" style="display: {{ old() && old("billingType")=="2" ? "display-inline" : "none" }};">
                        <div class="form-group col-12 col-md-6">
                            <label for="inputCompanyName">* {{ __('auth.register.stepTwo.companyNameFieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("companyName") ? "is-invalid" : "" }}" name="companyName" id="inputCompanyName" placeholder="{{ __('auth.register.stepTwo.companyNameFieldPlaceholder') }}" value="{{ old('companyName') }}">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="inputTaxNumber">* {{ __('auth.register.stepTwo.taxNumberFieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("taxNumber") ? "is-invalid" : "" }}" name="taxNumber" id="inputTaxNumber" placeholder="{{ __('auth.register.stepTwo.taxNumberFieldPlaceholder') }}" value="{{ old('taxNumber') }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-3">
                            <label for="inputState">* {{ __('auth.register.stepTwo.stateFieldLabel') }}</label>
                            <select id="inputState" name="state" class="form-control {{ $errors->has("state") ? "is-invalid" : "" }}" required>
                                <option value="">{{ __('auth.register.stepTwo.stateFieldPlaceholder') }}</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}" {{ old("state") && old("state")==$province->id ? "selected" : "" }}>{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-3">
                            <label for="inputZip">* {{ __('auth.register.stepTwo.zipFieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("zip") ? "is-invalid" : "" }}" id="inputZip" name="zip" placeholder="{{ __('auth.register.stepTwo.zipFieldPlaceholder') }}" value="{{ old('zip') }}" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="inputCity">* {{ __('auth.register.stepTwo.cityFieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("city") ? "is-invalid" : "" }}" name="city" id="inputCity" placeholder="{{ __('auth.register.stepTwo.cityFieldPlaceholder') }}" value="{{ old('city') }}" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="inputAddress">* {{ __('auth.register.stepTwo.address1FieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("address") ? "is-invalid" : "" }}" name="address" id="inputAddress" placeholder="{{ __('auth.register.stepTwo.address1FieldPlaceholder') }}" value="{{ old('address') }}" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="inputAddress2">{{ __('auth.register.stepTwo.address2FieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("address2") ? "is-invalid" : "" }}" name="address2" id="inputAddress2" placeholder="{{ __('auth.register.stepTwo.address2FieldPlaceholder') }}" value="{{ old('address2') }}">
                        </div>
                    </div>

                    <hr />

                    <strong>{{ __('auth.register.stepTwo.otherDataTitle') }}</strong><br />
                    <small id="otherDataHelp" class="form-text text-muted">{{ __('auth.register.stepTwo.otherDataDescription') }}</small><br />
                    <div class="form-row">
                        <div class="form-group col-12 col-md-4">
                            <label for="inputAvatar">{{ __('auth.register.stepTwo.avatarFieldLabel') }} <small id="avatarHelp" class="form-text text-muted d-inline">{{ __('auth.register.stepTwo.avatarHelp') }}</small></label>
                            <input type="file" class="form-control {{ $errors->has("avatar") ? "is-invalid" : "" }}" name="avatar" id="inputAvatar">
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <label for="inputPhone">{{ __('auth.register.stepTwo.phoneFieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("phone") ? "is-invalid" : "" }}" name="phone" id="inputPhone" placeholder="{{ __('auth.register.stepTwo.phoneFieldPlaceholder') }}" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <label for="inputWebsite">{{ __('auth.register.stepTwo.websiteFieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("website") ? "is-invalid" : "" }}" name="website" id="inputWebsite" placeholder="{{ __('auth.register.stepTwo.websiteFieldPlaceholder') }}" value="{{ old('website') }}">
                        </div>
                        <div class="form-group col-12">
                            <label for="inputDescription">{{ __('auth.register.stepTwo.descriptionFieldLabel') }}</label>
                            <textarea class="form-control" name="description" id="inputDescription" rows="5">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <hr />

                    <strong>{{ __('auth.register.stepTwo.socialMediaDataTitle') }}</strong><br />
                    <small id="socialMediaDataHelp" class="form-text text-muted">{{ __('auth.register.stepTwo.socialMediaDataDescription') }}</small><br />
                    @foreach ($socialMedias as $socialMedia)
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="inputSocialMedia">{!! $socialMedia->icon !!} {{ $socialMedia->name }}</label>
                                <input type="text" class="form-control" name="social_{{ $socialMedia->id }}" id="social_{{ $socialMedia->id }}" value="{{ old("social_".$socialMedia->id) }}">
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="btn btn-success text-white" type="submit">{{ __('auth.register.stepTwo.submitButton') }}</button>
            </form>
            <!-- / ART ROW -->
        </div>

        <div class="row border" id="regStepTwoVisitorRow" style="display: {{ (old() && old("registerRole")=="3") || !old() ? "none" : "block" }};">
            <!-- VISITOR ROW -->
            <div class="col-12">
                <form class="form-regStepTwoVisitor" enctype="multipart/form-data" method="POST" action="{{ route('sendRegisterStepTwo',[$user->email,$user->confirm]) }}">
                    @csrf
                    <input type="hidden" name="registerRole" id="registerRoleVisitor" value="{{ old("registerRole") }}">
                    <strong>{{ __('auth.register.stepTwo.otherDataTitle') }}</strong><br /><br />
                    <div class="form-row">
                        <div class="form-group col-12 col-md-4">
                            <label for="inputAvatar">{{ __('auth.register.stepTwo.avatarFieldLabel') }} <small id="avatarHelp" class="form-text text-muted d-inline">{{ __('auth.register.stepTwo.avatarHelp') }}</small></label>
                            <input type="file" class="form-control {{ $errors->has("avatar") ? "is-invalid" : "" }}" name="avatar">
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <label for="inputPhone">{{ __('auth.register.stepTwo.phoneFieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("phone") ? "is-invalid" : "" }}" name="phone" placeholder="{{ __('auth.register.stepTwo.phoneFieldPlaceholder') }}" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group col-12 col-md-4">
                            <label for="inputWebsite">{{ __('auth.register.stepTwo.websiteFieldLabel') }}</label>
                            <input type="text" class="form-control {{ $errors->has("website") ? "is-invalid" : "" }}" name="website" placeholder="{{ __('auth.register.stepTwo.websiteFieldPlaceholder') }}" value="{{ old('website') }}">
                        </div>
                        <div class="form-group col-12">
                            <label for="inputDescription">{{ __('auth.register.stepTwo.descriptionFieldLabel') }}</label>
                            <textarea class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <hr />

                    <strong>{{ __('auth.register.stepTwo.socialMediaDataTitle') }}</strong><br />
                    <small id="socialMediaDataHelp" class="form-text text-muted">{{ __('auth.register.stepTwo.socialMediaDataDescription') }}</small><br />
                    @foreach ($socialMedias as $socialMedia)
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="inputSocialMedia">{!! $socialMedia->icon !!} {{ $socialMedia->name }}</label>
                                <input type="text" class="form-control" name="social_{{ $socialMedia->id }}" value="{{ old("social_".$socialMedia->id) }}">
                            </div>
                        </div>
                    @endforeach
                </div>

                <button class="btn btn-success text-white" type="submit">{{ __('auth.register.stepTwo.submitButton') }}</button>
            </form>
            <!-- / VISITOR ROW -->
        </div>
    </form>
</div>
@endsection
