<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env("APP_NAME") }} | {{ isset($page) ? $page->title : "" }}</title>
    <meta name="description" content="{{ isset($page) ? $page->description : "" }}" />
    <meta name="keywords" content="{{ isset($page) ? $page->keywords : "" }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset("/assets/images/".$global[3]->value) }}" type="image/vnd.microsoft.icon" />
    <link rel="canonical" href="{{ env("APP_URL") }}" />
    <link rel="apple-touch-icon" href="{{ asset("/assets/images/apple-touch-icon.png") }}" type="image/png" />
    <link rel="apple-touch-icon-precomposed" href="{{ asset("/assets/images/apple-touch-icon.png") }}" type="image/png" />
    <link rel="stylesheet" href="{{ asset("/assets/css/mds-icons.min.css?ver=".env("APP_VER")) }}" />
    <link rel="stylesheet" href="{{ asset("/assets/css/main.min.css?ver=".env("APP_VER")) }}" />
    <link rel="stylesheet" href="{{ asset("/assets/css/default.min.css?ver=".env("APP_VER")) }}" />
    <link rel="stylesheet" href="{{ asset("/assets/css/gallery.min.css?ver=".env("APP_VER")) }}" />
    <link rel="stylesheet" href="{{ asset("/assets/css/custom.css?ver=".env("APP_VER")) }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <header id="header">

        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-left">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="/rolunk" class="nav-link">{{ __("pageItems.menus.aboutUs") }}</a></li>
                            <li class="nav-item"><a href="/kapcsolat" class="nav-link">{{ __("pageItems.menus.contact") }}</a></li>
                            <li class="nav-item"><a href="{{ route("blog") }}" class="nav-link">{{ __("pageItems.menus.blog") }}</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-right">
                        <ul class="navbar-nav">
                            <!--<li class="nav-item dropdown language-dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    <img src="https://modesy.codingest.com/uploads/blocks/flag_eng.jpg"
                                        class="flag">English<i class="icon-arrow-down"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a href="https://modesy.codingest.com/" class="selected " class="dropdown-item">
                                        <img src="https://modesy.codingest.com/uploads/blocks/flag_eng.jpg"
                                            class="flag">English </a>
                                    <a href="https://modesy.codingest.com/ar/" class=" " class="dropdown-item">
                                        <img src="https://modesy.codingest.com/uploads/blocks/flag_5fbb6bf30fe0f5-01640227-56526743.jpg"
                                            class="flag">Arabic </a>
                                </div>
                            </li>-->
                            
                            @if ( Auth::user() )
                                <li class="nav-item dropdown profile-dropdown p-r-0">
                                    <a class="nav-link dropdown-toggle a-profile" data-toggle="dropdown"
                                        href="javascript:void(0)" aria-expanded="false">
                                        @if ( Auth::user()->avatar )
                                            <img src="/uploads/{{ Auth::user()->slug }}/avatar.png" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}">
                                        @else
                                            <i class="fas fa-user-circle"></i>
                                        @endif
                                        
                                        {{ Auth::user()->name }} <i class="icon-arrow-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if ( Auth::user()->user_role_id=="4" )
                                            <li>
                                                <a href="{{ route("adminDashboard") }}">
                                                    <i class="icon-admin"></i>
                                                    {{ __('pageItems.userMenu.administration') }}
                                                </a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="{{ route("showProfile",Auth::user()->slug) }}">
                                                <i class="icon-user"></i>
                                                {{ __('pageItems.userMenu.profile') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-shopping-basket"></i>
                                                Orders </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-price-tag-o"></i>
                                                Quote Requests </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-download"></i>
                                                Downloads </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-mail"></i>
                                                Messages&nbsp; </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-settings"></i>
                                                Settings </a>
                                        </li>
                                        <li>
                                            <a href="{{ route("logout") }}" class="logout">
                                                <i class="icon-logout"></i>
                                                {{ __("pageItems.userMenu.logout") }}
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            
                            @if ( !Auth::user() )
                                <li class="nav-item">
                                    <a href="{{ route("login") }}" class="nav-link">
                                        {{ __("pageItems.userMenu.loginRegister") }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="nav-top">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-8 nav-top-left">
                                    <div class="row-align-items-center">
                                        <div class="logo">
                                            <a href="/">
                                                <img src="/assets/images/{{ $global[0]->value }}" alt="{{ $global[0]->alt }}" title="{{ $global[0]->title }}">
                                            </a>
                                        </div>
                                        <div class="top-search-bar">
                                            <form action="{{ isset($search_type_data) && $search_type_data=="artist" ? route("searchArtist") : route("searchCreation") }}" class="form_search_main search-form" method="POST" accept-charset="utf-8">
                                                @csrf
                                                @foreach($errors->all() as $error)
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            <li>{{ $error }}</li>
                                                        </ul>
                                                    </div>
                                                @endforeach
                                                <div class="left">
                                                    <div class="dropdown search-select">
                                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            @if ( isset($search_type_data) )
                                                                {{ $search_type_value }}
                                                            @else
                                                                {{ __("pageItems.search.creation") }}
                                                            @endif
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-value="creation" data-label="{{ __("pageItems.search.creation") }}" href="javascript:void(0)">{{ __("pageItems.search.creation") }}</a>
                                                            <a class="dropdown-item" data-value="artist" data-label="{{ __("pageItems.search.artist") }}" href="javascript:void(0)">{{ __("pageItems.search.artist") }}</a>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="search_type_input search_type" name="search_type" value="{{ isset($search_type_data) ? $search_type_data : "creation" }}">
                                                </div>
                                                <div class="right">
                                                    <input
                                                        type="text"
                                                        name="search"
                                                        maxlength="300"
                                                        id="input_search"
                                                        class="form-control input-search"
                                                        placeholder="{{ __("pageItems.search.searchFieldPlaceholder") }}"
                                                        required
                                                        autocomplete="off"
                                                        value="{{ isset($search_value) ? $search_value : "" }}">
                                                    <button  class="btn btn-success text-white btn-search" type="submit"><i class="icon-search"></i></button>
                                                    <div id="response_search_results" class="search-results-ajax"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 nav-top-right">
                                    <!--<a href="{{ route("setlocale","hu") }}"><img src="/assets/images/hu.jpg" style="max-width:50px;"></a>
                                    <a href="{{ route("setlocale","sv") }}"><img src="/assets/images/sv.png" style="max-width:50px;"></a>-->
                                    @if ( !\Auth::check() )
                                        <ul class="nav align-items-center">
                                            <li class="nav-item m-r-0">
                                            <a href="{{ route("register") }}" class="btn btn-md btn-custom btn-sell-now m-r-0">
                                                {{ __("pageItems.registerNow") }}
                                            </a>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-main">
                        <div class="container">
                            <div class="navbar navbar-light navbar-expand">
                                <ul class="nav navbar-nav mega-menu">
                                    @foreach ($parentCategories as $category)
                                        @php
                                            $childCategories = $category->getChilds($category->id);
                                        @endphp

                                        <li class="nav-item {{ count($childCategories)>0 ? 'dropdown' : '' }}" data-category-id="{{ $category->id }}">
                                            <!-- main category -->
                                            <a id="nav_main_category_{{ $category->id }}" href="#" class="nav-link dropdown-toggle nav-main-category" data-id="{{ $category->id }}" data-parent-id="0" data-has-sb="{{ count($childCategories) ? "1" : "0" }}">{{ $category->name }}</a>

                                            @if ( count($childCategories)>0 )
                                                <div id="mega_menu_content_{{ $category->id }}" class="dropdown-menu">
                                                    <div class="row">
                                                        <div class="col-8 menu-subcategories col-category-links">
                                                            <div class="card-columns">
                                                                @foreach ($childCategories as $childCategory)
                                                                    @php
                                                                        $childChildCategories = $childCategory->getChilds($childCategory->id);
                                                                    @endphp
                                                                    <div class="card">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <a id="nav_main_category_{{ $childCategory->id }}"
                                                                                    href="#"
                                                                                    class="second-category nav-main-category"
                                                                                    data-id="{{ $childCategory->id }}"
                                                                                    data-parent-id="{{ $category->id }}"
                                                                                    data-has-sb="{{ count($childChildCategories) ? "1" : "0" }}">{{ $childCategory->name }}</a>
                                                                                @if ( count($childChildCategories)>0 )
                                                                                    <ul>
                                                                                        @foreach ($childChildCategories as $childChildCategory)
                                                                                            <li>
                                                                                                <a id="nav_main_category_{{ $childChildCategory->id }}" href="#" class="nav-main-category" data-id="{{ $childChildCategory->id }}" data-parent-id="{{ $childCategory->id }}" data-has-sb="0">{{ $childChildCategory->name }}</a>
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-4 col-category-images">
                                                            @php
                                                                $categoryImages = $category->getImages($category->id);
                                                            @endphp
                                                            
                                                            @if ( count($categoryImages) )
                                                                @foreach ($categoryImages as $categoryImage)
                                                                    <div class="nav-category-image">
                                                                        <a href="#">
                                                                            <img src="/assets/images/categoryImages/{{ $categoryImage->image }}"
                                                                                data-src="/assets/images/categoryImages/{{ $categoryImage->image }}"
                                                                                alt="{{ $categoryImage->alt }}" title="{{ $categoryImage->title }}" class="lazyload img-fluid">
                                                                            <span>{{ $categoryImage->name }}</span>
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-nav-container">
            <div class="nav-mobile-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="nav-mobile-header-container">
                            <div class="menu-icon">
                                <a href="javascript:void(0)" class="btn-open-mobile-nav"><i class="icon-menu"></i></a>
                            </div>
                            <div class="mobile-logo">
                                <a href="/">
                                    <img src="/assets/images/{{ $global[1]->value }}" alt="{{ $global[1]->alt }}" title="{{ $global[1]->title }}" class="img-fluid">
                                </a>
                            </div>
                            <div class="mobile-search">
                                <a class="search-icon"><i class="icon-search"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="top-search-bar mobile-search-form ">
                            <form action="{{ isset($search_type_data) && $search_type_data=="artist" ? route("searchArtist") : route("searchCreation") }}" method="post" accept-charset="utf-8" class="search-form">
                                @csrf
                                <div class="left">
                                    <div class="dropdown search-select">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                            @if ( isset($search_type_data) )
                                                {{ $search_type_value }}
                                            @else
                                                {{ __("pageItems.search.creation") }}
                                            @endif
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-value="creation" data-label="{{ __("pageItems.search.creation") }}" href="javascript:void(0)">{{ __("pageItems.search.creation") }}</a>
                                            <a class="dropdown-item" data-value="artist" data-label="{{ __("pageItems.search.artist") }}" href="javascript:void(0)">{{ __("pageItems.search.artist") }}</a>
                                        </div>
                                    </div>
                                    <input type="hidden" id="search_type_input_mobile" class="search_type_input search_type" name="search_type" value="{{ isset($search_type_data) ? $search_type_data : "creation" }}">
                                </div>
                                <div class="right">
                                    <input type="text" id="input_search_mobile" name="search" maxlength="300" class="form-control input-search" value="{{ isset($search_value) ? $search_value : "" }}" placeholder="{{ __("pageItems.search.searchFieldPlaceholder") }}" required>
                                    <button class="btn btn-default btn-search" type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="overlay_bg" class="overlay-bg"></div>
    <!--include mobile menu-->
    <div id="navMobile" class="nav-mobile">
        <div class="nav-mobile-inner">
            @if ( !\Auth::check() )
                <div class="row">
                    <div class="col-sm-12 mobile-nav-buttons">
                        <a href="{{ route("register") }}" class="btn btn-md btn-custom btn-block">
                            {{ __("pageItems.registerNow") }}
                        </a>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <div id="navbar_mobile_back_button"></div>
                    <ul id="navbar_mobile_categories" class="navbar-nav">
                        @foreach ($parentCategories as $category)
                            @php
                                $childCategories = $category->getChilds($category->id);
                            @endphp
                            <li class="nav-item">
                                @if ( count($childCategories) )
                                    <a href="javascript:void(0)" class="nav-link" data-id="{{ $category->id }}" data-parent-id="0">
                                        {{ $category->name }}
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                @else
                                    <a href="#" class="nav-link">
                                        {{ $category->name }}
                                    </a>
                                @endif
                                
                            </li>
                        @endforeach
                    </ul>
                    <ul id="navbar_mobile_links" class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{ __("pageItems.menus.aboutUs") }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{ __("pageItems.menus.contact") }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("blog") }}" class="nav-link">
                                {{ __("pageItems.menus.blog") }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{ __("pageItems.menus.privacy_term") }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{ __("pageItems.menus.general_term") }}
                            </a>
                        </li>

                        @if ( !Auth::user() )
                            <li class="nav-item">
                                <a href="{{ route("login") }}" class="nav-link">
                                    {{ __("pageItems.userMenu.loginRegister") }}
                                </a>
                            </li>
                        @else
                            <li class="dropdown profile-dropdown nav-item">
                                <a href="#" class="dropdown-toggle image-profile-drop nav-link mobile-profile" data-toggle="dropdown" aria-expanded="false">
                                    @if ( Auth::user()->avatar )
                                        <img src="/uploads/{{ Auth::user()->slug }}/avatar.png" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}">
                                    @else
                                        <i class="fas fa-user-circle"></i>
                                    @endif
                                    {{ Auth::user()->name }} <span class="icon-arrow-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    @if ( Auth::user()->user_role_id=="4" )
                                        <li>
                                            <a href="{{ route("adminDashboard") }}">
                                                <i class="icon-admin"></i>
                                                {{ __('pageItems.userMenu.administration') }}
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="{{ route("showProfile",Auth::user()->slug) }}">
                                            <i class="icon-user"></i>
                                            {{ __('pageItems.userMenu.profile') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://modesy.codingest.com/orders">
                                            <i class="icon-shopping-basket"></i>
                                            Orders </a>
                                    </li>
                                    <li>
                                        <a href="https://modesy.codingest.com/quote-requests">
                                            <i class="icon-price-tag-o"></i>
                                            Quote Requests </a>
                                    </li>
                                    <li>
                                        <a href="https://modesy.codingest.com/downloads">
                                            <i class="icon-download"></i>
                                            Downloads </a>
                                    </li>
                                    <li>
                                        <a href="https://modesy.codingest.com/messages">
                                            <i class="icon-mail"></i>
                                            Messages&nbsp; </a>
                                    </li>
                                    <li>
                                        <a href="https://modesy.codingest.com/settings/update-profile">
                                            <i class="icon-settings"></i>
                                            Settings </a>
                                    </li>
                                    <li>
                                        <a href="{{ route("logout") }}" class="logout">
                                            <i class="icon-logout"></i>
                                            {{ __("pageItems.userMenu.logout") }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="nav-mobile-footer">
            <ul>
                <li><a href="https://www.facebook.com/" class="facebook"><i class="icon-facebook"></i></a></li>
                <li><a href="https://twitter.com" class="twitter"><i class="icon-twitter"></i></a></li>
                <li><a href="https://www.instagram.com" class="instagram"><i class="icon-instagram"></i></a></li>
                <li><a href="https://www.pinterest.com/" class="pinterest"><i class="icon-pinterest"></i></a></li>
            </ul>
        </div>
    </div>
    <input type="hidden" class="search_type_input" name="search_type" value="product">

    @yield('content')

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-top">
                        <div class="row">
                            <div class="col-12 col-md-3 footer-widget">
                                <div class="row-custom">
                                    <div class="footer-logo">
                                        <a href="/">
                                            <img src="/assets/images/{{ $global[5]->value }}" alt="{{ $global[5]->alt }}" title="{{ $global[5]->title }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="row-custom">
                                    <div class="footer-about">
                                        {{ $global[6]->value }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 footer-widget">
                                <div class="nav-footer">
                                    <div class="row-custom">
                                        <h4 class="footer-title">{{ __("pageItems.menus.linksTitle") }}</h4>
                                    </div>
                                    <div class="row-custom">
                                        <ul>
                                            <li><a href="/">{{ __("pageItems.menus.home") }}</a></li>
                                            <li><a href="{{ route("blog") }}">{{ __("pageItems.menus.blog") }}</a></li>
                                            <li><a href="/kapcsolat">{{ __("pageItems.menus.contact") }}</a></li>
                                            <li><a href="/rolunk">{{ __("pageItems.menus.aboutUs") }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 footer-widget">
                                <div class="nav-footer">
                                    <div class="row-custom">
                                        <h4 class="footer-title">{{ __("pageItems.menus.informationTitle") }}</h4>
                                    </div>
                                    <div class="row-custom">
                                        <ul>
                                            <li><a href="/felhasznalasi-feltetelek">{{ __("pageItems.menus.privacy_term") }}</a></li>
                                            <li><a href="/adatkezelesi-tajekoztato">{{ __("pageItems.menus.general_term") }}</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 footer-widget">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="footer-title">{{ __("pageItems.footer.followUs") }}</h4>
                                        <div class="footer-social-links">
                                            <!--include social links-->

                                            <ul>
                                                <li>
                                                    <a href="{{ $global[8]->value }}" class="facebook">
                                                      <i class="icon-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ $global[9]->value }}" class="twitter">
                                                        <i class="icon-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ $global[10]->value }}" class="instagram">
                                                        <i class="icon-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ $global[11]->value }}" class="pinterest">
                                                        <i class="icon-pinterest"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="newsletter">
                                            <h4 class="footer-title">{{ __("pageItems.footer.newsLetter.title") }}</h4>
                                            <form action="#" id="form_validate_newsletter" method="post" accept-charset="utf-8">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="newsletter-inner">
                                                            <div class="d-table-cell">
                                                                <input type="email" class="form-control" name="email" placeholder="{{ __("pageItems.footer.newsLetter.emailFieldPlaceholder") }}" required>
                                                            </div>
                                                            <div class="d-table-cell align-middle">
                                                                <button class="btn btn-default">{{ __("pageItems.footer.newsLetter.subscribeButton") }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="footer-bottom">
                    <div class="container">
                        <div class="copyright">
                            {{ $global[7]->value }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scroll Up Link -->
    <a href="javascript:void(0)" class="scrollup"><i class="icon-arrow-up"></i></a>


    <script src="{{ asset("/assets/js/gallery.min.js?ver=".env("APP_VER")) }}"></script>
    <script src="{{ asset("/assets/js/popper.min.js?ver=".env("APP_VER")) }}"></script>
    <script src="{{ asset("/assets/js/bootstrap.min.js?ver=".env("APP_VER")) }}"></script>
    <script src="{{ asset("/assets/js/plugins.js?ver=".env("APP_VER")) }}"></script>
    <script src="{{ asset("/assets/js/script.min.js?ver=".env("APP_VER")) }}"></script>
    <script src="{{ asset("/assets/js/main.js?ver=".env("APP_VER")) }}"></script>
    <script src="https://kit.fontawesome.com/a00cdb7d90.js"></script>
    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        let app_base_url = "{{ env("APP_URL") }}";
        let searchNoResultText = "{{ __('pageItems.search.validation.noResults') }}";
        let searchArtistURL = "{{ route('searchArtist') }}";
        let searchCreationURL = "{{ route('searchCreation') }}";
    </script>
    @yield('script')
</body>

</html>