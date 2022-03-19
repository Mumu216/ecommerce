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

                     @foreach($products as $product)
                        <div class="col-sm-6 col-lg-4 product">
                            <a href="shop-product-sidebar-left.html">
                                @if($product->is_featured==0)

                                @elseif($product->is_featured==1)
                                   <span class="onsale">Sale!</span>
                                @endif
                             </a>
                            <span class="product-thumb-info border-0">
                                <!-- add to cart-->
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="{{ $product->quantity }}">

                                    <input type="submit" name="addcart" value="Add to Cart" class="add-to-cart-product bg-color-primary">
                            </form>
                                <!-- product image-->
                                <a href="{{ route('productDetails', $product->slug) }}">
                                    <span class="product-thumb-info-image">

                                        @php $p=1; @endphp
                                        @foreach( $product->images as $image)
                                         @if ( $p > 0 )
                                          <img src="{{ asset('backend/img/products/'  . $image->image ) }}" class="img-fluid" alt=" $product->title">
                                          @endif
                                          @php $p--;  @endphp
                                          @endforeach
                                    </span>
                                </a>
                                <span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
                                    <a href="shop-product-sidebar-left.html">
                                        <h4 class="text-4 text-primary">{{ $product->title }}</h4>
                                        <span class="price">
                                          @if($product->is_featured==0)
                                            <ins><span class="amount text-dark font-weight-semibold">৳{{$product->regular_price}}</span></ins>
                                           @elseif($product->is_featured==1)
                                              <del><span class="amount">৳{{ $product->regular_price }}</span></del>
                                              <ins><span class="amount text-dark font-weight-semibold">৳{{ $product->offer_price }}</span></ins>
                                            @endif
                                        </span>
                                    </a>
                                </span>
                            </span>
                        </div>
                     @endforeach
                    </div>
                    {{-- <div class="row">
                        <div class="col">
                             <ul class="pagination float-right">
                                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
