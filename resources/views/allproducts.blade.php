@extends('master')
@section('content')
 <!--Page Title-->
 <section class="page-title" style="background-image:url({{asset('user/images/background/10.jpg')}});">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1>Shop</h1>
                <span class="title">The Interior speak for themselves</span>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Shop</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Search Form -->
<section class="search-section">
    <div class="auto-container">
        <form id="search-form" class="search-form">
            <input type="text" id="search-input" name="search" placeholder="Search for products...">
          <i class="fa fa-search"></i>
        </form>
    </div>
</section>


<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!--Content Side-->
            <div class="content-side col-xl-9 col-lg-8 col-md-12">
                <div class="our-shop">
                    <div class="row clearfix">
                        @if ($products->isNotEmpty())
                        @foreach ($products as $product)
                        <!--Shop Item-->
                        <div class="shop-item col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="{{ route('Front.product.detail', $product->id) }}">{{ $product->name }}</a>
                    
                                    <!-- Check if the product has images -->
                                    @if ($product->images && $product->images->isNotEmpty())
                                        <img src="{{ asset('uploads/product/large/' . $product->images->first()->image) }}" alt="{{ $product->name }}">
                                    @else
                                        <img src="{{ asset('uploads/product/large/default.jpg') }}" alt="No image available">
                                    @endif             
                                    <div class="overlay-box">
                                        <ul class="cart-option">
                                            <li><a href="{{ route('Front.product.detail', $product->id) }}"><span class="fa fa-link"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="{{ route('Front.product.detail', $product->id) }}">{{ $product->name }}</a></h3>
                                    <div class="price">Price: ${{ $product->price }}</div>
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <a class="add-cart" href="{{ route('Front.product.detail', $product->id) }}"><span class="fa fa-cart-plus"></span>Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p>No products found matching your search query.</p>
                        @endif                        
                    </div>               

                  
                </div>
            </div>          
        </div>
    </div>
</div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Listen for form submission
    $('#search-form').on('keyup', function(e) {
        e.preventDefault(); // Prevent normal form submission

        let searchQuery = $('#search-input').val();

        // Make AJAX request
        $.ajax({
            url: '{{ route("productsall") }}',
            type: 'GET',
            data: { search: searchQuery },
            success: function(response) {
                // Clear current product list
                $('.our-shop .row.clearfix').empty();

                // Check if any products are returned
                if (response.products.length > 0) {
                    response.products.forEach(function(product) {
                        // Dynamically create product elements
                        let productHtml = `
                        <div class="shop-item col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="/product/${product.id}">${product.name}</a>
                                    <img src="/uploads/product/large/${product.images && product.images.length > 0 ? product.images[0].image : 'default.jpg'}" alt="${product.name}">
                                    <div class="overlay-box">
                                        <ul class="cart-option">
                                            <li><a href="/product/${product.id}"><span class="fa fa-link"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="/product/${product.id}">${product.name}</a></h3>
                                    <div class="price">Price: $${product.price}</div>
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <a class="add-cart" href="/product/${product.id}"><span class="fa fa-cart-plus"></span>Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        // Append new products to the product list
                        $('.our-shop .row.clearfix').append(productHtml);
                    });
                } else {
                    // Show message if no products are found
                    $('.our-shop .row.clearfix').append('<p>No products found matching your search query.</p>');
                }
            },
            error: function() {
                alert('Something went wrong. Please try again.');
            }
        });
    });
});
</script>
