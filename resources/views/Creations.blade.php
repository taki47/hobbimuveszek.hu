@extends('Layouts.Master')

@section('content')
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-products">
                        <li class="breadcrumb-item"><a href="https://modesy.codingest.com/">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </nav>
            </div>
        </div>
        <input type="hidden" name="search" value="summer">
        <div class="row">
            <div class="col-12 product-list-header">
                <h1 class="page-title product-list-title">Products</h1>
                <div class="product-sort-by">
                    <span class="span-sort-by">Sort By:</span>
                    <div class="sort-select">
                        <select class="custom-select" onchange="window.location.replace(this.value);">
                            <option value="https://modesy.codingest.com/products?search=summer&amp;sort=most_recent">
                                Most Recent</option>
                            <option value="https://modesy.codingest.com/products?search=summer&amp;sort=lowest_price">
                                Lowest Price</option>
                            <option value="https://modesy.codingest.com/products?search=summer&amp;sort=highest_price">
                                Highest Price</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-filter-products-mobile" type="button" data-toggle="collapse"
                    data-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
                    <i class="icon-filter"></i>&nbsp;Filter Products </button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-3 col-sidebar-products">
                <div id="collapseFilters" class="product-filters">

                    <div class="filter-item">
                        <h4 class="title">Category</h4>
                        <div class="filter-list-container">
                            <ul
                                class="filter-list filter-custom-scrollbar filter-list-categories os-host os-theme-dark os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition">
                                <div class="os-resize-observer-host">
                                    <div class="os-resize-observer observed" style="left: 0px; right: auto;"></div>
                                </div>
                                <div class="os-size-auto-observer" style="height: calc(100% + 1px); float: left;">
                                    <div class="os-resize-observer observed"></div>
                                </div>
                                <div class="os-content-glue"
                                    style="margin: 0px 0px -10px; height: 194px; width: 223px;"></div>
                                <div class="os-padding">
                                    <div class="os-viewport os-viewport-native-scrollbars-invisible"
                                        style="right: 0px; bottom: 0px;">
                                        <div class="os-content"
                                            style="padding: 0px 0px 10px; height: auto; width: 100%;">
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/clothing?search=summer">Clothing</a>
                                            </li>
                                            <li>
                                                <a href="https://modesy.codingest.com/shoes?search=summer">Shoes</a>
                                            </li>
                                            <li>
                                                <a href="https://modesy.codingest.com/home-living?search=summer">Home
                                                    &amp; Living</a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/jewelry-accessories?search=summer">Jewelry
                                                    &amp; Accessories</a>
                                            </li>
                                            <li>
                                                <a href="https://modesy.codingest.com/toys-entertainment?search=summer">Toys
                                                    &amp; Entertainment</a>
                                            </li>
                                            <li>
                                                <a href="https://modesy.codingest.com/graphics-photos?search=summer">Graphics
                                                    &amp; Photos</a>
                                            </li>
                                            <li>
                                                <a href="https://modesy.codingest.com/video-audio?search=summer">Video
                                                    &amp; Audio</a>
                                            </li>
                                            <li>
                                                <a href="https://modesy.codingest.com/web-templates-code?search=summer">Web
                                                    Templates &amp; Code</a>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                                <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable">
                                    <div class="os-scrollbar-track os-scrollbar-track-off">
                                        <div class="os-scrollbar-handle"
                                            style="width: 100%; transform: translate(0px, 0px);"></div>
                                    </div>
                                </div>
                                <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable">
                                    <div class="os-scrollbar-track os-scrollbar-track-off">
                                        <div class="os-scrollbar-handle"
                                            style="height: 100%; transform: translate(0px, 0px);"></div>
                                    </div>
                                </div>
                                <div class="os-scrollbar-corner"></div>
                            </ul>
                        </div>
                    </div>

                    <div class="filter-item">
                        <h4 class="title">Product Type</h4>
                        <div class="filter-list-container">
                            <ul class="filter-list">
                                <li>
                                    <a
                                        href="https://modesy.codingest.com/products?search=summer&amp;product_type=physical">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <label class="custom-control-label">Physical</label>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="https://modesy.codingest.com/products?search=summer&amp;product_type=digital">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <label class="custom-control-label">Digital</label>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="filter-item">
                        <h4 class="title">Brand</h4>
                        <div class="filter-list-container">
                            <input type="text" class="form-control filter-search-input" placeholder="Search Brand"
                                data-filter-id="product_filter_1">
                            <ul id="product_filter_1"
                                class="filter-list filter-custom-scrollbar os-host os-theme-dark os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
                                <div class="os-resize-observer-host">
                                    <div class="os-resize-observer observed" style="left: 0px; right: auto;"></div>
                                </div>
                                <div class="os-size-auto-observer" style="height: calc(100% + 1px); float: left;">
                                    <div class="os-resize-observer observed"></div>
                                </div>
                                <div class="os-content-glue"
                                    style="margin: 0px 0px -10px; height: 394px; width: 223px;"></div>
                                <div class="os-padding">
                                    <div class="os-viewport os-viewport-native-scrollbars-invisible"
                                        style="overflow-y: scroll; right: 0px; bottom: 0px;">
                                        <div class="os-content"
                                            style="padding: 0px 0px 10px; height: auto; width: 100%;">
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=adidas">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Adidas</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=armani">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Armani</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=banana-republic">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Banana Republic</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=burberry">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Burberry</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=diesel">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Diesel</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=gucci">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Gucci</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=hugo-boss">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Hugo Boss</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=lacoste">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Lacoste</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=lee">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Lee</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=mango">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Mango</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=nautica">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Nautica</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=nike">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Nike</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=prada">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Prada</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=puma">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Puma</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=ralph-lauren">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Ralph Lauren</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;brand=tommy-hilfiger">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Tommy Hilfiger</label>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                                <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable">
                                    <div class="os-scrollbar-track os-scrollbar-track-off">
                                        <div class="os-scrollbar-handle"
                                            style="width: 100%; transform: translate(0px, 0px);"></div>
                                    </div>
                                </div>
                                <div class="os-scrollbar os-scrollbar-vertical">
                                    <div class="os-scrollbar-track os-scrollbar-track-off">
                                        <div class="os-scrollbar-handle"
                                            style="height: 71.066%; transform: translate(0px, 0px);"></div>
                                    </div>
                                </div>
                                <div class="os-scrollbar-corner"></div>
                            </ul>
                        </div>
                    </div>
                    <div class="filter-item">
                        <h4 class="title">Fabric</h4>
                        <div class="filter-list-container">
                            <input type="text" class="form-control filter-search-input" placeholder="Search Fabric"
                                data-filter-id="product_filter_2">
                            <ul id="product_filter_2"
                                class="filter-list filter-custom-scrollbar os-host os-theme-dark os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition">
                                <div class="os-resize-observer-host">
                                    <div class="os-resize-observer observed" style="left: 0px; right: auto;"></div>
                                </div>
                                <div class="os-size-auto-observer" style="height: calc(100% + 1px); float: left;">
                                    <div class="os-resize-observer observed"></div>
                                </div>
                                <div class="os-content-glue"
                                    style="margin: 0px 0px -10px; height: 130px; width: 223px;"></div>
                                <div class="os-padding">
                                    <div class="os-viewport os-viewport-native-scrollbars-invisible"
                                        style="right: 0px; bottom: 0px;">
                                        <div class="os-content"
                                            style="padding: 0px 0px 10px; height: auto; width: 100%;">
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;fabric=bamboo">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Bamboo</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;fabric=cotton">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Cotton</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;fabric=leather">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Leather</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;fabric=nylon">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Nylon</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;fabric=silk">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Silk</label>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                                <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable">
                                    <div class="os-scrollbar-track os-scrollbar-track-off">
                                        <div class="os-scrollbar-handle"
                                            style="width: 100%; transform: translate(0px, 0px);"></div>
                                    </div>
                                </div>
                                <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable">
                                    <div class="os-scrollbar-track os-scrollbar-track-off">
                                        <div class="os-scrollbar-handle"
                                            style="height: 100%; transform: translate(0px, 0px);"></div>
                                    </div>
                                </div>
                                <div class="os-scrollbar-corner"></div>
                            </ul>
                        </div>
                    </div>
                    <div class="filter-item">
                        <h4 class="title">Material</h4>
                        <div class="filter-list-container">
                            <input type="text" class="form-control filter-search-input" placeholder="Search Material"
                                data-filter-id="product_filter_3">
                            <ul id="product_filter_3"
                                class="filter-list filter-custom-scrollbar os-host os-theme-dark os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition">
                                <div class="os-resize-observer-host">
                                    <div class="os-resize-observer observed" style="left: 0px; right: auto;"></div>
                                </div>
                                <div class="os-size-auto-observer" style="height: calc(100% + 1px); float: left;">
                                    <div class="os-resize-observer observed"></div>
                                </div>
                                <div class="os-content-glue" style="margin: 0px 0px -10px; height: 82px; width: 223px;">
                                </div>
                                <div class="os-padding">
                                    <div class="os-viewport os-viewport-native-scrollbars-invisible"
                                        style="right: 0px; bottom: 0px;">
                                        <div class="os-content"
                                            style="padding: 0px 0px 10px; height: auto; width: 100%;">
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;material=fabric-lining">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Fabric Lining</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;material=leather">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Leather</label>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="https://modesy.codingest.com/products?search=summer&amp;material=synthetic">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input">
                                                        <label class="custom-control-label">Synthetic</label>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                                <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable">
                                    <div class="os-scrollbar-track os-scrollbar-track-off">
                                        <div class="os-scrollbar-handle"
                                            style="width: 100%; transform: translate(0px, 0px);"></div>
                                    </div>
                                </div>
                                <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable">
                                    <div class="os-scrollbar-track os-scrollbar-track-off">
                                        <div class="os-scrollbar-handle"
                                            style="height: 100%; transform: translate(0px, 0px);"></div>
                                    </div>
                                </div>
                                <div class="os-scrollbar-corner"></div>
                            </ul>
                        </div>
                    </div>
                    <div class="filter-item">
                        <h4 class="title">Price</h4>
                        <div class="price-filter-inputs">
                            <div class="row align-items-baseline row-price-inputs">
                                <div class="col-4 col-md-4 col-lg-5 col-price-inputs">
                                    <span>Min</span>
                                    <input type="input" id="price_min" value="" class="form-control price-filter-input"
                                        placeholder="Min"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <div class="col-4 col-md-4 col-lg-5 col-price-inputs">
                                    <span>Max</span>
                                    <input type="input" id="price_max" value="" class="form-control price-filter-input"
                                        placeholder="Max"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <div class="col-4 col-md-4 col-lg-2 col-price-inputs text-left">
                                    <button type="button" id="btn_filter_price"
                                        data-current-url="https://modesy.codingest.com/products"
                                        data-query-string="search=summer"
                                        class="btn btn-sm btn-default btn-filter-price float-left"><i
                                            class="icon-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-custom">
                    <!--Include banner-->
                    <!--print sidebar banner-->




                </div>
            </div>

            <div class="col-12 col-md-9 col-content-products">
                <div class="filter-reset-tag-container">
                    <div class="filter-reset-tag">
                        <div class="left">
                            <a href="https://modesy.codingest.com/products"><i class="icon-close"></i></a>
                        </div>
                        <div class="right">
                            <span class="reset-tag-title">Search</span>
                            <span>summer</span>
                        </div>
                    </div>

                    <a href="https://modesy.codingest.com/products" class="link-reset-filters">Reset Filters</a>
                </div>
                <div class="product-list-content">
                    <div class="row row-product">
                        <!--print products-->
                        <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="11"></a>
                                    <div class="img-product-container">
                                        <a href="https://modesy.codingest.com/summer-fashion-top-lace-11">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc8f1ab260e4-83495544-63385917.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc8f1ab260e4-83495544-63385917.jpg"
                                                alt="Summer fashion top lace"
                                                class="img-fluid img-product ls-is-cached lazyloaded">
                                            <img src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc8ee543d5b8-91720226-69141190.jpg"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc8ee543d5b8-91720226-69141190.jpg"
                                                alt="Summer fashion top lace"
                                                class="img-fluid img-product img-second ls-is-cached lazyloaded">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="11"
                                                data-reload="0" title="" data-original-title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="https://modesy.codingest.com/summer-fashion-top-lace-11">Summer fashion
                                            top lace</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="https://modesy.codingest.com/profile/trendshop">
                                            TrendShop </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>2</span>
                                    </div>
                                    <div class="item-meta">
                                        <del class="discount-original-price">
                                            <span>$</span>79 </del>
                                        <span class="price"><span>$</span>47.40</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="product-list-pagination">
                    <div class="float-right">
                    </div>
                </div>

                <div class="col-12">
                    <!--Include banner-->
                    <!--print banner-->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
