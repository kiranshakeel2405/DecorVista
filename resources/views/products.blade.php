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
                <li><a href="index-2.html">Home</a></li>
                <li>Shop</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!--Content Side-->
            <div class="content-side col-xl-9 col-lg-8 col-md-12">
                <div class="our-shop">
                    <div class="row clearfix">
                        @if (!empty($subcategories))
                        @foreach ($subcategories as $subcategory)
                        @foreach ($subcategory->products as $product)
                        <!--Shop Item-->
                        <div class="shop-item col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="{{ route('subcategory.products', $subcategory->slug) }}">{{ $subcategory->name }}</a>
                                    <!-- Display the first image of the product -->
                                    @if ($product->images && $product->images->isNotEmpty())
                                    <img src="{{ asset('uploads/product/large/' . $product->images->first()->image) }}" alt="{{ $product->name }}">
                                    @else
                                        <img src="{{ asset('uploads/product/large/default.jpg') }}" alt="No image available">
                                    @endif
                                    <div class="overlay-box">
                                        <ul class="cart-option">
                                            <li><a href="{{ route('Front.product.detail',$product->id) }}"><span class="fa fa-link"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <h3><a href="{{ route('Front.product.detail',$product->id) }}">{{ $product->name }}</a></h3>
                                    <div class="price"><span class="discount">Price: ${{ $product->price }}</div>
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <a class="add-cart" href="{{ route('Front.product.detail',$product->id) }}"><span class="fa fa-cart-plus"></span>Add To Cart</a>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                        @endif
                    </div>
                
                    <!--Post Share Options-->
                    <div class="styled-pagination">
                        <ul class="clearfix">
                            <li class="prev-post"><a href="#"><span class="fa fa-long-arrow-left"></span> Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next-post"><a href="#"> Next <span class="fa fa-long-arrow-right"></span> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
           
        </div>
    </div>
</div>
  

@endsection