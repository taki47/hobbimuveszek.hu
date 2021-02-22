@extends('Layouts.Master')

@section('content')
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="profile-page-top">
                    <!-- load profile details -->
                    <!--user profile info-->
                    <div class="row-custom">
                        <div class="profile-details">
                            <div class="left">
                                @if ( $user->avatar )
                                    <img src="/uploads/{{ $user->slug }}/avatar.png" alt="{{ $user->name }}" title="{{ $user->name }}" class="img-profile">
                                @else
                                    <i class="fas fa-user-circle"></i>
                                @endif
                            </div>
                            <div class="right">
                                <div class="row-custom">
                                    <p class="p-last-seen">
                                        <span class="last-seen last-seen-{{ $user->isOnline() ? 'online' : 'offline' }}"> <i class="icon-circle"></i>
                                            {{ __("artists.profile.lastLogin") }}
                                            @if ( $user->last_login )
                                            {{ Jenssegers\Date\Date::parse($user->last_login)->format('Y. F d.') }}
                                            @else
                                                {{ __("artists.profile.lastLoginNever") }}
                                            @endif
                                        </span>
                                    </p>
                                </div>

                                <div class="row-custom">
                                    <h3>
                                        {{ $user->name }}
                                    </h3>
                                </div>

                                <div class="row-custom user-contact">
                                    <span class="info">
                                        {{ __("artists.profile.memberSince") }}
                                        {{ Jenssegers\Date\Date::parse($user->created_at)->format('Y. F d.') }}
                                    </span>
                                    @if ( $user->phone )
                                        <span class="info"><i class="icon-phone"></i>
                                            <div id="phone-spinner" class="d-none"><span class="loader"><span class="loader-box"></span><span class="loader-box"></span><span class="loader-box"></span></span></div>
                                            
                                            <div class="d-inline-block showButtonContainer" id="show_phone_number">
                                                <button class="g-recaptcha" data-sitekey="{{ env("GCAPTCHA_SITE_KEY") }}" data-callback="getPhoneNumber">
                                                    {{ __("artists.profile.show") }}
                                                </button>
                                            </div>
                                        </span>
                                    @endif
                                    
                                    <span class="info">
                                        <i class="icon-envelope"></i>
                                        
                                        <div id="email-spinner" class="d-none"><span class="loader"><span class="loader-box"></span><span class="loader-box"></span><span class="loader-box"></span></span></div>
                                        <div class="d-inline-block showButtonContainer" id="show_email_address">
                                            <button class="g-recaptcha" data-sitekey="{{ env("GCAPTCHA_SITE_KEY") }}" data-callback="getEmailAddress">
                                                {{ __("artists.profile.show") }}
                                            </button>
                                        </div>
                                    </span>

                                    @if ( $user->website )
                                        <span class="info">
                                            <i class="fas fa-globe"></i>
                                            @php
                                                $url = $user->website;
                                                if ( !(strpos($url, 'http')>-1) )
                                                    $url = "http://".$url;
                                            @endphp
                                            <a href="{{ $url }}" target="_blank">
                                                {{ $user->website }}
                                            </a>
                                        </span>
                                    @endif

                                    @if ( $user->province_id || $user->locationCity )
                                        <span class="info"><i class="icon-map-marker"></i>
                                            @if ( $user->province_id )
                                                {{ $user->state->name }},
                                            @endif
                                            @if ( $user->locationCity )
                                                {{ $user->locationCity }}
                                            @endif
                                        </span>
                                    @endif

                                    <br />

                                    {{ $user->description }}
                                </div>

                                <div class="profile-rating">
                                    <div class="rating">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-o"></i>
                                    </div> &nbsp;<span>(2)</span>
                                </div>

                                <div class="row-custom profile-buttons">
                                    <div class="row-custom profile-buttons mb-2">
                                        <div class="buttons">
                                            @if ( Auth::user() && Auth::user()->id != $user->id )
                                                <!-- LEVÉL -->
                                                <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal"><i class="icon-envelope"></i>Levelet írok neki</button>
                                            
                                                <!-- KÖVETÉS -->
                                                @if ( Auth::user() && Auth::user()->isFollow($user->id) )
                                                    <button class="btn btn-md btn-outline-gray follow unfollow" aria-data="{{ $user->id }}">
                                                        <div class="d-none follow-spinner"><span class="loader"><span class="loader-box"></span><span class="loader-box"></span><span class="loader-box"></span></span></div>
                                                        <i class="icon-user-minus"></i>{{ __('artists.artistSearchPage.unFollowTxt') }}
                                                    </button>
                                                @elseif( Auth::user() && !Auth::user()->isFollow($user->id) )
                                                    <button class="btn btn-md btn-outline-gray follow" aria-data="{{ $user->id }}">
                                                        <div class="d-none follow-spinner"><span class="loader"><span class="loader-box"></span><span class="loader-box"></span><span class="loader-box"></span></span></div>
                                                        <i class="icon-user-plus"></i>{{ __('artists.artistSearchPage.followTxt') }}
                                                    </button>
                                                @else
                                                    <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal"><i class="icon-user-plus"></i>{{ __('artists.artistSearchPage.followTxt') }}</button>
                                                @endif
                                            @elseif( !Auth::user() )
                                                <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal"><i class="icon-envelope"></i>Levelet írok neki</button>
                                                <button class="btn btn-md btn-outline-gray" data-toggle="modal" data-target="#loginModal"><i class="icon-user-plus"></i>{{ __('artists.artistSearchPage.followTxt') }}</button>
                                            @endif
                                        </div>
                                    </div>

                                    @if ( $socialMedias )
                                        <div class="social">
                                            <ul>
                                                @foreach ($socialMedias as $socialMedia)
                                                    @php
                                                        $url = $socialMedia->url;
                                                        if ( !(strpos($url, 'http://')>-1) )
                                                            $url = "https://".$url;
                                                    @endphp
                                                    <li>
                                                        <a href="{{ $url }}" target="_blank">
                                                            {!! $socialMedia->media->icon !!}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-3">
                <!--profile page tabs-->
                <div class="profile-tabs nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <ul class="nav">
                        @if ( Auth::user() && Auth::user()->id==$user->id )
                            <li class="nav-item">
                                <a class="nav-link active" href="#v-pills-profile" data-toggle="pill" id="v-pills-profile-tab" aria-controls="v-pills-profile" aria-selected="true">
                                    <span>{{ __("artists.profile.menu.myProfile") }}</span>
                                </a>
                            </li>
                            @if ( $user->user_role_id==3 )
                                <li class="nav-item">
                                    <a class="nav-link" href="#v-pills-creations" data-toggle="pill" id="v-pills-creations-tab" aria-controls="v-pills-creations" aria-selected="false">
                                        <span>{{ __("artists.profile.menu.myCreations") }}</span>
                                        <span class="count">(5)</span>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="#v-pills-follower" data-toggle="pill" id="v-pills-follower-tab" aria-controls="v-pills-follower" aria-selected="false">
                                    <span>{{ __("artists.profile.menu.follower") }}</span>
                                    <span class="count">({{ $user->FollowerCount() }})</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#v-pills-following" data-toggle="pill" id="v-pills-following-tab" aria-controls="v-pills-following" aria-selected="false">
                                    <span>{{ __("artists.profile.menu.following") }}</span>
                                    <span class="count followCount">({{ $user->FollowingCount() }})</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#v-pills-reviews" data-toggle="pill" id="v-pills-reviews-tab" aria-controls="v-pills-reviews" aria-selected="false">
                                    <span>{{ __("artists.profile.menu.myReviews") }}</span>
                                    <span class="count">(7)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#v-pills-messages" data-toggle="pill" id="v-pills-messages-tab" aria-controls="v-pills-messages" aria-selected="false">
                                    <span>{{ __("artists.profile.menu.myMessages") }}</span>
                                    <span class="count">(7)</span>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" href="#v-pills-profile" data-toggle="pill" id="v-pills-profile-tab" aria-controls="v-pills-profile" aria-selected="true">
                                    <span>{{ __("artists.profile.menu.profile") }}</span>
                                </a>
                            </li>
                            @if ( $user->user_role_id==3 )
                                <li class="nav-item ">
                                    <a class="nav-link" href="#v-pills-creations" data-toggle="pill" id="v-pills-creations-tab" aria-controls="v-pills-creations" aria-selected="false">
                                        <span>{{ __("artists.profile.menu.creations") }}</span>
                                        <span class="count">(5)</span>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item ">
                                <a class="nav-link" href="#v-pills-reviews" data-toggle="pill" id="v-pills-reviews-tab" aria-controls="v-pills-reviews" aria-selected="false">
                                    <span>{{ __("artists.profile.menu.reviews") }}</span>
                                    <span class="count">(7)</span>
                                </a>
                            </li>
                        @endif
                        
                    </ul>
                </div>
            </div>

            <input type="hidden" id="followUrl" value="{{ route("follow") }}">
            <input type="hidden" id="unFollowUrl" value="{{ route("unFollow") }}">
            <input type="hidden" id="unFollowTxt" value="{{ __('artists.artistSearchPage.unFollowTxt') }}">
            <input type="hidden" id="followTxt" value="{{ __('artists.artistSearchPage.followTxt') }}">

            <div class="col-sm-12 col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="profile-tab-content tab-pane show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="row row-product-items row-product">
                            PROFILE
                        </div>
                    </div>

                    <div class="profile-tab-content tab-pane fade" id="v-pills-reviews" role="tabpanel" aria-labelledby="v-pills-reviews-tab">
                        <div class="row">
                            REVIEWS
                        </div>
                    </div>

                    @if ( $user->user_role_id==3 )
                        <div class="profile-tab-content tab-pane fade" id="v-pills-creations" role="tabpanel" aria-labelledby="v-pills-creations-tab">
                            <div class="row">
                                CREATIONS
                            </div>
                        </div>
                    @endif

                    @if ( Auth::user() && Auth::user()->id==$user->id )
                        <div class="profile-tab-content tab-pane fade" id="v-pills-follower" role="tabpanel" aria-labelledby="v-pills-follower-tab">
                            <div class="row">
                                @if ( count($follower) )
                                    @foreach ($follower as $follow)
                                        <div class="col-md-6 col-sm-6 col-12">
                                            <div class="member-list-item">
                                                <div class="left">
                                                    <a href="{{ route("showProfile", $follow->follower->slug) }}">
                                                        @if ( $follow->follower->avatar )
                                                            <img src="/uploads/{{ $follow->follower->slug }}/avatar.png" alt="{{ $follow->follower->name }}" class="img-fluid img-profile ls-is-cached lazyloaded">
                                                        @else
                                                            <img src="/assets/images/user.png" alt="{{ $follow->follower->name }}" class="img-fluid img-profile ls-is-cached lazyloaded">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="right">
                                                    <a href="{{ route("showProfile", $follow->follower->slug) }}">
                                                        <p class="username">{{ $follow->follower->name }}</p>
                                                    </a>
                                                    <p>
                                                        {{ __("artists.artistSearchPage.creations") }} XX
                                                    </p>

                                                    <p>
                                                        @if ( Auth::user() && Auth::user()->isFollow($follow->from_user_id) )
                                                            <button class="btn btn-md btn-outline-gray follow unfollow" aria-data="{{ $follow->from_user_id }}">
                                                                <div class="d-none follow-spinner"><span class="loader"><span class="loader-box"></span><span class="loader-box"></span><span class="loader-box"></span></span></div>
                                                                <i class="icon-user-minus"></i>{{ __('artists.artistSearchPage.unFollowTxt') }}
                                                            </button>
                                                        @elseif( Auth::user() && !Auth::user()->isFollow($follow->from_user_id) )
                                                            <button class="btn btn-md btn-outline-gray follow" aria-data="{{ $follow->from_user_id }}">
                                                                <div class="d-none follow-spinner"><span class="loader"><span class="loader-box"></span><span class="loader-box"></span><span class="loader-box"></span></span></div>
                                                                <i class="icon-user-plus"></i>{{ __('artists.artistSearchPage.followTxt') }}
                                                            </button>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h2>{{ __('artists.profile.follower.nobodyFollower') }}</h2>
                                @endif
                            </div>
                        </div>

                        <div class="profile-tab-content tab-pane fade following-tab" id="v-pills-following" role="tabpanel" aria-labelledby="v-pills-following-tab">
                            <div class="row">
                                @if ( count($following) )
                                    @foreach ($following as $follow)
                                        <div class="col-md-6 col-sm-6 col-12 item-{{ $follow->to_user_id }}">
                                            <div class="member-list-item">
                                                <div class="left">
                                                    <a href="{{ route("showProfile", $follow->following->slug) }}">
                                                        @if ( $follow->following->avatar )
                                                            <img src="/uploads/{{ $follow->following->slug }}/avatar.png" alt="{{ $follow->following->name }}" class="img-fluid img-profile ls-is-cached lazyloaded">
                                                        @else
                                                            <img src="/assets/images/user.png" alt="{{ $follow->following->name }}" class="img-fluid img-profile ls-is-cached lazyloaded">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="right">
                                                    <a href="{{ route("showProfile", $follow->following->slug) }}">
                                                        <p class="username">{{ $follow->following->name }}</p>
                                                    </a>
                                                    <p>
                                                        {{ __("artists.artistSearchPage.creations") }} XX
                                                    </p>

                                                    <p>
                                                        <button class="btn btn-md btn-outline-gray follow unfollow my-profile" aria-data="{{ $follow->to_user_id }}">
                                                            <div class="d-none follow-spinner"><span class="loader"><span class="loader-box"></span><span class="loader-box"></span><span class="loader-box"></span></span></div>
                                                            <i class="icon-user-minus"></i>{{ __('artists.artistSearchPage.unFollowTxt') }}
                                                        </button>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h2>{{ __('artists.profile.following.nobodyFollowing') }}</h2>
                                @endif
                            </div>
                        </div>

                        

                        <div class="profile-tab-content tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <div class="row">
                                MESSAGES
                            </div>
                        </div>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>

<div id="csrf" class="d-none">@csrf</div>
<div id="uid" class="d-none">{{ $user->id }}</div>
@endsection