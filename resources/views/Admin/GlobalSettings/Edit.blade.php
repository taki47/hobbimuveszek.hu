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

                    @if ( 
                        $globalSetting->id=="1" ||
                        $globalSetting->id=="2" ||
                        $globalSetting->id=="3" ||
                        $globalSetting->id=="4" ||
                        $globalSetting->id=="5" ||
                        $globalSetting->id=="6"
                    )
                        <div class="form-group">
                            <label for="inputValue">{{ __('admin.globalSettings.edit.valueFieldLabel') }}</label>
                            <input type="file" id="inputValue" name="value" class="form-control {{ $errors->has("value") ? "is-invalid" : "" }}" placeholder="{{ __('admin.globalSettings.edit.valueFieldPlaceholder') }}">
                            <br />
                            <img src="/assets/images/{{ $globalSetting->value }}" style="max-height:150px;">
                        </div>
                    @else
                        <div class="form-group">
                            <label for="inputValue">{{ __('admin.globalSettings.edit.valueFieldLabel') }}</label>
                            <input type="text" id="inputValue" name="value" class="form-control {{ $errors->has("value") ? "is-invalid" : "" }}" value="{{ old() ? old('value') : $globalSetting->value }}">
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