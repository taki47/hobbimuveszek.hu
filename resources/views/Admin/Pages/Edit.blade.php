@extends('Layouts.Admin')

@section('content')
<div class="row">
    <div class="col-12 ">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>{{ $page->name }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-signin" method="POST" action="{{ route('adminPageUpdate', $page->id) }}">
                    @csrf
            
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="inputName">* {{ __('admin.pages.edit.nameFieldLabel') }}</label>
                        <input type="text" id="inputName" name="name" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" placeholder="{{ __('admin.pages.edit.nameFieldPlaceholder') }}" required autofocus value="{{ old() ? old('name') : $page->name }}">
                    </div>

                    <div class="form-group">
                        <label for="inputTitle">* {{ __('admin.pages.edit.titleFieldLabel') }}</label>
                        <input type="text" id="inputTitle" name="title" class="form-control {{ $errors->has("title") ? "is-invalid" : "" }}" placeholder="{{ __('admin.pages.edit.titleFieldPlaceholder') }}" required value="{{ old() ? old('title') : $page->title }}">
                    </div>
                    
                    <div class="form-row">
                        <div class="col">
                            <label for="inputDescription">{{ __('admin.pages.edit.descriptionFieldLabel') }}</label>
                            <input type="text" id="inputDescription" name="description" class="form-control {{ $errors->has("description") ? "is-invalid" : "" }}" placeholder="{{ __('admin.pages.edit.descriptionFieldPlaceholder') }}" value="{{ old() ? old('description') : $page->description }}">
                        </div>
                        <div class="col">
                            <label for="inputKeywords">{{ __('admin.pages.edit.keywordsFieldLabel') }}</label>
                            <input type="text" id="inputKeywords" name="keywords" class="form-control {{ $errors->has("keywords") ? "is-invalid" : "" }}" placeholder="{{ __('admin.pages.edit.keywordsFieldPlaceholder') }}" value="{{ old() ? old('keywords') : $page->keywords }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <br />
                        <label for="inputBody">{{ __('admin.pages.edit.bodyFieldLabel') }}</label>
                        <textarea class="form-control" name="body" id="inputBody" style="height:200px;">{{ old() ? old("body") : $page->body }}</textarea>
                    </div>
            
                    <br /><br />
                    <button class="btn btn-success text-white" type="submit">{{ __('admin.pages.edit.submitButton') }}</button>
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
            plugins: 'autoresize fullscreen autolink lists media table',
            toolbar: 'bold italic underline heading align pageembed table fullscreen',
            toolbar_mode: 'floating',
            extended_valid_elements: 'span[*]'
        });
    </script>
@endsection