@extends('Layouts.Admin')

@section('content')
<div class="row">
    <div class="col-12 ">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>{{ __("admin.categoryImages.create.title") }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-signin" enctype="multipart/form-data" method="POST" action="{{ route('adminCategoryImageStore') }}">
                    @csrf
            
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="inputName">* {{ __('admin.categoryImages.create.nameFieldLabel') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ old("name") }}" placeholder="{{ __('admin.categoryImages.create.nameFieldPlaceholder') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="inputName">* {{ __('admin.categoryImages.create.categoryFieldLabel') }}</label>
                        <select name="category_id" class="form-control" required>
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old() && old("category_id")==$category->id ? " selected" : "" }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputImage">* {{ __('admin.categoryImages.create.imageFieldLabel') }}</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="inputImageTitle">{{ __('admin.categoryImages.create.imageTitleFieldLabel') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('admin.categoryImages.create.imageTitleFieldPlaceholder') }}" value="{{ old("title") }}" name="title">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="inputImageAlt">{{ __('admin.categoryImages.create.imageAltFieldLabel') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('admin.categoryImages.create.imageAltFieldPlaceholder') }}" value="{{ old("alt") }}" name="alt">
                        </div>
                    </div>
            
                    <br /><br />
                    <button class="btn btn-success text-white" type="submit">{{ __('admin.categoryImages.create.submitButton') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection