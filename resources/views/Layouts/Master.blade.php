<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gallery page</title>
    <meta name="description" content="Gallery page" />
    <meta name="keywords" content="index, home" />
    <link rel="shortcut icon" href="{{ asset("/assets/images/favicon.ico") }}" type="image/vnd.microsoft.icon" />
    <link rel="canonical" href="{{ env("APP_URL") }}" />
    <link rel="shortlink" href="{{ env("APP_URL") }}" />
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
                            <li class="nav-item"><a href="#" class="nav-link">Rólunk</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Kapcsolat</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
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
                                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}">
                                        @else
                                            <i class="fas fa-user-circle"></i>
                                        @endif
                                        
                                        {{ Auth::user()->name }} <i class="icon-arrow-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">
                                                <i class="icon-admin"></i>
                                                Admin Panel </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-dashboard"></i>
                                                Dashboard </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-user"></i>
                                                Profile </a>
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
                                                Kijelentkezés </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            
                            @if ( !Auth::user() )
                                <li class="nav-item">
                                    <a href="{{ route("login") }}" class="nav-link">
                                    Bejelentkezés / Regisztráció
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
                                                <img src="/assets/images/logo.jpg" alt="Hobbiművészek" title="Hobbiművészek">
                                            </a>
                                        </div>
                                        <div class="top-search-bar">
                                            <form action="#" id="form_validate_search"
                                                class="form_search_main" method="get" accept-charset="utf-8">
                                                <div class="left">
                                                    <div class="dropdown search-select">
                                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                            Alkotás
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-value="product"
                                                                href="javascript:void(0)">Alkotás</a>
                                                            <a class="dropdown-item" data-value="member"
                                                                href="javascript:void(0)">Művész</a>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="search_type_input" name="search_type" value="product">
                                                </div>
                                                <div class="right">
                                                    <input type="text" name="search" maxlength="300" pattern=".*\S+.*"
                                                        id="input_search" class="form-control input-search" value=""
                                                        placeholder="Keresés alkotásra vagy művész nevére" required
                                                        autocomplete="off">
                                                    <button class="btn btn-default btn-search"><i class="icon-search"></i></button>
                                                    <div id="response_search_results" class="search-results-ajax"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 nav-top-right">
                                    <ul class="nav align-items-center">
                                        <li class="nav-item m-r-0">
                                          <a href="{{ route("register") }}" class="btn btn-md btn-custom btn-sell-now m-r-0">
                                            Csatlakozz hozzánk még ma
                                          </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-main">
                        <div class="container">
                            <div class="navbar navbar-light navbar-expand">
                                <ul class="nav navbar-nav mega-menu">
                                    <li class="nav-item dropdown" data-category-id="1">
                                        <a id="nav_main_category_1" href="#" class="nav-link dropdown-toggle nav-main-category" data-id="1" data-parent-id="0" data-has-sb="1">
                                          Festészet
                                        </a>
                                        <div id="mega_menu_content_1" class="dropdown-menu">
                                            <div class="row">
                                                <div class="col-8 menu-subcategories col-category-links">
                                                    <div class="card-columns">
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                   <a id="nav_main_category_25"
                                                                        href="#"
                                                                        class="second-category nav-main-category"
                                                                        data-id="11" data-parent-id="1"
                                                                        data-has-sb="1">Típusok</a>
                                                                    <ul>
                                                                        <li><a id="nav_main_category_111"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="111"
                                                                                data-parent-id="11"
                                                                                data-has-sb="0">Akvarell</a></li>
                                                                        <li><a id="nav_main_category_112"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="112"
                                                                                data-parent-id="11"
                                                                                data-has-sb="0">Enkausztika</a></li>
                                                                        <li><a id="nav_main_category_113"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="113"
                                                                                data-parent-id="11" data-has-sb="0">Freskó</a></li>
                                                                        <li><a id="nav_main_category_114"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="114"
                                                                                data-parent-id="11"
                                                                                data-has-sb="0">Gouache</a></li>
                                                                        <li><a id="nav_main_category_115"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="115"
                                                                                data-parent-id="11"
                                                                                data-has-sb="0">Kéregfestészet</a></li>
                                                                        <li><a id="nav_main_category_116"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="116"
                                                                                data-parent-id="11"
                                                                                data-has-sb="0">Monotípia</a></li>
                                                                        <li><a id="nav_main_category_117"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="117"
                                                                                data-parent-id="11"
                                                                                data-has-sb="0">Olajfestmény</a></li>
                                                                        <li><a id="nav_main_category_118"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="118"
                                                                                data-parent-id="11"
                                                                                data-has-sb="0">Pasztell</a></li>
                                                                        <li><a id="nav_main_category_119"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="119"
                                                                                data-parent-id="11"
                                                                                data-has-sb="0">Szekkó</a></li>
                                                                        <li><a id="nav_main_category_1110"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="1110"
                                                                                data-parent-id="11"
                                                                                data-has-sb="0">Tempera</a></li>
                                                                        <li><a id="nav_main_category_1111"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="1111"
                                                                                data-parent-id="11"
                                                                                data-has-sb="0">Tusfestés (japán)</a></li>
                                                                        <li><a id="nav_main_category_1112"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="1112"
                                                                                data-parent-id="11"
                                                                                data-has-sb="0">Tűzzománc</a></li>
                                                                        <li><a id="nav_main_category_1113"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="1113"
                                                                                data-parent-id="11"
                                                                                data-has-sb="0">Üvegfestés</a></li>
                                                                  </ul>
                                                              </div>
                                                          </div>
                                                        </div>
                                                        <div class="card">
                                                          <div class="row">
                                                              <div class="col-12">
                                                                  <a id="nav_main_category_12"
                                                                      href="#"
                                                                      class="second-category nav-main-category"
                                                                      data-id="12" data-parent-id="1"
                                                                      data-has-sb="1">Irányzatok</a>
                                                                  <ul>
                                                                      <li><a id="nav_main_category_121"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="121"
                                                                              data-parent-id="12"
                                                                              data-has-sb="0">Bauhaus</a></li>
                                                                      <li><a id="nav_main_category_122"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="122"
                                                                              data-parent-id="12"
                                                                              data-has-sb="0">Barokk</a></li>
                                                                      <li><a id="nav_main_category_123"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="123"
                                                                              data-parent-id="12"
                                                                              data-has-sb="0">Modern</a></li>
                                                                      <li><a id="nav_main_category_124"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="124"
                                                                              data-parent-id="12"
                                                                              data-has-sb="0">Expresszionizmus</a></li>
                                                                      <li><a id="nav_main_category_125"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="125"
                                                                              data-parent-id="12"
                                                                              data-has-sb="0">Impresszionizmus</a></li>
                                                                      <li><a id="nav_main_category_126"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="126"
                                                                              data-parent-id="12"
                                                                              data-has-sb="0">Konstruktivizmus</a></li>
                                                                      <li><a id="nav_main_category_127"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="127"
                                                                              data-parent-id="12"
                                                                              data-has-sb="0">Kubizmus</a></li>
                                                                      <li><a id="nav_main_category_128"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="128"
                                                                              data-parent-id="12"
                                                                              data-has-sb="0">Optical art</a></li>
                                                                  </ul>
                                                              </div>
                                                          </div>
                                                        </div>
                                                        <div class="card">
                                                          <div class="row">
                                                              <div class="col-12">
                                                                  <a id="nav_main_category_13"
                                                                      href="#"
                                                                      class="second-category nav-main-category"
                                                                      data-id="13" data-parent-id="1"
                                                                      data-has-sb="1">Évszakok</a>
                                                                  <ul>
                                                                      <li><a id="nav_main_category_131"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="131"
                                                                              data-parent-id="13"
                                                                              data-has-sb="0">Tavasz</a></li>
                                                                      <li><a id="nav_main_category_132"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="132"
                                                                              data-parent-id="13"
                                                                              data-has-sb="0">Nyár</a></li>
                                                                      <li><a id="nav_main_category_133"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="133"
                                                                              data-parent-id="13"
                                                                              data-has-sb="0">Ősz</a></li>
                                                                      <li><a id="nav_main_category_134"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="134"
                                                                              data-parent-id="13"
                                                                              data-has-sb="0">Tél</a></li>
                                                                  </ul>
                                                              </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 col-category-images">
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/akvarell.jpg"
                                                                data-src="/assets/images/akvarell.jpg"
                                                                alt="Akvarell" class="lazyload img-fluid">
                                                            <span>Akvarell</span>
                                                        </a>
                                                    </div>
                                                    <div class="nav-category-image">
                                                      <a href="#">
                                                          <img src="/assets/images/enkausztika.jfif"
                                                              data-src="/assets/images/enkausztika.jfif"
                                                              alt="Enkausztika" class="lazyload img-fluid">
                                                          <span>Enkausztika</span>
                                                      </a>
                                                    </div>
                                                    <div class="nav-category-image">
                                                      <a href="#">
                                                          <img src="/assets/images/pasztell.jpg"
                                                              data-src="/assets/images/pasztell.jpg"
                                                              alt="Pasztell" class="lazyload img-fluid">
                                                          <span>Pasztell</span>
                                                      </a>
                                                    </div>
                                                    <div class="nav-category-image">
                                                      <a href="#">
                                                          <img src="/assets/images/tempera.jpg"
                                                              data-src="/assets/images/tempera.jpg"
                                                              alt="Tempera" class="lazyload img-fluid">
                                                          <span>Tempera</span>
                                                      </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown" data-category-id="2">
                                        <a id="nav_main_category_2" href="#" class="nav-link dropdown-toggle nav-main-category" data-id="2" data-parent-id="0" data-has-sb="1">
                                          Rajz, Grafikák
                                        </a>
                                        <div id="mega_menu_content_2" class="dropdown-menu">
                                            <div class="row">
                                                <div class="col-8 menu-subcategories col-category-links">
                                                    <div class="card-columns">
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <a id="nav_main_category_21"
                                                                        href="#"
                                                                        class="second-category nav-main-category"
                                                                        data-id="21" data-parent-id="2"
                                                                        data-has-sb="1">Típusok</a>
                                                                    <ul>
                                                                        <li><a id="nav_main_category_211"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="211"
                                                                                data-parent-id="21"
                                                                                data-has-sb="0">Ceruzarajz</a></li>
                                                                        <li><a id="nav_main_category_212"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="212"
                                                                                data-parent-id="21"
                                                                                data-has-sb="0">Tollrajz</a></li>
                                                                        <li><a id="nav_main_category_213"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="213"
                                                                                data-parent-id="21"
                                                                                data-has-sb="0">Krétarajz</a></li>
                                                                        <li><a id="nav_main_category_214"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="214"
                                                                                data-parent-id="21"
                                                                                data-has-sb="0">Karcrajz</a></li>
                                                                        <li><a id="nav_main_category_215"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="215"
                                                                                data-parent-id="21"
                                                                                data-has-sb="0">Pasztell</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                          <div class="row">
                                                              <div class="col-12">
                                                                  <a id="nav_main_category_22"
                                                                      href="#"
                                                                      class="second-category nav-main-category"
                                                                      data-id="22" data-parent-id="2"
                                                                      data-has-sb="1">Évszakok</a>
                                                                  <ul>
                                                                      <li><a id="nav_main_category_221"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="221"
                                                                              data-parent-id="22"
                                                                              data-has-sb="0">Tavasz</a></li>
                                                                      <li><a id="nav_main_category_222"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="222"
                                                                              data-parent-id="22"
                                                                              data-has-sb="0">Nyár</a></li>
                                                                      <li><a id="nav_main_category_223"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="223"
                                                                              data-parent-id="22"
                                                                              data-has-sb="0">Ősz</a></li>
                                                                      <li><a id="nav_main_category_224"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="224"
                                                                              data-parent-id="22"
                                                                              data-has-sb="0">Tél</a></li>
                                                                  </ul>
                                                              </div>
                                                          </div>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 col-category-images">
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/ceruzarajz.jpg"
                                                                data-src="/assets/images/ceruzarajz.jpg"
                                                                alt="Ceruzarajz" class="lazyload img-fluid">
                                                            <span>Ceruzarajz</span>
                                                        </a>
                                                    </div>
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/karcrajz.jpg"
                                                                data-src="/assets/images/karcrajz.jpg"
                                                                alt="Karcrajz" class="lazyload img-fluid">
                                                            <span>Karcrajz</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item" data-category-id="3">
                                        <a id="nav_main_category_3" href="#" class="nav-link nav-main-category" data-id="3" data-parent-id="0" data-has-sb="1">
                                          Képversek
                                        </a>
                                    </li>
                                    <li class="nav-item" data-category-id="4">
                                        <a id="nav_main_category_4" href="#" class="nav-link nav-main-category" data-id="4" data-parent-id="0" data-has-sb="1">
                                          Térbeli képek
                                        </a>
                                    </li>
                                    <li class="nav-item dropdown" data-category-id="5">
                                        <a id="nav_main_category_5" href="#" class="nav-link nav-main-category" data-id="5" data-parent-id="0" data-has-sb="1">
                                          Szobrászat
                                        </a>
                                        <div id="mega_menu_content_5" class="dropdown-menu">
                                            <div class="row">
                                                <div class="col-8 menu-subcategories col-category-links">
                                                    <div class="card-columns">
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <a id="nav_main_category_51"
                                                                        href="#"
                                                                        class="second-category nav-main-category"
                                                                        data-id="51" data-parent-id="5"
                                                                        data-has-sb="1">Típusok</a>
                                                                    <ul>
                                                                        <li><a id="nav_main_category_511"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="511"
                                                                                data-parent-id="51"
                                                                                data-has-sb="0">Monumentális szobrászat</a></li>
                                                                        <li><a id="nav_main_category_512"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="512"
                                                                                data-parent-id="51"
                                                                                data-has-sb="0">Kisplasztika</a></li>
                                                                        <li><a id="nav_main_category_513"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="513"
                                                                                data-parent-id="51"
                                                                                data-has-sb="0">Portrészobrászat</a></li>
                                                                        <li><a id="nav_main_category_514"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="514"
                                                                                data-parent-id="51"
                                                                                data-has-sb="0">Aktszobrászat</a></li>
                                                                        <li><a id="nav_main_category_515"
                                                                                  href="#"
                                                                                  class="nav-main-category " data-id="515"
                                                                                  data-parent-id="51"
                                                                                  data-has-sb="0">Állatszobrászat</a></li>
                                                                        <li><a id="nav_main_category_516"
                                                                                  href="#"
                                                                                  class="nav-main-category " data-id="516"
                                                                                  data-parent-id="51"
                                                                                  data-has-sb="0">Épületplasztika</a></li>
                                                                        <li><a id="nav_main_category_517"
                                                                                  href="#"
                                                                                  class="nav-main-category " data-id="517"
                                                                                  data-parent-id="51"
                                                                                  data-has-sb="0">Díszitőszobrászat</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 col-category-images">
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/kisplasztika.jpg"
                                                                data-src="/assets/images/kisplasztika.jpg"
                                                                alt="Kisplasztika"
                                                                class="lazyload img-fluid">
                                                            <span>Kisplasztika</span>
                                                        </a>
                                                    </div>
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/allatszobraszat.jpg"
                                                                data-src="/assets/images/allatszobraszat.jpg"
                                                                alt="Állatszobrászat" class="lazyload img-fluid">
                                                            <span>Állatszobrászat</span>
                                                        </a>
                                                    </div>
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/epuletplasztika.jpg"
                                                                data-src="/assets/images/epuletplasztika.jpg"
                                                                alt="Épületplasztika" class="lazyload img-fluid">
                                                            <span>Épületplasztika</span>
                                                        </a>
                                                    </div>
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/diszitoszobraszat.jpg"
                                                                data-src="/assets/images/diszitoszobraszat.jpg"
                                                                alt="Díszitőszobrászat" class="lazyload img-fluid">
                                                            <span>Díszitőszobrászat</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown" data-category-id="6">
                                        <a id="nav_main_category_6" href="#" class="nav-link dropdown-toggle nav-main-category" data-id="6" data-parent-id="0" data-has-sb="1">
                                          Iparművészet
                                        </a>
                                        <div id="mega_menu_content_6" class="dropdown-menu">
                                            <div class="row">
                                                <div class="col-8 menu-subcategories col-category-links">
                                                    <div class="card-columns">
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <a id="nav_main_category_28"
                                                                        href="#"
                                                                        class="second-category nav-main-category"
                                                                        data-id="62" data-parent-id="6"
                                                                        data-has-sb="1">Kézművesség</a>
                                                                    <ul>
                                                                        <li><a id="nav_main_category_611"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="611"
                                                                                data-parent-id="61"
                                                                                data-has-sb="0">Agyagművesség</a></li>
                                                                        <li><a id="nav_main_category_612"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="612"
                                                                                data-parent-id="61"
                                                                                data-has-sb="0">Bőrdíszművesség</a></li>
                                                                        <li><a id="nav_main_category_613"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="613"
                                                                                data-parent-id="61"
                                                                                data-has-sb="0">Bútorművesség</a></li>
                                                                        <li><a id="nav_main_category_614"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="614"
                                                                                data-parent-id="61"
                                                                                data-has-sb="0">Fa- és csontfaragás</a></li>
                                                                        <li><a id="nav_main_category_615"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="615"
                                                                                data-parent-id="61"
                                                                                data-has-sb="0">Fémművesség, ötvösművészet</a></li>
                                                                        <li><a id="nav_main_category_616"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="616"
                                                                                data-parent-id="61"
                                                                                data-has-sb="0">Tipográfia</a></li>
                                                                        <li><a id="nav_main_category_617"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="617"
                                                                                data-parent-id="61"
                                                                                data-has-sb="0">Könyvművészet</a></li>
                                                                        <li><a id="nav_main_category_618"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="618"
                                                                                data-parent-id="61"
                                                                                data-has-sb="0">Textilművészet</a></li>
                                                                        <li><a id="nav_main_category_619"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="619"
                                                                                data-parent-id="61"
                                                                                data-has-sb="0">Intarzia</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <a id="nav_main_category_62"
                                                                        href="#"
                                                                        class="second-category nav-main-category"
                                                                        data-id="62" data-parent-id="6"
                                                                        data-has-sb="1">Építészet</a>
                                                                    <ul>
                                                                        <li><a id="nav_main_category_621"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="621"
                                                                                data-parent-id="62"
                                                                                data-has-sb="0">Belsőépítészet</a></li>
                                                                        <li><a id="nav_main_category_622"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="622"
                                                                                data-parent-id="62"
                                                                                data-has-sb="0">Lakberendezés</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <a id="nav_main_category_63"
                                                                        href="#"
                                                                        class="second-category nav-main-category"
                                                                        data-id="63" data-parent-id="6"
                                                                        data-has-sb="1">Ipari formatervezés</a>
                                                                    <ul>
                                                                        <li><a id="nav_main_category_631"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="631"
                                                                                data-parent-id="63"
                                                                                data-has-sb="0">Bútortervezés</a></li>
                                                                        <li><a id="nav_main_category_632"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="632"
                                                                                data-parent-id="63"
                                                                                data-has-sb="0">Ipari terméktervezés, tárgytervezés</a></li>
                                                                        <li><a id="nav_main_category_633"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="633"
                                                                                data-parent-id="63"
                                                                                data-has-sb="0">Üvegművészet</a></li>
                                                                        <li><a id="nav_main_category_634"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="634"
                                                                                data-parent-id="63"
                                                                                data-has-sb="0">Porcelán- és kerámiaedények tervezése</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 col-category-images">
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/uvegmuveszet.jpg"
                                                                data-src="/assets/images/uvegmuveszet.jpg"
                                                                alt="Üvegművészet" class="lazyload img-fluid">
                                                            <span>Üvegművészet</span>
                                                        </a>
                                                    </div>
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/butormuvesseg.jpg"
                                                                data-src="/assets/images/butormuvesseg.jpg"
                                                                alt="Bútorművesség" class="lazyload img-fluid">
                                                            <span>Bútorművesség</span>
                                                        </a>
                                                    </div>
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/intarzia.jpg"
                                                                data-src="/assets/images/intarzia.jpg"
                                                                alt="Intarzia" class="lazyload img-fluid">
                                                            <span>Intarzia</span>
                                                        </a>
                                                    </div>
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/textilmuveszet.jpg"
                                                                data-src="/assets/images/textilmuveszet.jpg"
                                                                alt="Textilművészet" class="lazyload img-fluid">
                                                            <span>Textilművészet</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown" data-category-id="7">
                                        <a id="nav_main_category_7" href="#" class="nav-link dropdown-toggle nav-main-category" data-id="7" data-parent-id="0" data-has-sb="1">
                                          Fényképészet
                                        </a>
                                        <div id="mega_menu_content_7" class="dropdown-menu">
                                            <div class="row">
                                                <div class="col-8 menu-subcategories col-category-links">
                                                    <div class="card-columns">
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <a id="nav_main_category_32"
                                                                        href="#"
                                                                        class="second-category nav-main-category"
                                                                        data-id="71" data-parent-id="7"
                                                                        data-has-sb="1">Típusok</a>
                                                                    <ul>
                                                                        <li><a id="nav_main_category_711"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="711"
                                                                                data-parent-id="71"
                                                                                data-has-sb="0">Akt</a></li>
                                                                        <li><a id="nav_main_category_712"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="712"
                                                                                data-parent-id="71"
                                                                                data-has-sb="0">Street fotózás</a></li>
                                                                        <li><a id="nav_main_category_713"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="713"
                                                                                data-parent-id="71"
                                                                                data-has-sb="0">Tájfotózás</a></li>
                                                                        <li><a id="nav_main_category_714"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="714"
                                                                                data-parent-id="71"
                                                                                data-has-sb="0">Portré</a></li>
                                                                        <li><a id="nav_main_category_715"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="715"
                                                                                data-parent-id="71"
                                                                                data-has-sb="0">Ételfotózás</a></li>
                                                                        <li><a id="nav_main_category_716"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="716"
                                                                                data-parent-id="71"
                                                                                data-has-sb="0">Sportfotózás</a></li>
                                                                        <li><a id="nav_main_category_717"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="717"
                                                                                data-parent-id="71"
                                                                                data-has-sb="0">Időjárásfotózás</a></li>
                                                                        <li><a id="nav_main_category_718"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="718"
                                                                                data-parent-id="71"
                                                                                data-has-sb="0">Épületfotózás</a></li>
                                                                        <li><a id="nav_main_category_719"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="719"
                                                                                data-parent-id="71"
                                                                                data-has-sb="0">Makrófotózás</a></li>
                                                                        <li><a id="nav_main_category_7110"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="7110"
                                                                                data-parent-id="71"
                                                                                data-has-sb="0">Hosszú expozíciós fotózás</a></li>
                                                                        <li><a id="nav_main_category_7111"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="7111"
                                                                                data-parent-id="71"
                                                                                data-has-sb="0">Dokumentumfotógráfia</a></li>
                                                                        <li><a id="nav_main_category_7112"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="7112"
                                                                                data-parent-id="71"
                                                                                data-has-sb="0">Babafotózás</a></li>
                                                                        <li><a id="nav_main_category_7113"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="7113"
                                                                                data-parent-id="71"
                                                                                data-has-sb="0">Divatfotózás</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <a id="nav_main_category_72"
                                                                        href="#"
                                                                        class="second-category nav-main-category"
                                                                        data-id="72" data-parent-id="7"
                                                                        data-has-sb="1">Évszakok, Alkalmak</a>
                                                                    <ul>
                                                                        <li><a id="nav_main_category_721"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="721"
                                                                                data-parent-id="72"
                                                                                data-has-sb="0">Tavasz</a></li>
                                                                        <li><a id="nav_main_category_723"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="723"
                                                                                data-parent-id="72"
                                                                                data-has-sb="0">Nyár</a></li>
                                                                        <li><a id="nav_main_category_724"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="724"
                                                                                data-parent-id="724"
                                                                                data-has-sb="0">Ősz</a></li>
                                                                        <li><a id="nav_main_category_725"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="725"
                                                                                data-parent-id="72"
                                                                                data-has-sb="0">Tél</a></li>
                                                                        <li><a id="nav_main_category_726"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="726"
                                                                                data-parent-id="72"
                                                                                data-has-sb="0">Karácsony</a></li>
                                                                        <li><a id="nav_main_category_727"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="727"
                                                                                data-parent-id="72"
                                                                                data-has-sb="0">Valentin nap</a></li>
                                                                        <li><a id="nav_main_category_728"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="728"
                                                                                data-parent-id="728"
                                                                                data-has-sb="0">Húsvét</a></li>
                                                                        <li><a id="nav_main_category_729"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="729"
                                                                                data-parent-id="72"
                                                                                data-has-sb="0">Pünkösd</a></li>
                                                                        <li><a id="nav_main_category_7210"
                                                                                href="#"
                                                                                class="nav-main-category " data-id="7210"
                                                                                data-parent-id="72"
                                                                                data-has-sb="0">Nemzeti ünnepek</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                          <div class="row">
                                                              <div class="col-12">
                                                                  <a id="nav_main_category_73"
                                                                      href="#"
                                                                      class="second-category nav-main-category"
                                                                      data-id="73" data-parent-id="7"
                                                                      data-has-sb="1">Pillanatok</a>
                                                                  <ul>
                                                                      <li><a id="nav_main_category_731"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="731"
                                                                              data-parent-id="73"
                                                                              data-has-sb="0">Születésnap, névnap</a></li>
                                                                      <li><a id="nav_main_category_732"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="732"
                                                                              data-parent-id="73"
                                                                              data-has-sb="0">Esküvő</a></li>
                                                                      <li><a id="nav_main_category_733"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="733"
                                                                              data-parent-id="73"
                                                                              data-has-sb="0">Keresztelő</a></li>
                                                                      <li><a id="nav_main_category_734"
                                                                              href="#"
                                                                              class="nav-main-category " data-id="734"
                                                                              data-parent-id="73"
                                                                              data-has-sb="0">Temetés, búcsúztatás</a></li>
                                                                  </ul>
                                                              </div>
                                                          </div>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 col-category-images">
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/tajfotozas.jpg"
                                                                data-src="/assets/images/tajfotozas.jpg"
                                                                alt="Tájfotózás" class="lazyload img-fluid">
                                                            <span>Tájfotózás</span>
                                                        </a>
                                                    </div>
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/idojarasfotozas.jpg"
                                                                data-src="/assets/images/idojarasfotozas.jpg"
                                                                alt="Időjárásfotózás" class="lazyload img-fluid">
                                                            <span>Időjárásfotózás</span>
                                                        </a>
                                                    </div>
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/husvetfoto.jpg"
                                                                data-src="/assets/images/husvetfoto.jpg"
                                                                alt="Húsvéti fotózás" class="lazyload img-fluid">
                                                            <span>Húsvéti fotózás</span>
                                                        </a>
                                                    </div>
                                                    <div class="nav-category-image">
                                                        <a href="#">
                                                            <img src="/assets/images/makrofotozas.jpg"
                                                                data-src="/assets/images/makrofotozas.jpg"
                                                                alt="Makrófotózás" class="lazyload img-fluid">
                                                            <span>Makrófotózás</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
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
                                    <img src="/assets/images/logo.jpg" alt="Hobbiművészek" class="Hobbiművészek"></a>
                            </div>
                            <div class="mobile-search">
                                <a class="search-icon"><i class="icon-search"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="top-search-bar mobile-search-form ">
                            <form action="#" id="form_validate_search_mobile"
                                method="get" accept-charset="utf-8">
                                <div class="left">
                                    <div class="dropdown search-select">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                            Alkotás
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-value="product" href="javascript:void(0)">Alkotás</a>
                                            <a class="dropdown-item" data-value="member" href="javascript:void(0)">Művész</a>
                                        </div>
                                    </div>
                                    <input type="hidden" id="search_type_input_mobile" class="search_type_input" name="search_type" value="product">
                                </div>
                                <div class="right">
                                    <input type="text" id="input_search_mobile" name="search" maxlength="300" pattern=".*\S+.*" class="form-control input-search" value="" placeholder="Keresés" required>
                                    <button class="btn btn-default btn-search"><i class="icon-search"></i></button>
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
            <div class="row">
                <div class="col-sm-12 mobile-nav-buttons">
                    <a href="{{ route("register") }}" class="btn btn-md btn-custom btn-block">
                        Csatlakozz hozzánk még ma
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="navbar_mobile_back_button"></div>
                    <ul id="navbar_mobile_categories" class="navbar-nav">
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link" data-id="1" data-parent-id="0">
                                Festészet
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link" data-id="2" data-parent-id="0">
                                Rajz, Grafikák
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-id="3" data-parent-id="0">
                                Képversek
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-id="4" data-parent-id="0">
                                Térbeli képek
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link" data-id="5" data-parent-id="0">
                                Szobrászat
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link" data-id="6" data-parent-id="0">
                                Iparművészet
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link" data-id="7" data-parent-id="0">
                                Fényképészet
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                    <ul id="navbar_mobile_links" class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Rólunk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Kapcsolat
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Blog
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Felhasználási feltételek
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Adatkezelési tájékoztató
                            </a>
                        </li>

                        @if ( !Auth::user() )
                            <li class="nav-item">
                                <a href="{{ route("login") }}" class="nav-link">
                                    Bejelentkezés / Regisztráció
                                </a>
                            </li>
                        @else
                            <li class="dropdown profile-dropdown nav-item">
                                <a href="#" class="dropdown-toggle image-profile-drop nav-link mobile-profile" data-toggle="dropdown" aria-expanded="false">
                                    @if ( Auth::user()->avatar )
                                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}">
                                    @else
                                        <i class="fas fa-user-circle"></i>
                                    @endif
                                    {{ Auth::user()->name }} <span class="icon-arrow-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="https://modesy.codingest.com/admin/">
                                            <i class="icon-admin"></i>
                                            Admin Panel </a>
                                    </li>
                                    <li>
                                        <a href="https://modesy.codingest.com/dashboard/">
                                            <i class="icon-dashboard"></i>
                                            Dashboard </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-user"></i>
                                            Profile </a>
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
                                            Kijelentkezés </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        <!--
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Language </a>
                            <ul class="mobile-language-options">
                                <li>
                                    <a href="https://modesy.codingest.com/" class="selected ">
                                        English </a>
                                </li>
                                <li>
                                    <a href="https://modesy.codingest.com/ar/" class=" ">
                                        Arabic </a>
                                </li>
                            </ul>
                        </li>
                        -->
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
    </div><input type="hidden" class="search_type_input" name="search_type" value="product">

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
                                            <img src="/assets/images/logo.jpg" alt="Amatőrművészek" title="Amatőrművészek">
                                        </a>
                                    </div>
                                </div>
                                <div class="row-custom">
                                    <div class="footer-about">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ullamcorper facilisis elit sed malesuada. Nullam varius arcu mauris. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque cursus placerat arcu, vel faucibus nisl suscipit vel. Ut lorem massa, sodales non maximus ac, congue sed felis.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 footer-widget">
                                <div class="nav-footer">
                                    <div class="row-custom">
                                        <h4 class="footer-title">Linkek</h4>
                                    </div>
                                    <div class="row-custom">
                                        <ul>
                                            <li><a href="#">Főoldal</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Kapcsolat</a></li>
                                            <li><a href="#">Rólunk</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 footer-widget">
                                <div class="nav-footer">
                                    <div class="row-custom">
                                        <h4 class="footer-title">Információk</h4>
                                    </div>
                                    <div class="row-custom">
                                        <ul>
                                            <li><a href="#">Felhasználási feltételek</a></li>
                                            <li><a href="#">Adatkezelési tájékoztató</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 footer-widget">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="footer-title">Kövess minket</h4>
                                        <div class="footer-social-links">
                                            <!--include social links-->

                                            <ul>
                                                <li>
                                                  <a href="https://www.facebook.com/" class="facebook">
                                                      <i class="icon-facebook"></i>
                                                  </a>
                                                </li>
                                                <li>
                                                    <a href="https://twitter.com" class="twitter">
                                                        <i class="icon-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.instagram.com" class="instagram">
                                                        <i class="icon-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.pinterest.com/" class="pinterest">
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
                                            <h4 class="footer-title">Hírlevél</h4>
                                            <form action="#" id="form_validate_newsletter" method="post" accept-charset="utf-8">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="newsletter-inner">
                                                            <div class="d-table-cell">
                                                                <input type="email" class="form-control" name="email" placeholder="E-mail cím" required>
                                                            </div>
                                                            <div class="d-table-cell align-middle">
                                                                <button class="btn btn-default">Feliratkozás</button>
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
                            Copyright 2020 Hobbiművészek.hu - Minden jog fenntartva.
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
    <script src="https://www.google.com/recaptcha/api.js?render={{ env("GCAPTCHA_SITE_KEY") }}"></script>
    <script src="{{ asset("/assets/js/custom.js?ver=".env("APP_VER")) }}"></script>
    <script src="https://kit.fontawesome.com/a00cdb7d90.js"></script>
</body>

</html>