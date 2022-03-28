@extends('frontend.layout.template')

@section('body-content')
<div role="main" clacontainerss="main shop py-4">

    <div class="container">

        <div class="row">
            <!-- Left Sidebar-->
            @include('frontend.includes.sidebar')

            <div class="col-lg-9">

                <div class="masonry-loader masonry-loader-showing">
                    <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
                        <div class="col-sm-6 col-lg-4 product">
                            <a href="shop-product-sidebar-left.html">
                                <span class="onsale">Sale!</span>
                            </a>
                            <span class="product-thumb-info border-0">
                                <a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
                                    <span class="text-uppercase text-1">Add to Cart</span>
                                </a>
                                <a href="shop-product-sidebar-left.html">
                                    <span class="product-thumb-info-image">
                                        <img alt="" class="img-fluid" src="{{ asset('frontend/img/products/product-grey-1.jpg') }}">
                                    </span>
                                </a>
                                <span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
                                    <a href="shop-product-sidebar-left.html">
                                        <h4 class="text-4 text-primary">Photo Camera</h4>
                                        <span class="price">
                                            <del><span class="amount">$325</span></del>
                                            <ins><span class="amount text-dark font-weight-semibold">$299</span></ins>
                                        </span>
                                    </a>
                                </span>
                            </span>
                        </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
