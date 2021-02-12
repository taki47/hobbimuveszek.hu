@extends('Layouts.Admin')

@section('content')
<div class="row">
    <div class="col-12 ">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>{{ __("admin.sliders.create.title") }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-signin" enctype="multipart/form-data" method="POST" action="{{ route('adminSliderStore') }}">
                    @csrf
            
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="inputName">* {{ __('admin.sliders.create.nameFieldLabel') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ old("name") }}" placeholder="{{ __('admin.sliders.create.nameFieldPlaceholder') }}" required autofocus>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputImage">* {{ __('admin.sliders.create.imageFieldLabel') }}</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="inputImageTitle">{{ __('admin.sliders.create.imageTitleFieldLabel') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('admin.sliders.create.imageTitleFieldPlaceholder') }}" value="{{ old("title") }}" name="title">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="inputImageAlt">{{ __('admin.sliders.create.imageAltFieldLabel') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('admin.sliders.create.imageAltFieldPlaceholder') }}" value="{{ old("alt") }}" name="alt">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputText">{{ __('admin.sliders.create.textFieldLabel') }}</label>
                        <textarea name="text" class="form-control" rows="5">{{ old("text") }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputPosition">{{ __('admin.sliders.create.positionFieldLabel') }}</label>
                        <input type="number" name="position" class="form-control" value="{{ old("position") }}" placeholder="{{ __('admin.sliders.create.positionFieldPlaceholder') }}">
                    </div>

                    <br /><br />
            
                    <button class="btn btn-success text-white" type="submit">{{ __('admin.sliders.create.submitButton') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection