@extends('Layouts.Master')

@section('content')
<div class="container main-container">
    <h3 class="text-center">{{ __('auth.register.confirmOk.title') }}</h3>

    <p class="text-center">
        {!! __('auth.register.confirmOk.description') !!}
    </p>
</div>
@endsection