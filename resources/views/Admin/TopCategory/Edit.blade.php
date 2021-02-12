@extends('Layouts.Admin')

@section('content')
<div class="row">
    <div class="col-12 ">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>{{ __("admin.topcategories.edit.title") }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-signin" enctype="multipart/form-data" method="POST" action="{{ route('adminTopCategoryUpdate', $topCategory->id) }}">
                    @csrf
            
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="inputName">* {{ __('admin.topcategories.edit.nameFieldLabel') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ old() ? old("name") : $topCategory->name }}" placeholder="{{ __('admin.topcategories.edit.nameFieldPlaceholder') }}" required autofocus>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputImage">{{ __('admin.topcategories.edit.imageFieldLabel') }}</label>
                        <input type="file" name="image" class="form-control"><br>
                        <img src="/assets/images/topcategories/{{ $topCategory->image }}" style="max-height:50px;">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="inputImageTitle">{{ __('admin.topcategories.edit.imageTitleFieldLabel') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('admin.topcategories.edit.imageTitleFieldPlaceholder') }}" value="{{ old() ? old("title") : $topCategory->title }}" name="title">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="inputImageAlt">{{ __('admin.topcategories.edit.imageAltFieldLabel') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('admin.topcategories.edit.imageAltFieldPlaceholder') }}" value="{{ old() ? old("alt") : $topCategory->alt }}" name="alt">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPosition">{{ __('admin.topcategories.edit.positionFieldLabel') }}</label>
                        <input type="number" name="position" class="form-control" value="{{ old() ? old("position") : $topCategory->position }}" placeholder="{{ __('admin.topcategories.edit.positionFieldPlaceholder') }}">
                    </div>

                    <div class="form-group">
                        <label for="inputLink">* {{ __('admin.topcategories.edit.linkFieldLabel') }}</label>
                        <input type="text" name="link" class="form-control" value="{{ old() ? old("link") : $topCategory->link }}" placeholder="{{ __('admin.topcategories.edit.linkFieldPlaceholder') }}" required>
                    </div>

                    <br /><br />
            
                    <button class="btn btn-success text-white" type="submit">{{ __('admin.topcategories.edit.submitButton') }}</button>
                    <button class="btn btn-danger text-white" type="button" data-toggle="modal" data-target="#deleteModal">{{ __('admin.topcategories.edit.deleteButton') }}</button>
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
          <h5 class="modal-title" id="deleteModalLabel">{{ __("admin.topcategories.edit.deleteTitle") }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ __("admin.topcategories.edit.deleteConfirm") }}
        </div>
        <div class="modal-footer">
            <form name="deleteForm" method="POST" action="{{ route("adminTopCategoryDestroy", $topCategory->id) }}">
                @csrf
                @method("DELETE")
                <button type="button" class="btn btn-success" data-dismiss="modal">{{ __("admin.topcategories.edit.deleteCancel") }}</button>
                <button type="submit" class="btn btn-danger">{{ __("admin.topcategories.edit.deleteButton") }}</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection