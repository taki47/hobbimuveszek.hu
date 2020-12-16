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
                                <div class="row-custom row-profile-username">
                                    <h1 class="username">
                                        <a href="https://modesy.codingest.com/profile/admin"></a>
                                    </h1>
                                </div>
                                <div class="row-custom">
                                    <p class="p-last-seen">
                                        <span class="last-seen last-seen-{{ $user->isOnline() ? 'online' : 'offline' }}"> <i class="icon-circle"></i>
                                            {{ __("profile.lastLogin") }}
                                            @if ( $user->last_login )
                                            {{ Jenssegers\Date\Date::parse($user->last_login)->format('Y. F d.') }}
                                            @else
                                                {{ __("profile.lastLoginNever") }}
                                            @endif
                                        </span>
                                    </p>
                                </div>
                                <div class="row-custom">
                                    <p class="description">
                                    </p>
                                </div>

                                <div class="row-custom user-contact">
                                    <span class="info">
                                        {{ __("profile.memberSince") }}
                                        {{ Jenssegers\Date\Date::parse($user->created_at)->format('Y. F d.') }}
                                    </span>
                                    @if ( $user->phone )
                                        <span class="info"><i class="icon-phone"></i>
                                            <div id="phone-spinner" class="d-none"><span class="loader"><span class="loader-box"></span><span class="loader-box"></span><span class="loader-box"></span></span></div>
                                            
                                            <div class="d-inline-block showButtonContainer" id="show_phone_number">
                                                <button class="g-recaptcha" data-sitekey="{{ env("GCAPTCHA_SITE_KEY") }}" data-callback="getPhoneNumber">
                                                    {{ __("profile.show") }}
                                                </button>
                                            </div>
                                            
                                            <!--<a href="javascript:void(0)" id="show_phone_number" class="d-inline-block">
                                                {{ __("profile.show") }}
                                            </a>-->
                                        </span>
                                    @endif
                                    
                                    <span class="info">
                                        <i class="icon-envelope"></i>
                                        
                                        <div id="email-spinner" class="d-none"><span class="loader"><span class="loader-box"></span><span class="loader-box"></span><span class="loader-box"></span></span></div>
                                        <div class="d-inline-block showButtonContainer" id="show_email_address">
                                            <button class="g-recaptcha" data-sitekey="{{ env("GCAPTCHA_SITE_KEY") }}" data-callback="getEmailAddress">
                                                {{ __("profile.show") }}
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
                                    <div class="buttons">
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
                <div class="profile-tabs">
                    <ul class="nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="https://modesy.codingest.com/profile/admin">
                                <span>Products</span>
                                <span class="count">(26)</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="https://modesy.codingest.com/wishlist/admin">
                                <span>Wishlist</span>
                                <span class="count">(5)</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="https://modesy.codingest.com/downloads">
                                <span>Downloads</span>
                                <span class="count">(7)</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="https://modesy.codingest.com/followers/admin">
                                <span>Followers</span>
                                <span class="count">(1)</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="https://modesy.codingest.com/following/admin">
                                <span>Following</span>
                                <span class="count">(7)</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="https://modesy.codingest.com/reviews/admin">
                                <span>Reviews</span>
                                <span class="count">(2)</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="row-custom">
                    <!--Include banner-->
                    <!--print sidebar banner-->




                </div>

            </div>
            <div class="col-sm-12 col-md-9">
                <div class="profile-tab-content">
                    <div class="row row-product-items row-product">
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="44"></a>
                                    <div class="img-product-container">
                                        <a
                                            href="https://modesy.codingest.com/womens-ankle-boot-with-different-colors-44">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd29048dd613-00010505-98816045.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd29048dd613-00010505-98816045.jpg"
                                                alt="Women's ankle boot with different colors"
                                                class="img-fluid img-product ls-is-cached lazyloaded">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd290beb6919-60220682-93963996.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd290beb6919-60220682-93963996.jpg"
                                                alt="Women's ankle boot with different colors"
                                                class="img-fluid img-product img-second lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="44"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a
                                            href="https://modesy.codingest.com/womens-ankle-boot-with-different-colors-44">Women's
                                            ankle boot with different colors</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>56</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="42"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/navy-polka-dot-dress-42">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd23a9dc08a5-50988111-96549491.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd23a9dc08a5-50988111-96549491.jpg"
                                                alt="Navy polka dot dress" class="img-fluid img-product lazyloaded">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd23b3143086-87883485-44102904.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd23b3143086-87883485-44102904.jpg"
                                                alt="Navy polka dot dress"
                                                class="img-fluid img-product img-second lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="42"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge badge-dark badge-promoted">Featured</span>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/navy-polka-dot-dress-42">Navy polka dot
                                            dress</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>1</span>
                                    </div>
                                    <div class="item-meta">
                                        <del class="discount-original-price">
                                            <span>$</span>99 </del>
                                        <span class="price"><span>$</span>69.30</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="40"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/modern-grey-couch-and-pillowsg-40">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd1fa72f1171-75060829-27916481.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd1fa72f1171-75060829-27916481.jpg"
                                                alt="Modern grey couch and pillows"
                                                class="img-fluid img-product lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="40"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge badge-dark badge-promoted">Featured</span>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/modern-grey-couch-and-pillowsg-40">Modern
                                            grey couch and pillows</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>299</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="38"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/women-kipling-bailey-saddle-handbag-38">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd0d4f4f58d5-00931623-74345364.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd0d4f4f58d5-00931623-74345364.jpg"
                                                alt="Women kipling bailey saddle handbag"
                                                class="img-fluid img-product lazyloaded">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd0d43d0ccd6-58673782-44342539.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd0d43d0ccd6-58673782-44342539.jpg"
                                                alt="Women kipling bailey saddle handbag"
                                                class="img-fluid img-product img-second lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="38"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge badge-dark badge-promoted">Featured</span>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/women-kipling-bailey-saddle-handbag-38">Women
                                            kipling bailey saddle handbag</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <del class="discount-original-price">
                                            <span>$</span>49 </del>
                                        <span class="price"><span>$</span>46.55</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="36"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/animal-colorful-digital-prints-36">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc5575ee475-30616963-75102995.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc5575ee475-30616963-75102995.jpg"
                                                alt="Animal colorful digital prints"
                                                class="img-fluid img-product lazyloaded">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc5503df352-20303052-61582754.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc5503df352-20303052-61582754.jpg"
                                                alt="Animal colorful digital prints"
                                                class="img-fluid img-product img-second lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="36"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge badge-dark badge-promoted">Featured</span>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/animal-colorful-digital-prints-36">Animal
                                            colorful digital prints</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <del class="discount-original-price">
                                            <span>$</span>11.90 </del>
                                        <span class="price"><span>$</span>10.12</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="35"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/seychelles-womens-brown-ankle-bootie-35">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc4b05fd1f9-90975091-24998747.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc4b05fd1f9-90975091-24998747.jpg"
                                                alt="Seychelles women's brown ankle bootie"
                                                class="img-fluid img-product lazyloaded">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc4a717c576-68908874-15999311.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc4a717c576-68908874-15999311.jpg"
                                                alt="Seychelles women's brown ankle bootie"
                                                class="img-fluid img-product img-second ls-is-cached lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="35"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/seychelles-womens-brown-ankle-bootie-35">Seychelles
                                            women's brown ankle bootie</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <a href="https://modesy.codingest.com/seychelles-womens-brown-ankle-bootie-35"
                                            class="a-meta-request-quote">Request a Quote</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="33"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/ship-illustration-royalty-free-image-33">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc142101ea1-98163083-40344738.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc142101ea1-98163083-40344738.jpg"
                                                alt="Ship illustration royalty free image"
                                                class="img-fluid img-product ls-is-cached lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="33"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/ship-illustration-royalty-free-image-33">Ship
                                            illustration royalty free image</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>9.90</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="32"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/men-outerwear-navy-color-32">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcbf66bc19e6-48564138-57557701.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcbf66bc19e6-48564138-57557701.jpg"
                                                alt="Men outerwear navy color"
                                                class="img-fluid img-product ls-is-cached lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="32"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/men-outerwear-navy-color-32">Men outerwear
                                            navy color</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <del class="discount-original-price">
                                            <span>$</span>99 </del>
                                        <span class="price"><span>$</span>84.15</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                        data-product-id="30"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/animation-of-popular-vacation-spots-30">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcbd3517f815-83697916-95635151.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcbd3517f815-83697916-95635151.jpg"
                                                alt="Animation of popular vacation spots"
                                                class="img-fluid img-product ls-is-cached lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="30"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/animation-of-popular-vacation-spots-30">Animation
                                            of popular vacation spots</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>1</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>8.90</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                        data-product-id="29"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/futuristic-landscape-animation-29">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcbc82ad5777-93614339-49143898.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcbc82ad5777-93614339-49143898.jpg"
                                                alt="Futuristic landscape animation"
                                                class="img-fluid img-product ls-is-cached lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="29"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/futuristic-landscape-animation-29">Futuristic
                                            landscape animation</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>1</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price-free">Free</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="28"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/mens-sport-shoe-28">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcbb9562bb63-82868344-77756087.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcbb9562bb63-82868344-77756087.jpg"
                                                alt="Men's sport shoe"
                                                class="img-fluid img-product ls-is-cached lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="28"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/mens-sport-shoe-28">Men's sport shoe</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <del class="discount-original-price">
                                            <span>$</span>49 </del>
                                        <span class="price"><span>$</span>44.10</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="26"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/adidas-daily-unisex-shoes-26">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcb6a21b4331-41670683-73156524.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcb6a21b4331-41670683-73156524.jpg"
                                                alt="Adidas daily unisex shoes"
                                                class="img-fluid img-product ls-is-cached lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="26"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/adidas-daily-unisex-shoes-26">Adidas daily
                                            unisex shoes</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>49</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="24"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/motivation-piano-with-cello-and-drums-24">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc9fa125df01-11906965-30878631.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc9fa125df01-11906965-30878631.jpg"
                                                alt="Motivation piano with cello and drums"
                                                class="img-fluid img-product ls-is-cached lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="24"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/motivation-piano-with-cello-and-drums-24">Motivation
                                            piano with cello and drums</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>19</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="22"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/adorable-animals-photo-pack-22">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc9c18ecbc08-67066957-65728559.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc9c18ecbc08-67066957-65728559.jpg"
                                                alt="Adorable animals photo pack"
                                                class="img-fluid img-product ls-is-cached lazyloaded">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc9c25e23df9-13733811-14119285.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc9c25e23df9-13733811-14119285.jpg"
                                                alt="Adorable animals photo pack"
                                                class="img-fluid img-product img-second ls-is-cached lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="22"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge badge-dark badge-promoted">Featured</span>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/adorable-animals-photo-pack-22">Adorable
                                            animals photo pack</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>19</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="20"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/animation-of-a-cyclist-moving-fast-20">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc9a82c35a95-54856537-76044207.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc9a82c35a95-54856537-76044207.jpg"
                                                alt="Animation of a cyclist moving fast"
                                                class="img-fluid img-product ls-is-cached lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="20"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/animation-of-a-cyclist-moving-fast-20">Animation
                                            of a cyclist moving fast</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>9.90</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="18"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/women-casual-dress-18">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc95a53a3518-30649342-91186313.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc95a53a3518-30649342-91186313.jpg"
                                                alt="Women casual dress"
                                                class="img-fluid img-product ls-is-cached lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="18"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/women-casual-dress-18">Women casual
                                            dress</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>1</span>
                                    </div>
                                    <div class="item-meta">
                                        <del class="discount-original-price">
                                            <span>$</span>69 </del>
                                        <span class="price"><span>$</span>55.20</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="17"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/moment-of-inspiration-piano-music-17">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc94d0930558-24316749-48720068.jpg"
                                                alt="Moment of inspiration piano music"
                                                class="lazyload img-fluid img-product">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="17"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge badge-dark badge-promoted">Featured</span>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/moment-of-inspiration-piano-music-17">Moment
                                            of inspiration piano music</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>15</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="15"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/women-vintage-collage-art-design-15">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc92608ec880-38956588-90513060.jpg"
                                                alt="Women vintage collage art design"
                                                class="lazyload img-fluid img-product">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="15"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/women-vintage-collage-art-design-15">Women
                                            vintage collage art design</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <del class="discount-original-price">
                                            <span>$</span>14.90 </del>
                                        <span class="price"><span>$</span>11.92</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="14"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/sun-hat-for-women-protection-cap-14">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc915ce2aa22-34012151-98072943.jpg"
                                                alt="Sun hat for women protection cap"
                                                class="lazyload img-fluid img-product">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="14"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge badge-dark badge-promoted">Featured</span>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/sun-hat-for-women-protection-cap-14">Sun
                                            hat for women protection cap</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>1</span>
                                    </div>
                                    <div class="item-meta">
                                        <del class="discount-original-price">
                                            <span>$</span>29 </del>
                                        <span class="price"><span>$</span>20.30</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="12"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/light-blue-women-shirt-12">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc8fa807ae22-23197543-40847643.jpg"
                                                alt="Light blue women shirt" class="lazyload img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc8fac423be5-26867005-94627778.jpg"
                                                alt="Light blue women shirt"
                                                class="lazyload img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="12"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/light-blue-women-shirt-12">Light blue
                                            women shirt</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>34</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="10"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/women-red-casual-dress-10">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc8de5eb58a6-54144028-51780136.jpg"
                                                alt="Women red casual dress" class="lazyload img-fluid img-product">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="10"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/women-red-casual-dress-10">Women red
                                            casual dress</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>1</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>69</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="8"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/handmade-cute-handbag-8">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc8c7340b9d1-03320308-33869891.jpg"
                                                alt="Handmade cute handbag" class="lazyload img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc8c7c6bc671-32493028-68488086.jpg"
                                                alt="Handmade cute handbag"
                                                class="lazyload img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="8"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge badge-dark badge-promoted">Featured</span>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/handmade-cute-handbag-8">Handmade cute
                                            handbag</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>36</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="6"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/women-black-leather-handbag-6">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc82cd7505d2-40858022-90168752.jpg"
                                                alt="Women black leather handbag"
                                                class="lazyload img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc82d3216457-67614137-72972769.jpg"
                                                alt="Women black leather handbag"
                                                class="lazyload img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="6"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/women-black-leather-handbag-6">Women black
                                            leather handbag</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>39</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="3"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/varient-news-magazine-script-3">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc7e0f6b9c44-35183826-27753453.jpg"
                                                alt="Varient - News &amp; Magazine Script"
                                                class="lazyload img-fluid img-product">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="3"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/varient-news-magazine-script-3">Varient -
                                            News &amp; Magazine Script</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/admin">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>1</span>
                                    </div>
                                    <div class="item-meta">
                                        <span class="price"><span>$</span>45</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="product-list-pagination">
                    <ul class="pagination">
                        <li class="disabled"></li>
                        <li class="active page-num"><a href="#">1<span class="sr-only"></span></a></li>
                        <li class="page-num"><a href="https://modesy.codingest.com/profile/admin?page=2"
                                data-ci-pagination-page="2">2</a></li>
                        <li class="next"><a href="https://modesy.codingest.com/profile/admin?page=2"
                                data-ci-pagination-page="2" rel="next">›</a></li>
                    </ul>
                </div>
                <div class="row-custom">
                    <!--print banner-->


                </div>
                <div id="csrf" class="d-none">@csrf</div>
                <div id="uid" class="d-none">{{ $user->id }}</div>
            </div>
        </div>
    </div>
</div>
@endsection