@extends('Layouts.Admin')

@section('content')
<div class="row">
    <div class="col-12 ">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>{{ __("admin.categoryImages.edit.title") }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-signin" enctype="multipart/form-data" method="POST" action="{{ route('adminCategoryImageUpdate', $categoryImage->id) }}">
                    @csrf
            
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="inputName">* {{ __('admin.categoryImages.edit.nameFieldLabel') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ old() ? old("name") : $categoryImage->name }}" placeholder="{{ __('admin.categoryImages.edit.nameFieldPlaceholder') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="inputName">* {{ __('admin.categoryImages.edit.categoryFieldLabel') }}</label>
                        <select name="category_id" class="form-control" required>
                            <option value=""></option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old() && old("category_id")==$category->id ? " selected" : ($categoryImage->category_id==$category->id ? " selected" : "") }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputImage">{{ __('admin.categoryImages.edit.imageFieldLabel') }}</label>
                        <input type="file" name="image" class="form-control"><br>
                        <img src="/assets/images/categoryImages/{{ $categoryImage->image }}">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="inputImageTitle">{{ __('admin.categoryImages.edit.imageTitleFieldLabel') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('admin.categoryImages.edit.imageTitleFieldPlaceholder') }}" value="{{ old() ? old("title") : $categoryImage->title }}" name="title">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="inputImageAlt">{{ __('admin.categoryImages.edit.imageAltFieldLabel') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('admin.categoryImages.edit.imageAltFieldPlaceholder') }}" value="{{ old() ? old("alt") : $categoryImage->alt }}" name="alt">
                        </div>
                    </div>
            
                    <br /><br />
                    <button class="btn btn-success text-white" type="submit">{{ __('admin.categoryImages.edit.submitButton') }}</button>
                    <button class="btn btn-danger text-white" type="button" data-toggle="modal" data-target="#deleteModal">{{ __('admin.categoryImages.edit.deleteButton') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">{{ __("admin.categoryImages.edit.deleteTitle") }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ __("admin.categoryImages.edit.deleteConfirm") }}
        </div>
        <div class="modal-footer">
            <form name="deleteForm" method="POST" action="{{ route("adminCategoryImageDestroy", $categoryImage->id) }}">
                @csrf
                @method("DELETE")
                <button type="button" class="btn btn-success" data-dismiss="modal">{{ __("admin.categoryImages.edit.deleteCancel") }}</button>
                <button type="submit" class="btn btn-danger">{{ __("admin.categoryImages.edit.deleteButton") }}</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection