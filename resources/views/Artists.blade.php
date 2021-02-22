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
                                        @if ( Auth::user() && Auth::user()->id!=$user->id )
                                            @if ( Auth::user()->isFollow($user->id) )
                                                <button class="btn btn-md btn-outline follow unfollow" aria-data="{{ $user->id }}">
                                                    <div class="d-none follow-spinner"><span class="loader"><span class="loader-box"></span><span class="loader-box"></span><span class="loader-box"></span></span></div>
                                                    <i class="icon-user-minus"></i>{{ __('artists.artistSearchPage.unFollowTxt') }}
                                                </button>
                                            @else
                                                <button class="btn btn-md btn-outline follow" aria-data="{{ $user->id }}">
                                                    <div class="d-none follow-spinner"><span class="loader"><span class="loader-box"></span><span class="loader-box"></span><span class="loader-box"></span></span></div>
                                                    <i class="icon-user-plus"></i>{{ __('artists.artistSearchPage.followTxt') }}
                                                </button>
                                            @endif
                                        @elseif( !Auth::user() )
                                            <button class="btn btn-md btn-outline" data-toggle="modal" data-target="#loginModal"><i class="icon-user-plus"></i>{{ __('artists.artistSearchPage.followTxt') }}</button>
                                        @endif
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
<input type="hidden" id="followUrl" value="{{ route("follow") }}">
<input type="hidden" id="unFollowUrl" value="{{ route("unFollow") }}">
<input type="hidden" id="unFollowTxt" value="{{ __('artists.artistSearchPage.unFollowTxt') }}">
<input type="hidden" id="followTxt" value="{{ __('artists.artistSearchPage.followTxt') }}">
@endsection
