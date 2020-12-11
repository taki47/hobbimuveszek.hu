@extends('Layouts.Master')

@section('content')
<div class="container main-container">
    <h3 class="text-center">{{ __('auth.register.confirmError.title') }}</h3>

    <p class="text-center">
        {!! __('auth.register.confirmError.description') !!}
    </p>
</div>
@endsection