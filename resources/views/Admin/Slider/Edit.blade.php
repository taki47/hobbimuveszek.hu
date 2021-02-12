@extends('Layouts.Admin')

@section('content')
<div class="row">
    <div class="col-12 ">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>{{ __("admin.sliders.edit.title") }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-signin" enctype="multipart/form-data" method="POST" action="{{ route('adminSliderUpdate', $slider->id) }}">
                    @csrf
            
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="inputName">* {{ __('admin.sliders.edit.nameFieldLabel') }}</label>
                        <input type="text" name="name" class="form-control" value="{{ old() ? old("name") : $slider->name }}" placeholder="{{ __('admin.sliders.edit.nameFieldPlaceholder') }}" required autofocus>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputImage">{{ __('admin.sliders.edit.imageFieldLabel') }}</label>
                        <input type="file" name="image" class="form-control"><br>
                        <img src="/assets/images/sliders/{{ $slider->image }}" style="max-height:50px;">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="inputImageTitle">{{ __('admin.sliders.edit.imageTitleFieldLabel') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('admin.sliders.edit.imageTitleFieldPlaceholder') }}" value="{{ old() ? old("title") : $slider->title }}" name="title">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="inputImageAlt">{{ __('admin.sliders.edit.imageAltFieldLabel') }}</label>
                            <input type="text" class="form-control" placeholder="{{ __('admin.sliders.edit.imageAltFieldPlaceholder') }}" value="{{ old() ? old("alt") : $slider->alt }}" name="alt">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputText">{{ __('admin.sliders.edit.textFieldLabel') }}</label>
                        <textarea name="text" class="form-control" rows="5">{{ old() ? old("text") : $slider->text }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputPosition">{{ __('admin.sliders.edit.positionFieldLabel') }}</label>
                        <input type="number" name="position" class="form-control" value="{{ old() ? old("position") : $slider->position }}" placeholder="{{ __('admin.sliders.edit.positionFieldPlaceholder') }}">
                    </div>

                    <br /><br />
            
                    <button class="btn btn-success text-white" type="submit">{{ __('admin.sliders.edit.submitButton') }}</button>
                    <button class="btn btn-danger text-white" type="button" data-toggle="modal" data-target="#deleteModal">{{ __('admin.sliders.edit.deleteButton') }}</button>
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
          <h5 class="modal-title" id="deleteModalLabel">{{ __("admin.sliders.edit.deleteTitle") }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ __("admin.sliders.edit.deleteConfirm") }}
        </div>
        <div class="modal-footer">
            <form name="deleteForm" method="POST" action="{{ route("adminSliderDestroy", $slider->id) }}">
                @csrf
                @method("DELETE")
                <button type="button" class="btn btn-success" data-dismiss="modal">{{ __("admin.sliders.edit.deleteCancel") }}</button>
                <button type="submit" class="btn btn-danger">{{ __("admin.sliders.edit.deleteButton") }}</button>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection