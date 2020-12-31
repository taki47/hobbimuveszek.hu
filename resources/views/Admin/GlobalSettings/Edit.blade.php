@extends('Layouts.Admin')

@section('content')
<div class="row">
    <div class="col-12 ">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>{{ $globalSetting->name }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-signin" enctype="multipart/form-data" method="POST" action="{{ route('adminGlobalSettingUpdate', $globalSetting->id) }}">
                    @csrf
            
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="inputName">* {{ __('admin.globalSettings.edit.nameFieldLabel') }}</label>
                        <input type="text" id="inputName" name="name" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" placeholder="{{ __('admin.globalSettings.edit.nameFieldPlaceholder') }}" required autofocus value="{{ old() ? old('name') : $globalSetting->name }}">
                    </div>

                    @if ( $globalSetting->type=="2" )
                        <div class="form-group">
                            <label for="inputImage">{{ __('admin.globalSettings.edit.imageFieldLabel') }}</label>
                            <input type="file" id="inputImage" name="value" class="form-control {{ $errors->has("value") ? "is-invalid" : "" }}" placeholder="{{ __('admin.globalSettings.edit.imageFieldPlaceholder') }}">
                            <br />
                            <img src="/assets/images/{{ $globalSetting->value }}" style="max-height:150px;">
                        </div>

                        <div class="form-group">
                            <label for="inputFileName">{{ __('admin.globalSettings.edit.fileNameFieldLabel') }}</label>
                            <input type="text" id="inputFileName" name="fileName" class="form-control {{ $errors->has("value") ? "is-invalid" : "" }}" placeholder="{{ __('admin.globalSettings.edit.fileNameFieldPlaceholder') }}" value="{{ old() ? old('fileName') : $globalSetting->value }}">
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="inputAlt">{{ __('admin.globalSettings.edit.altFieldLabel') }}</label>
                                <input type="text" id="inputAlt" name="alt" class="form-control {{ $errors->has("value") ? "is-invalid" : "" }}" placeholder="{{ __('admin.globalSettings.edit.altFieldPlaceholder') }}" value="{{ old() ? old('alt') : $globalSetting->alt }}">
                            </div>
                            <div class="col">
                                <label for="inputtitle">{{ __('admin.globalSettings.edit.titleFieldLabel') }}</label>
                                <input type="text" id="inputtitle" name="title" class="form-control {{ $errors->has("value") ? "is-invalid" : "" }}" placeholder="{{ __('admin.globalSettings.edit.titleFieldPlaceholder') }}" value="{{ old() ? old('title') : $globalSetting->title }}">
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="inputValue">{{ __('admin.globalSettings.edit.valueFieldLabel') }}</label>
                            <textarea name="value" id="inputValue" class="form-control" rows="5">{{ old() ? old('value') : $globalSetting->value }}</textarea>
                        </div>
                    @endif
            
                    <br /><br />
                    <button class="btn btn-success text-white" type="submit">{{ __('admin.globalSettings.edit.submitButton') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection