@extends('master');
@section('content')
    <!--Page Title-->
    @include('Message.message')
    <section class="page-title" style="background-image:url({{ asset('user/images/background/10.jpg') }});">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Designer Portfolio</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Designer Portfolio</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- "team-details  area start -->
    <section class="team-details section-space pt-3">
        <div class="container pt-5">

            <div class="product-details">

                <!--Basic Details-->
                <div class="basic-details">
                    <div class="row clearfix">
                        <div class="image-column col-md-5 col-sm-12">
                            <figure class="image-box"><a href="{{ asset('uploads/Designer/large/' . $portfolios->image) }}"
                                    class="lightbox-image" title="Image Caption Here"><img
                                        src="{{ asset('uploads/Designer/large/' . $portfolios->image) }}"
                                        alt=""></a>
                            </figure>
                        </div>
                        <div class="info-column col-md-7 col-sm-12">
                            <div class="details-header">
                                <h2 class="display-4 fs-4 mb-0">{{ $designer->name }}</h2>
                                <span class="info">Interior Designer </span>
                            </div>
                            <ul class="cat-list mb-4">
                                <li class="active"><a class="pl-3 pb-2 d-flex">
                                        <h5>Short Biography</h5>
                                    </a>
                                    <div class="text px-3 pb-3 mb-0">{{ $portfolios->short_bio }}</div>
                                </li>
                            </ul>

                            <ul class="cat-list mb-4">
                                <li class="active"><a class="pl-3 pb-2 d-flex">
                                        <h5>Long Biography</h5>
                                    </a>
                                    <div class="text px-3 pb-3 mb-0">{{ $portfolios->long_bio }}</div>
                                </li>
                            </ul>
                            <div class="share-option">
                                <span class="title">Follow Me:</span>
                                <ul class="social-icon-colored clearfix">
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google
                                            Plus</a></li>
                                    <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i>Pinterest</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('Front.designer.booking', $designer->id) }}"
                                class="theme-btn btn-style-one">Booking Appointment</a>
                        </div>
                    </div>
                </div>
                <!--Basic Details-->
            </div>
        </div>
    </section>
    <!-- "team-details  area end -->

    <section class="specialize-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text">Projects</span>
                <h2>My Projects</h2>
            </div>

            <div class="services-carousel-two owl-carousel owl-theme">
                <!-- Service Block -->
                @foreach ($projects as $project)
                    <div class="service-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image rounded"><a href="{{ route('ProjectDetail', $project->id) }}">
                                        @if ($project->images->isNotEmpty())
                                            {{-- Display the first image --}}
                                            <img src="{{ asset('uploads/projects/large/' . $project->images->first()->image) }}"
                                                alt="First image of {{ $project->title }}" class="rounded">
                                        @else
                                            <div class="bg-dark d-flex justify-content-center align-items-center rounded" style="height:202px">
                                                <p class="text-light">No images available</p>
                                            </div>
                                        @endif
                                    </a></figure>
                            </div>
                            <div class="caption-box">
                                <h3><a href="">{{ $project->title }}</a></h3>
                                <div class="link-box"><a href="">Read More <i
                                            class="fa fa-angle-double-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Projects Section -->
@endsection
