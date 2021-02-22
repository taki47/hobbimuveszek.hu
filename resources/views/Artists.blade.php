@extends('Layouts.Master')

@section('content')
<div class="modal fade" id="loginModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-modal" role="document">
        <div class="modal-content">
            <div class="auth-box">
                <button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
                <h4 class="title">{{ __("auth.login.title") }}</h4>
                <!-- form start -->
                <form id="form_login" action="{{ route("loginAttempt") }}" method="POST">
                    <!-- include message block -->
                    <div class="form-group">
                        <input type="email" name="email" id="modalEmail" class="form-control auth-form-input" value="" placeholder="{{ __("auth.login.email") }}" required style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="modalPassword" class="form-control auth-form-input" value="" placeholder="{{ __("auth.login.password") }}" minlength="4" required style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember" id="modalRemember" value="1" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;"> {{ __("auth.login.rememberme") }}
                    </div>
                    <div class="form-group text-right">
                        <a href="{{ route("lostPassword") }}" class="link-forgot-password">{{ __("auth.login.lostPassword") }}</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-custom btn-block">{{ __("auth.login.title") }}</button>
                    </div>

                    <p class="p-social-media m-0 m-t-5">{{ __("auth.login.dontHaveAnAccount") }}&nbsp;<a href="{{ route("register") }}" class="link">{{ __("auth.login.register") }}</a></p>
                </form>
                <!-- form end -->
            </div>
        </div>
    </div>
</div>


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
                                        @if ( !Auth::check() )
                                            <button class="btn btn-md btn-outline" data-toggle="modal" data-target="#loginModal">
                                                <i class="icon-user-plus"></i>
                                                {{ __("artists.artistSearchPage.follow") }}
                                            </button>
                                        @else
                                            <button class="btn btn-md btn-outline" data-toggle="modal" data-target="#loginModal">
                                                <i class="icon-user-plus"></i>
                                                {{ __("artists.artistSearchPage.follow") }}
                                            </button>
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
@endsection
