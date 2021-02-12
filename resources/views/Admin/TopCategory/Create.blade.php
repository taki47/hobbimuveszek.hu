@extends('Layouts.Admin')

@section('content')
<div class="row">
    <div class="col-12 ">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>{{ __("admin.topcategories.create.title") }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-signin" enctype="multipart/form-data" method="POST" action="{{ route('adminTopCategoryStore') }}">
                    @csrf
            
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="inputName">* {{ __('admin.topcategories.create.nameFieldLabel') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ old("name") }}" placeholder="{{ __('admin.topcategories.create.nameFieldPlaceholder') }}" required autofocus>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputImage">* {{ __('admin.topcategories.create.imageFieldLabel') }}</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="inputImageTitle">{{ __('admin.topcategories.create.imageTitleFieldLabel') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('admin.topcategories.create.imageTitleFieldPlaceholder') }}" value="{{ old("title") }}" name="title">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="inputImageAlt">{{ __('admin.topcategories.create.imageAltFieldLabel') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('admin.topcategories.create.imageAltFieldPlaceholder') }}" value="{{ old("alt") }}" name="alt">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPosition">{{ __('admin.topcategories.create.positionFieldLabel') }}</label>
                        <input type="number" name="position" class="form-control" value="{{ old("position") }}" placeholder="{{ __('admin.topcategories.create.positionFieldPlaceholder') }}">
                    </div>

                    <div class="form-group">
                        <label for="inputLink">* {{ __('admin.topcategories.create.linkFieldLabel') }}</label>
                        <input type="text" name="link" class="form-control" value="{{ old("link") }}" placeholder="{{ __('admin.topcategories.create.linkFieldPlaceholder') }}" required>
                    </div>

                    <br /><br />
            
                    <button class="btn btn-success text-white" type="submit">{{ __('admin.topcategories.create.submitButton') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection