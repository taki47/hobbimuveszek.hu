@extends('Layouts.Master')

@section('content')
<div class="section-slider">
    <div class="index-main-slider container-fluid">
        <div class="row">
            <div class="slider-container">
                <div id="main-slider" class="main-slider">
                    @foreach ($sliders as $slider)
                        <div class="item lazyload" data-bg="/assets/images/sliders/{{ $slider->image }}" data-bg-mobile="/assets/images/sliders/{{ $slider->image }}">
                            <div class="container">
                                <div class="row row-slider-caption align-items-center">
                                    <div class="col-12">
                                        <div class="caption">
                                            {!! $slider->text !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="main-slider-nav" class="main-slider-nav">
                    <button class="prev"><i class="icon-arrow-left"></i></button>
                    <button class="next"><i class="icon-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid index-mobile-slider">
        <div class="row">
            <div class="slider-container">
                <div id="main-mobile-slider" class="main-slider">
                    @foreach ($sliders as $slider)
                        <div class="item lazyload" data-bg="/assets/images/sliders/{{ $slider->image }}">
                            <div class="container">
                                <div class="row row-slider-caption align-items-center">
                                    <div class="col-12">
                                        <div class="caption">
                                            {!! $slider->text !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="main-mobile-slider-nav" class="main-slider-nav">
                    <button class="prev"><i class="icon-arrow-left"></i></button>
                    <button class="next"><i class="icon-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Wrapper -->
<div id="wrapper" class="index-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 section section-categories">
                <!-- featured categories -->
                <div class="featured-categories">
                    <div class="card-columns">
                        @foreach ($topCategories as $topCategory)
                            <div class="card lazyload" data-bg="/assets/images/topcategories/{{ $topCategory->image }}">
                                <a href="{{ $topCategory->link }}">
                                    <div class="caption text-truncate">
                                        <span>{{ $topCategory->name }}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-12 section section-category-products">
                <div class="section-header">
                    <h3 class="title">{{ __("frontPage.newCreations") }}</h3>
                </div>
                <div class="row-custom slider-container">
                    <div class="row row-product" id="slider_special_offers">
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                        data-product-id="11"></a>
                                    <div class="img-product-container">
                                        <a href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-lazy="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc8f1ab260e4-83495544-63385917.jpg"
                                                alt="Summer fashion top lace" class="img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-lazy="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc8ee543d5b8-91720226-69141190.jpg"
                                                alt="Summer fashion top lace"
                                                class="img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="11"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                        <span class="badge badge-discount">-40%</span>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="#">Summer
                                            fashion top lace</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
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
                                            <span>&#36;</span>79 </del>
                                        <span class="price"><span>&#36;</span>47.40</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="9"></a>
                                    <div class="img-product-container">
                                        <a href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-lazy="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc8cee92ec97-43022243-21432900.jpg"
                                                alt="Black sneakers with white sole" class="img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-lazy="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc8ce306fa48-18877018-45763683.jpg"
                                                alt="Black sneakers with white sole"
                                                class="img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="9"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                        <span class="badge badge-discount">-30%</span>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="#">Black
                                            sneakers with white sole</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
                                            TrendShop </a>
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
                                            <span>&#36;</span>69 </del>
                                        <span class="price"><span>&#36;</span>48.30</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                        data-product-id="1"></a>
                                    <div class="img-product-container">
                                        <a
                                            href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-lazy="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc7b3a5eb3d9-13031569-26430967.jpg"
                                                alt="Gucci nylon fabric smart unisex backpack"
                                                class="img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-lazy="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc7b50506ed8-75163502-67783306.jpg"
                                                alt="Gucci nylon fabric smart unisex backpack"
                                                class="img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="1"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                        <span class="badge badge-discount">-20%</span>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a
                                            href="#">Gucci
                                            nylon fabric smart unisex backpack</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
                                            admin </a>
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
                                            <span>&#36;</span>69 </del>
                                        <span class="price"><span>&#36;</span>55.20</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="32"></a>
                                    <div class="img-product-container">
                                        <a href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-lazy="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcbf66bc19e6-48564138-57557701.jpg"
                                                alt="Men outerwear navy color" class="img-fluid img-product">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="32"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                        <span class="badge badge-discount">-15%</span>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="#">Men
                                            outerwear navy color</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
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
                                            <span>&#36;</span>99 </del>
                                        <span class="price"><span>&#36;</span>84.15</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="42"></a>
                                    <div class="img-product-container">
                                        <a href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-lazy="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd23a9dc08a5-50988111-96549491.jpg"
                                                alt="Navy polka dot dress" class="img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-lazy="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd23b3143086-87883485-44102904.jpg"
                                                alt="Navy polka dot dress" class="img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="42"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                        <span class="badge badge-discount">-30%</span>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="#">Navy polka
                                            dot dress</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star-o"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <del class="discount-original-price">
                                            <span>&#36;</span>99 </del>
                                        <span class="price"><span>&#36;</span>69.30</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="4"></a>
                                    <div class="img-product-container">
                                        <a href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-lazy="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc80cdd25859-15428734-57524016.jpg"
                                                alt="Black bag over the shoulder" class="img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-lazy="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc80f4739222-29058506-43905257.jpg"
                                                alt="Black bag over the shoulder"
                                                class="img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="4"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                        <span class="badge badge-discount">-30%</span>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="#">Black
                                            bag over the shoulder</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
                                            TrendShop </a>
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
                                            <span>&#36;</span>49 </del>
                                        <span class="price"><span>&#36;</span>34.30</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="slider_special_offers_nav" class="index-products-slider-nav">
                        <button class="prev"><i class="icon-arrow-left"></i></button>
                        <button class="next"><i class="icon-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            
            <div class="col-12 section section-index-bn">
                <div class="row">
                    <div class="col-6 col-index-bn index_bn_1">
                        <a href="#">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                data-src="https://modesy.codingest.com/uploads/blocks/block_5fbddd891837e1-56897790-47535905.jpg"
                                alt="banner" class="lazyload img-fluid">
                        </a>
                    </div>
                    <div class="col-6 col-index-bn index_bn_2">
                        <a href="#">
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                data-src="https://modesy.codingest.com/uploads/blocks/block_5fbddd7e516799-24922857-37775323.jpg"
                                alt="banner" class="lazyload img-fluid">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 section section-promoted">
                <!-- promoted products -->
                <div id="promoted_posts">
                    <h3 class="title">{{ __("frontPage.promoCreations") }}</h3>
                    <div id="row_promoted_products" class="row row-product">
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="41"></a>
                                    <div class="img-product-container">
                                        <a
                                            href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd21ef80da41-69366357-32455039.jpg"
                                                alt="Black midi skirt with white flowers"
                                                class="lazyload img-fluid img-product">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="41"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a
                                            href="#">Black
                                            midi skirt with white flowers</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
                                            TrendShop </a>
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
                                            <span>&#36;</span>59.90 </del>
                                        <span class="price"><span>&#36;</span>53.91</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                        data-product-id="38"></a>
                                    <div class="img-product-container">
                                        <a
                                            href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd0d4f4f58d5-00931623-74345364.jpg"
                                                alt="Women kipling bailey saddle handbag"
                                                class="lazyload img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd0d43d0ccd6-58673782-44342539.jpg"
                                                alt="Women kipling bailey saddle handbag"
                                                class="lazyload img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="38"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a
                                            href="#">Women
                                            kipling bailey saddle handbag</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
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
                                            <span>&#36;</span>49 </del>
                                        <span class="price"><span>&#36;</span>46.55</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                        data-product-id="34"></a>
                                    <div class="img-product-container">
                                        <a href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc2d73a9ab2-93000147-99984458.jpg"
                                                alt="Floral women sundress" class="lazyload img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc2dc2e10f8-94942467-50603102.jpg"
                                                alt="Floral women sundress"
                                                class="lazyload img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="34"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="#">Floral women
                                            sundress</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
                                            TrendShop </a>
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
                                            <span>&#36;</span>89 </del>
                                        <span class="price"><span>&#36;</span>80.10</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                        data-product-id="19"></a>
                                    <div class="img-product-container">
                                        <a href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc9658650fc6-09262017-70510200.jpg"
                                                alt="Cobalt men t-shirt all colors"
                                                class="lazyload img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc963aea9706-85840627-15871714.jpg"
                                                alt="Cobalt men t-shirt all colors"
                                                class="lazyload img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="19"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="#">Cobalt
                                            men t-shirt all colors</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
                                            TrendShop </a>
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
                                        <a href="#"
                                            class="a-meta-request-quote">Request a Quote</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                        data-product-id="23"></a>
                                    <div class="img-product-container">
                                        <a
                                            href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc9d45255d67-72736017-91880580.jpg"
                                                alt="Women lace blouse with different colors"
                                                class="lazyload img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc9d49210524-88708773-63002831.jpg"
                                                alt="Women lace blouse with different colors"
                                                class="lazyload img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="23"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a
                                            href="#">Women
                                            lace blouse with different colors</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
                                            TrendShop </a>
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
                                            <span>&#36;</span>69 </del>
                                        <span class="price"><span>&#36;</span>62.10</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="14"></a>
                                    <div class="img-product-container">
                                        <a href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc915ce2aa22-34012151-98072943.jpg"
                                                alt="Sun hat for women protection cap"
                                                class="lazyload img-fluid img-product">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="14"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="#">Sun
                                            hat for women protection cap</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
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
                                            <span>&#36;</span>29 </del>
                                        <span class="price"><span>&#36;</span>20.30</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="36"></a>
                                    <div class="img-product-container">
                                        <a href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc5575ee475-30616963-75102995.jpg"
                                                alt="Animal colorful digital prints"
                                                class="lazyload img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc5503df352-20303052-61582754.jpg"
                                                alt="Animal colorful digital prints"
                                                class="lazyload img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="36"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="#">Animal
                                            colorful digital prints</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
                                            admin </a>
                                    </p>
                                    <div class="product-item-rating">
                                        <div class="rating">
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                            <i class="icon-star"></i>
                                        </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                    </div>
                                    <div class="item-meta">
                                        <del class="discount-original-price">
                                            <span>&#36;</span>11.90 </del>
                                        <span class="price"><span>&#36;</span>10.12</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom">
                                    <a class="item-wishlist-button item-wishlist-enable " data-product-id="17"></a>
                                    <div class="img-product-container">
                                        <a href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc94d0930558-24316749-48720068.jpg"
                                                alt="Moment of inspiration piano music"
                                                class="lazyload img-fluid img-product">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="17"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="#">Moment
                                            of inspiration piano music</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
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
                                        <span class="price"><span>&#36;</span>15</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                        data-product-id="8"></a>
                                    <div class="img-product-container">
                                        <a href="#">
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
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a href="#">Handmade cute
                                            handbag</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
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
                                        <span class="price"><span>&#36;</span>36</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                            <div class="product-item">
                                <div class="row-custom product-multiple-image">
                                    <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                        data-product-id="1"></a>
                                    <div class="img-product-container">
                                        <a
                                            href="#">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc7b3a5eb3d9-13031569-26430967.jpg"
                                                alt="Gucci nylon fabric smart unisex backpack"
                                                class="lazyload img-fluid img-product">
                                            <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                                data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbc7b50506ed8-75163502-67783306.jpg"
                                                alt="Gucci nylon fabric smart unisex backpack"
                                                class="lazyload img-fluid img-product img-second">
                                        </a>
                                        <div class="product-item-options">
                                            <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                                data-toggle="tooltip" data-placement="left" data-product-id="1"
                                                data-reload="0" title="Wishlist">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-custom item-details">
                                    <h3 class="product-title">
                                        <a
                                            href="#">Gucci
                                            nylon fabric smart unisex backpack</a>
                                    </h3>
                                    <p class="product-user text-truncate">
                                        <a href="#">
                                            admin </a>
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
                                            <span>&#36;</span>69 </del>
                                        <span class="price"><span>&#36;</span>55.20</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <input type="hidden" id="promoted_products_offset" value="10">
                    <div id="load_promoted_spinner" class="col-12 load-more-spinner">
                        <div class="row">
                            <div class="spinner">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row-custom text-center promoted-load-more-container">
                        <a href="#" class="btn btn-success text-white">
                            Mutass többet
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 section section-latest-products">
                <h3 class="title">
                    <a href="#">{{ __("frontPage.favoriteCreations") }}</a>
                </h3>
                <p class="title-exp">{{ __("frontPage.favoriteCreationsHelper") }}</p>
                <div class="row row-product">
                    <!--print products-->
                    <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                        <div class="product-item">
                            <div class="row-custom product-multiple-image">
                                <a class="item-wishlist-button item-wishlist-enable " data-product-id="39"></a>
                                <div class="img-product-container">
                                    <a href="#">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd2bbfe4d540-16887116-77518074.jpg"
                                            alt="Colorful women scarfs" class="lazyload img-fluid img-product">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd2bba114110-81336408-76488729.jpg"
                                            alt="Colorful women scarfs"
                                            class="lazyload img-fluid img-product img-second">
                                    </a>
                                    <div class="product-item-options">
                                        <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                            data-toggle="tooltip" data-placement="left" data-product-id="39"
                                            data-reload="0" title="Wishlist">
                                            <i class="icon-heart-o"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row-custom item-details">
                                <h3 class="product-title">
                                    <a href="#">Colorful
                                        women scarfs</a>
                                </h3>
                                <p class="product-user text-truncate">
                                    <a href="#">
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
                                        <span>&#36;</span>45 </del>
                                    <span class="price"><span>&#36;</span>42.75</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                        <div class="product-item">
                            <div class="row-custom product-multiple-image">
                                <a class="item-wishlist-button item-wishlist-enable " data-product-id="44"></a>
                                <div class="img-product-container">
                                    <a
                                        href="#">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd29048dd613-00010505-98816045.jpg"
                                            alt="Women's ankle boot with different colors"
                                            class="lazyload img-fluid img-product">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd290beb6919-60220682-93963996.jpg"
                                            alt="Women's ankle boot with different colors"
                                            class="lazyload img-fluid img-product img-second">
                                    </a>
                                    <div class="product-item-options">
                                        <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                            data-toggle="tooltip" data-placement="left" data-product-id="44"
                                            data-reload="0" title="Wishlist">
                                            <i class="icon-heart-o"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row-custom item-details">
                                <h3 class="product-title">
                                    <a
                                        href="#">Women's
                                        ankle boot with different colors</a>
                                </h3>
                                <p class="product-user text-truncate">
                                    <a href="#">
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
                                    <span class="price"><span>&#36;</span>56</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                        <div class="product-item">
                            <div class="row-custom product-multiple-image">
                                <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                    data-product-id="43"></a>
                                <div class="img-product-container">
                                    <a href="#">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd25843bd058-71805308-62716547.jpg"
                                            alt="Black fashion women backpack"
                                            class="lazyload img-fluid img-product">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd258f473600-60460014-54742619.jpg"
                                            alt="Black fashion women backpack"
                                            class="lazyload img-fluid img-product img-second">
                                    </a>
                                    <div class="product-item-options">
                                        <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                            data-toggle="tooltip" data-placement="left" data-product-id="43"
                                            data-reload="0" title="Wishlist">
                                            <i class="icon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row-custom item-details">
                                <h3 class="product-title">
                                    <a href="#">Black
                                        fashion women backpack</a>
                                </h3>
                                <p class="product-user text-truncate">
                                    <a href="#">
                                        TrendShop </a>
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
                                    <a href="#"
                                        class="a-meta-request-quote">Request a Quote</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                        <div class="product-item">
                            <div class="row-custom product-multiple-image">
                                <a class="item-wishlist-button item-wishlist-enable " data-product-id="42"></a>
                                <div class="img-product-container">
                                    <a href="#">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd23a9dc08a5-50988111-96549491.jpg"
                                            alt="Navy polka dot dress" class="lazyload img-fluid img-product">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd23b3143086-87883485-44102904.jpg"
                                            alt="Navy polka dot dress"
                                            class="lazyload img-fluid img-product img-second">
                                    </a>
                                    <div class="product-item-options">
                                        <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                            data-toggle="tooltip" data-placement="left" data-product-id="42"
                                            data-reload="0" title="Wishlist">
                                            <i class="icon-heart-o"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row-custom item-details">
                                <h3 class="product-title">
                                    <a href="#">Navy polka dot
                                        dress</a>
                                </h3>
                                <p class="product-user text-truncate">
                                    <a href="#">
                                        admin </a>
                                </p>
                                <div class="product-item-rating">
                                    <div class="rating">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-o"></i>
                                    </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                </div>
                                <div class="item-meta">
                                    <del class="discount-original-price">
                                        <span>&#36;</span>99 </del>
                                    <span class="price"><span>&#36;</span>69.30</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                        <div class="product-item">
                            <div class="row-custom">
                                <a class="item-wishlist-button item-wishlist-enable " data-product-id="41"></a>
                                <div class="img-product-container">
                                    <a href="#">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd21ef80da41-69366357-32455039.jpg"
                                            alt="Black midi skirt with white flowers"
                                            class="lazyload img-fluid img-product">
                                    </a>
                                    <div class="product-item-options">
                                        <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                            data-toggle="tooltip" data-placement="left" data-product-id="41"
                                            data-reload="0" title="Wishlist">
                                            <i class="icon-heart-o"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row-custom item-details">
                                <h3 class="product-title">
                                    <a href="#">Black
                                        midi skirt with white flowers</a>
                                </h3>
                                <p class="product-user text-truncate">
                                    <a href="#">
                                        TrendShop </a>
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
                                        <span>&#36;</span>59.90 </del>
                                    <span class="price"><span>&#36;</span>53.91</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                        <div class="product-item">
                            <div class="row-custom">
                                <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                    data-product-id="40"></a>
                                <div class="img-product-container">
                                    <a href="#">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd1fa72f1171-75060829-27916481.jpg"
                                            alt="Modern grey couch and pillows"
                                            class="lazyload img-fluid img-product">
                                    </a>
                                    <div class="product-item-options">
                                        <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                            data-toggle="tooltip" data-placement="left" data-product-id="40"
                                            data-reload="0" title="Wishlist">
                                            <i class="icon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row-custom item-details">
                                <h3 class="product-title">
                                    <a href="#">Modern
                                        grey couch and pillows</a>
                                </h3>
                                <p class="product-user text-truncate">
                                    <a href="#">
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
                                    <span class="price"><span>&#36;</span>299</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                        <div class="product-item">
                            <div class="row-custom product-multiple-image">
                                <a class="item-wishlist-button item-wishlist-enable item-wishlist"
                                    data-product-id="38"></a>
                                <div class="img-product-container">
                                    <a href="#">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd0d4f4f58d5-00931623-74345364.jpg"
                                            alt="Women kipling bailey saddle handbag"
                                            class="lazyload img-fluid img-product">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbd0d43d0ccd6-58673782-44342539.jpg"
                                            alt="Women kipling bailey saddle handbag"
                                            class="lazyload img-fluid img-product img-second">
                                    </a>
                                    <div class="product-item-options">
                                        <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                            data-toggle="tooltip" data-placement="left" data-product-id="38"
                                            data-reload="0" title="Wishlist">
                                            <i class="icon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row-custom item-details">
                                <h3 class="product-title">
                                    <a href="#">Women
                                        kipling bailey saddle handbag</a>
                                </h3>
                                <p class="product-user text-truncate">
                                    <a href="#">
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
                                        <span>&#36;</span>49 </del>
                                    <span class="price"><span>&#36;</span>46.55</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                        <div class="product-item">
                            <div class="row-custom product-multiple-image">
                                <a class="item-wishlist-button item-wishlist-enable " data-product-id="37"></a>
                                <div class="img-product-container">
                                    <a href="#">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc678316d57-73902098-97463664.jpg"
                                            alt="Navy blue skate shoes" class="lazyload img-fluid img-product">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc67527ece7-08068703-36540606.jpg"
                                            alt="Navy blue skate shoes"
                                            class="lazyload img-fluid img-product img-second">
                                    </a>
                                    <div class="product-item-options">
                                        <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                            data-toggle="tooltip" data-placement="left" data-product-id="37"
                                            data-reload="0" title="Wishlist">
                                            <i class="icon-heart-o"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row-custom item-details">
                                <h3 class="product-title">
                                    <a href="#">Navy blue skate
                                        shoes</a>
                                </h3>
                                <p class="product-user text-truncate">
                                    <a href="#">
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
                                    <a href="#"
                                        class="a-meta-request-quote">Request a Quote</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                        <div class="product-item">
                            <div class="row-custom product-multiple-image">
                                <a class="item-wishlist-button item-wishlist-enable " data-product-id="36"></a>
                                <div class="img-product-container">
                                    <a href="#">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc5575ee475-30616963-75102995.jpg"
                                            alt="Animal colorful digital prints"
                                            class="lazyload img-fluid img-product">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc5503df352-20303052-61582754.jpg"
                                            alt="Animal colorful digital prints"
                                            class="lazyload img-fluid img-product img-second">
                                    </a>
                                    <div class="product-item-options">
                                        <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                            data-toggle="tooltip" data-placement="left" data-product-id="36"
                                            data-reload="0" title="Wishlist">
                                            <i class="icon-heart-o"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row-custom item-details">
                                <h3 class="product-title">
                                    <a href="#">Animal
                                        colorful digital prints</a>
                                </h3>
                                <p class="product-user text-truncate">
                                    <a href="#">
                                        admin </a>
                                </p>
                                <div class="product-item-rating">
                                    <div class="rating">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                    </div> <span class="item-wishlist"><i class="icon-heart-o"></i>0</span>
                                </div>
                                <div class="item-meta">
                                    <del class="discount-original-price">
                                        <span>&#36;</span>11.90 </del>
                                    <span class="price"><span>&#36;</span>10.12</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-mds-5 col-product">
                        <div class="product-item">
                            <div class="row-custom product-multiple-image">
                                <a class="item-wishlist-button item-wishlist-enable " data-product-id="35"></a>
                                <div class="img-product-container">
                                    <a href="#">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc4b05fd1f9-90975091-24998747.jpg"
                                            alt="Seychelles women's brown ankle bootie"
                                            class="lazyload img-fluid img-product">
                                        <img src="https://modesy.codingest.com/assets/img/img_bg_product_small.png"
                                            data-src="https://modesy.codingest.com/uploads/images/202011/img_x300_5fbcc4a717c576-68908874-15999311.jpg"
                                            alt="Seychelles women's brown ankle bootie"
                                            class="lazyload img-fluid img-product img-second">
                                    </a>
                                    <div class="product-item-options">
                                        <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist"
                                            data-toggle="tooltip" data-placement="left" data-product-id="35"
                                            data-reload="0" title="Wishlist">
                                            <i class="icon-heart-o"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row-custom item-details">
                                <h3 class="product-title">
                                    <a href="#">Seychelles
                                        women's brown ankle bootie</a>
                                </h3>
                                <p class="product-user text-truncate">
                                    <a href="#">
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
                                    <a href="#"
                                        class="a-meta-request-quote">Request a Quote</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="col-12 section section-blog m-0">
                <h3 class="title">
                    <a href="#">{{ __("frontPage.blog") }}</a>
                </h3>
                <p class="title-exp">{{ __("frontPage.blogHelper") }}</p>
                <div class="row-custom">
                    <!-- main slider -->

                    <div class="blog-slider-container">
                        <div id="blog-slider" class="blog-slider">
                            @foreach ($blogs as $blog)
                                @php
                                    $tag = $blog->getFirstTag($blog->id);
                                @endphp

                                <div class="blog-item">
                                    <div class="blog-item-img">
                                        <a href="{{ route("blogDetail", [$tag->url, $blog->url]) }}">
                                            <img src="/blogs/{{ $blog->image }}" data-lazy="/blogs/{{ $blog->image }}" alt="{{ $blog->image_alt }}" title="{{ $blog->image_title }}" class="img-fluid" style="max-height:265px;margin:auto;" />
                                        </a>
                                    </div>
                                    <h3 class="blog-post-title text-center">
                                        <a href="{{ route("blogDetail", [$tag->url, $blog->url]) }}">
                                            @if ( strlen($blog->name)>40 )
                                                {{ substr($blog->name,0,40) }}...
                                            @else
                                                {{ $blog->name }}
                                            @endif
                                            
                                        </a>
                                    </h3>
                                    <div class="blog-post-meta text-center">
                                        <a href="{{ route("blogTagFilter", $tag->url) }}">
                                            <i class="icon-folder"></i>
                                            {{ $tag->name }}
                                        </a>
                                        <span>
                                            <i class="icon-clock"></i>
                                            {{ $blog->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <div class="blog-post-description text-center">
                                        @if ( strlen($blog->lead)>100 )
                                            {{ substr($blog->lead,0,100) }}...
                                        @else
                                            {{ $blog->lead }}
                                        @endif
                                        
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="blog-slider-nav" class="blog-slider-nav">
                            <button class="prev"><i class="icon-arrow-left"></i></button>
                            <button class="next"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->
@endsection