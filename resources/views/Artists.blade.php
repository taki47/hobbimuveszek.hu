@extends('Layouts.Master')

@section('content')
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Főoldal</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Művészek</li>
                    </ol>
                </nav>

                <h1 class="page-title page-title-product">{{ __("artists.artistSearchPage.title") }}</h1>

                <div class="row">
                    @foreach ($users as $user)
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="member-list-item">
                                <div class="left">
                                    <a href="{{ route("showProfile", $user->slug) }}">
                                        @if ( $user->avatar )
                                            <img src="/uploads/{{ $user->slug }}/avatar.png" alt="{{ $user->name }}" class="img-fluid img-profile ls-is-cached lazyloaded">
                                        @else
                                            <img src="/assets/images/user.png" alt="{{ $user->name }}" class="img-fluid img-profile ls-is-cached lazyloaded">
                                        @endif
                                    </a>
                                </div>
                                <div class="right">
                                    <a href="{{ route("showProfile", $user->slug) }}">
                                        <p class="username">{{ $user->name }}</p>
                                    </a>
                                    <p>
                                        {{ __("artists.artistSearchPage.creations") }} XX
                                    </p>

                                    <p>
                                        <button class="btn btn-md btn-outline" data-toggle="modal" data-target="#loginModal">
                                            <i class="icon-user-plus"></i>
                                            {{ __("artists.artistSearchPage.follow") }}
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
