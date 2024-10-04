@extends('master');
@section('content')
  <!--Page Title-->
  <section class="page-title" style="background-image:url({{asset('user/images/background/10.jpg')}});">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1>{{ $category->name }}</h1>
                <span class="title">The Interior speak for themselves</span>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('Front.index')}}">Home</a></li>
                <li>{{ $category->name }}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Specialize Section -->
<section class="specialize-section">
    <div class="auto-container">
        <div class="sec-title">
            <span class="float-text">SubCategories</span>
            <h2>Our SubCategories</h2>
        </div>
        {{-- {{$galleries}} --}}
        <div class="services-carousel-two owl-carousel owl-theme">
            @if (!empty($galleries))
                @foreach ($galleries as $gallery)
                    @php
                    $img = $gallery->images->first();
                    @endphp
                    <div class="service-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <a href="{{ route('subcategory.products', $gallery->subcategory->slug) }}">
                                        @if (!empty($img))
                                            <img src="{{ asset('uploads/gallery/large/' . $img->image) }}" alt="image not found">
                                        @endif
                                    </a>
                                </figure>
                            </div>
                            <div class="caption-box">
                                <h3>
                                    <a href="{{ route('subcategory.products', $gallery->subcategory->slug) }}">{{ $gallery->subcategory->name }}</a>
                                </h3>
                                <div class="link-box">
                                    <a href="{{ route('subcategory.products', $gallery->subcategory->slug) }}">
                                        Read More <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        
    </div>
</section>
{{-- <main>
    <!-- Breadcrumb area start  -->
    <div style="margin-top: -29px"
        class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background"
            data-background="{{asset('Asset/decorVista/assets/imgs/breadcrumb/page-header-1.png')}}"></div>
        <div class="container">
            <div class="breadcrumb__bg-left"></div>
            <div class="breadcrumb__bg-right"></div>
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div style="margin-top: 100px;" class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">
                            {{ $category->name }}</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{route('Front.index')}}">Home</a></span></li>
                                    <li class="active"><span>{{ $category->name }}</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

   
</main> --}}

@endsection