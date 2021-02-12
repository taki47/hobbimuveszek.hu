<!DOCTYPE html>
<html lang="hu">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>{{ env("APP_NAME") }} | {{ __('admin.title') }}</title>
    <link rel="shortcut icon" href="{{ asset("/assets/images/".$global[4]->value) }}" type="image/vnd.microsoft.icon" />

    <!-- Bootstrap -->
    <link href="/admin/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/admin/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/admin/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="/admin/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/admin/assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="/admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/admin/assets/css/custom.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/admin/assets/css/main.css" rel="stylesheet">

    @yield("styles")
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title">
                            <img src="/assets/images/{{ $global[2]->value }}" class="img-fluid" style="max-height:50px;">
                            <span>{{ env("APP_NAME") }}</span>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            @if ( Auth::user()->avatar )
                            <img src="/uploads/{{ Auth::user()->slug }}/avatar.png" alt="{{ Auth::user()->name }}"
                                class="img-circle profile_img">
                            @else
                            <i class="fas fa-user-circle"></i>
                            @endif
                        </div>
                        <div class="profile_info">
                            <span>{{ __('admin.welcome') }}</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>{{ __('admin.menu.blogTitle') }}</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="{{ route("adminBlogs") }}"><i class="fas fa-blog"></i> {{ __('admin.menu.blogsMenu') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route("adminBlogTags") }}"><i class="fas fa-tags"></i> {{ __('admin.menu.blogTagsMenu') }}</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="menu_section">
                            <h3>{{ __('admin.menu.mainPageTitle') }}</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="{{ route("adminSliders") }}"><i class="fas fa-sliders-h"></i> {{ __('admin.menu.slidersMenu') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route("adminTopCategories") }}"><i class="fas fa-thumbs-up"></i> {{ __('admin.menu.topCategoriesMenu') }}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="menu_section">
                            <h3>{{ __('admin.menu.usersTitle') }}</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="{{ route("adminUsers") }}"><i class="fas fa-users"></i> {{ __('admin.menu.usersMenu') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route("adminUserRoles") }}"><i class="fas fa-user-tag"></i> {{ __('admin.menu.userRolesMenu') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route("adminUserStatuses") }}"><i class="fas fa-user-slash"></i> {{ __('admin.menu.userStatusesMenu') }}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="menu_section">
                            <h3>{{ __('admin.menu.masterDataTitle') }}</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="{{ route("adminCategoryImages") }}"><i class="fas fa-images"></i> {{ __('admin.menu.categoryImagesMenu') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route("adminCategories") }}"><i class="fas fa-list"></i> {{ __('admin.menu.categoriesMenu') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route("adminPages") }}"><i class="fas fa-file"></i> {{ __('admin.menu.pagesMenu') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route("adminProvinces") }}"><i class="fas fa-globe-europe"></i> {{ __('admin.menu.provincesMenu') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route("adminBillingTypes") }}"><i class="fas fa-building"></i> {{ __('admin.menu.billingTypesMenu') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route("adminGlobalSettings") }}"><i class="fas fa-cogs"></i> {{ __('admin.menu.globalSettingsMenu') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="{{ __('admin.returnToPage') }}" href="/">
                            {{ __('admin.returnToPage') }}
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    @if ( Auth::user()->avatar )
                                    <img src="/uploads/{{ Auth::user()->slug }}/avatar.png" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}">
                                    @else
                                    <i class="fas fa-user-circle"></i>
                                    @endif

                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route("logout") }}">
                                        <i class="fa fa-sign-out pull-right"></i> {{ __('admin.logout') }}
                                    </a>
                                </div>
                            </li>

                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu"
                                    aria-labelledby="navbarDropdown1">
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><i class="fas fa-user-circle"></i></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><i class="fas fa-user-circle"></i></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><i class="fas fa-user-circle"></i></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><i class="fas fa-user-circle"></i></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a class="dropdown-item">
                                                <strong>{{ __('admin.showAllMessages') }}</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    {{ env("APP_NAME") }} - {{ __('admin.title') }}
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="/admin/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/admin/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/admin/assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/admin/assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/admin/assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/admin/assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/admin/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/admin/assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/admin/assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="/admin/assets/vendors/Flot/jquery.flot.js"></script>
    <script src="/admin/assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/admin/assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/admin/assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/admin/assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/admin/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/admin/assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/admin/assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/admin/assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="/admin/assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/admin/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/admin/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/admin/assets/vendors/moment/min/moment.min.js"></script>
    <script src="/admin/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a00cdb7d90.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/admin/assets/js/custom.min.js"></script>

    @yield("scripts")

</body>

</html>
