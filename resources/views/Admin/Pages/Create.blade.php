@extends('Layouts.Admin')

@section('content')
<div class="row">
    <div class="col-12 ">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>{{ __("admin.pages.create.title") }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-signin" method="POST" action="{{ route('adminPageStore') }}">
                    @csrf
            
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="inputName">* {{ __('admin.pages.create.nameFieldLabel') }}</label>
                        <input type="text" id="inputName" name="name" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" placeholder="{{ __('admin.pages.create.nameFieldPlaceholder') }}" required autofocus value="{{ old() ? old('name') : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="inputTitle">* {{ __('admin.pages.create.titleFieldLabel') }}</label>
                        <input type="text" id="inputTitle" name="title" class="form-control {{ $errors->has("title") ? "is-invalid" : "" }}" placeholder="{{ __('admin.pages.create.titleFieldPlaceholder') }}" required value="{{ old() ? old('title') : '' }}">
                    </div>
                    
                    <div class="form-row">
                        <div class="col">
                            <label for="inputDescription">{{ __('admin.pages.create.descriptionFieldLabel') }}</label>
                            <input type="text" id="inputDescription" name="description" class="form-control {{ $errors->has("description") ? "is-invalid" : "" }}" placeholder="{{ __('admin.pages.create.descriptionFieldPlaceholder') }}" value="{{ old() ? old('description') : '' }}">
                        </div>
                        <div class="col">
                            <label for="inputKeywords">{{ __('admin.pages.create.keywordsFieldLabel') }}</label>
                            <input type="text" id="inputKeywords" name="keywords" class="form-control {{ $errors->has("keywords") ? "is-invalid" : "" }}" placeholder="{{ __('admin.pages.create.keywordsFieldPlaceholder') }}" value="{{ old() ? old('keywords') : '' }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <br />
                        <label for="inputBody">{{ __('admin.pages.create.bodyFieldLabel') }}</label>
                        <textarea class="form-control" name="body" id="inputBody" rows="5">{{ old() ? old("body") : "" }}</textarea>
                    </div>
                    
            
                    <br /><br />
                    <button class="btn btn-success text-white" type="submit">{{ __('admin.pages.create.submitButton') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.tiny.cloud/1/apstskxdxntlqi0zdotqlahx1pl1ay1w57s5qyj9hvyuoouf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#inputBody',
            plugins: 'autoresize fullscreen a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck checklist code bold italic underline heading align formatpainter pageembed permanentpen table fullscreen',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
@endsection