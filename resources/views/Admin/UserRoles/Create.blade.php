@extends('Layouts.Admin')

@section('content')
<div class="row">
    <div class="col-12 ">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>{{ __("admin.userRoles.create.title") }}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-signin" method="POST" action="{{ route('adminUserRoleStore') }}">
                    @csrf
            
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="inputName">* {{ __('admin.userRoles.create.nameFieldLabel') }}</label>
                        <input type="text" id="inputName" name="name" class="form-control {{ $errors->has("name") ? "is-invalid" : "" }}" placeholder="{{ __('admin.userRoles.create.nameFieldPlaceholder') }}" required autofocus value="{{ old() ? old('name') : '' }}">
                    </div>
            
                    <br /><br />
                    <button class="btn btn-success text-white" type="submit">{{ __('admin.userRoles.create.submitButton') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection