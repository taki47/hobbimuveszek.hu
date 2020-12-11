@extends('Layouts.Master')

@section('content')
<div class="container main-container">
    <h3 class="text-center">{{ __('auth.lostPassword.sent.title') }}</h3>

    <p class="text-center">
        {!! __('auth.lostPassword.sent.description') !!}
    </p>
</div>
@endsection