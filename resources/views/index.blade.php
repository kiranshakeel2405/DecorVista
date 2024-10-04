@extends('master')
@section('content')
   <!-- Bnner Section -->
   <section class="banner-section">
    <div class="banner-carousel owl-carousel owl-theme">
        <div class="slide-item" style="background-image: url({{asset('user/images/main-slider/image-1.jpg')}});">
            <div class="auto-container">
                <div class="content-box">
                    <h2>Architecture is a <br> Visual Art.</h2>
                    <div class="text">The buildings speak for themselves</div>
                    <div class="link-box">
                        <a href="about.html" class="theme-btn btn-style-one">Check Art</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide-item" style="background-image: url({{asset('user/images/main-slider/image-2.jpg')}});">
            <div class="auto-container">
                <div class="content-box">
                    <h2>Architecture is a <br> Visual Art.</h2>
                    <div class="text">The buildings speak for themselves</div>
                    <div class="link-box">
                        <a href="about.html" class="theme-btn btn-style-one">Check Art</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide-item" style="background-image: url({{asset('user/images/main-slider/image-3.jpg')}});">
            <div class="auto-container">
                <div class="content-box">
                    <h2>Architecture is a <br> Visual Art.</h2>
                    <div class="text">The buildings speak for themselves</div>
                    <div class="link-box">
                        <a href="about.html" class="theme-btn btn-style-one">Check Art</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-box">
        <div class="auto-container clearfix">
            <ul class="contact-info">
                <li><span>Phone :</span> (+84) 867-557-243</li>
                <li><span>EMAIL :</span> <a href="#">Support@yourdomain.com</a></li>
            </ul>
        </div>
    </div>
</section>
<!-- End Bnner Section -->

    <!-- About Section -->
    <section class="about-section" style="background-image: url({{asset('user/images/background/1.jpg')}});">
        <div class="auto-container">
            <div class="row no-gutters">
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="title-box wow fadeInLeft" data-wow-delay='1200ms'>
                            <h2>ABOUT <br> US</h2>
                        </div>
                        <div class="image-box">
                            <figure class="alphabet-img wow fadeInRight"><img src="{{asset('user/images/resource/alphabet-image.png')}}" alt=""></figure>
                            <figure class="image wow fadeInRight" data-wow-delay='600ms'><img src="{{asset('user/images/resource/image-1.jpg')}}" alt=""></figure>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInLeft">
                        <div class="content-box">
                            <div class="title">
                                <h2>Any  Complexity <br>For Any Cat</h2>
                            </div>
                            <div class="text">Our company has many years experience and specializes in manufacturing, salling, serviceing and repairing cardan shafts (cardans) for various vehicles, technological equipment, tractor, special machinery and agricultural machinery of verious domestic and foreign manufacturers.</div>
                            <div class="link-box"><a href="about.html" class="theme-btn btn-style-one">About Us</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Section -->

    <!-- Services Section -->
    <section class="services-section">
        <div class="upper-box" style="background-image: url({{asset('user/images/background/2.jpg')}});">
            <div class="auto-container">    
                <div class="sec-title text-center light">
                    <span class="float-text">Designs</span>
                    <h2>Our Designs</h2>
                </div>
            </div>
        </div>

        <div class="services-box">
            <div class="auto-container">
                <div class="services-carousel owl-carousel owl-theme">
                   
                    @foreach($designs as $design)
                    <!-- Service Block -->
                    <div class="service-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="#">
                                @if($design->images->isNotEmpty())
                                    {{-- Display the first image --}}
                                    <img src="{{ asset('uploads/projects/large/' . $design->images->first()->image) }}" alt="First image of {{ $design->title }}">
                                @else
                                    <p>No images available</p>
                                @endif
                                </a></figure>
                            </div>
                            <div class="lower-content">
                                <h3><a href="#">{{$design->name}}</a></h3>
                                <div class="text">{{$design->short_description}}</div>
                                <!--<div class="link-box">-->
                                <!--    <a href="">Learn More <i class="fa fa-long-arrow-right"></i></a>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                </div>
            </div>
        </div>
    </section>
    <!--End Services Section -->

    <!-- Fun Fact Section -->
    <section class="fun-fact-section">
        <div class="outer-box" style="background-image: url({{asset('user/images/background/3.jpg')}})">
            <div class="auto-container">
                <div class="fact-counter">
                    <div class="row">
                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="14">0</span></div>
                                <h4 class="counter-title">Years of <br>Experience</h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="237">0</span></div>
                                <h4 class="counter-title">Project <br>Taken</h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="11">0</span>K</div>
                                <h4 class="counter-title">Twitter <br> Follower</h4>
                            </div>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">
                            <div class="count-box">
                                <div class="count"><span class="count-text" data-speed="5000" data-stop="12">0</span></div>
                                <h4 class="counter-title">Awards<br>won</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Fun Fact Section -->

    <!-- Project Section -->
    <section class="projects-section">
        <div class="auto-container">
            <div class="sec-title text-right">
                <span class="float-text">Products</span>
                <h2>Our Products</h2>
            </div>
        </div>
        <div class="inner-container">
            <div class="projects-carousel owl-carousel owl-theme">
                <!-- Project Block -->
                @if (!empty($products))
                @foreach ($products as $product)
                @php
                        $img = productImages($product->id);
                        @endphp
                        <a href="{{ route('Front.product.detail',$product->id) }}">
                            <div class="project-block">
                                <div class="image-box" >
                                    @if (!empty($img))
                                    <figure class="image"><img src="{{asset('uploads/product/large/'.$img->image)}}" alt="" style="height: 350px"></figure>
                                    @endif
                                    <div class="overlay-box">
                                        <h4><a href="{{ route('Front.product.detail',$product->id) }}">{{$product->name}}</a></h4>
                                        <div class="btn-box">
                                            <a href="{{asset('uploads/product/large/'.$img->image)}}" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                            <a href="{{ route('Front.product.detail',$product->id) }}"><i class="fa fa-external-link"></i></a>
                                        </div>
                                        <span class="tag">{{$product->name}}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!--End Project Section -->

    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <span class="title">Our Team</span>
                <h2>Perfect Designers</h2>
            </div>

            <div class="row clearfix">
                <!-- Team Block -->
                @foreach ($designers as $designer)
                <a href="{{route('Front.designer.detail',$designer->id)}}">
                    <div class="team-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image"><a href="{{route('Front.designer.detail',$designer->id)}}">
                                    <img src="{{asset('uploads/Designer/large/'.$designer->image)}}" alt=""></a></div>
                                <h3 class="name"><a href="{{route('Front.designer.detail',$designer->id)}}">{{$designer->name}}</a></h3>
                            </div>
                            <span class="designation">{{$designer->role}}</span>
                        </div>
                    </div>
                </a>
     
                @endforeach
               
            </div>
        </div>
    </section>
    <!--End Team Section -->

    <!-- News Section -->
    <section class="news-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text">Blogs</span>
                <h2>Blogs</h2>
            </div>
         
            <div class="row mb-minus-30">
                @if (!empty($desginer))
                @foreach ($desginer as $desg)
                <div class="col-lg-4">
                    <div class="our-team__item">
                        <div class="our-team__item-media wow clip-a-z">
                            <img src="{{asset('Asset/decorVista/assets/imgs/our-team/team-1.jpg')}}"
                                alt="image not found">
                        </div>
                        <div class="our-team__item__text">
                            <h6><a href="{{route('Front.designer.detail',$desg->id)}}">{{ $desg->name }}</a></h6>
                            <span>Designers</span>
                        </div>

                        <div class="our-team__item__socail">
                            <a href="https://www.facebook.com/">
                                <svg width="8" height="16" viewBox="0 0 8 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.19311 16V8.70218H7.55084L7.90457 5.85725H5.19311V4.04118C5.19311 3.21776 5.41238 2.65661 6.55063 2.65661L8 2.65599V0.111384C7.74935 0.0775563 6.88896 0 5.88756 0C3.79647 0 2.36488 1.32557 2.36488 3.75942V5.85725H0V8.70218H2.36488V16H5.19311Z"
                                        fill="white" />
                                </svg>
                            </a>
                            <a href="https://x.com/?lang=en">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.3319 5.92804L13.5437 0H12.3087L7.78327 5.14724L4.16883 0H0L5.46574 7.78354L0 14H1.2351L6.01406 8.56434L9.83117 14H14L8.3319 5.92804ZM6.64026 7.85211L6.08647 7.07705L1.68013 0.909771H3.57717L7.13314 5.88696L7.68693 6.66202L12.3093 13.1316H10.4122L6.64026 7.85211Z"
                                        fill="white" />
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.334 4.66649C12.8863 4.66649 13.334 4.21878 13.334 3.66651C13.334 3.11424 12.8863 2.66654 12.334 2.66654C11.7817 2.66654 11.334 3.11424 11.334 3.66651C11.334 4.21878 11.7817 4.66649 12.334 4.66649Z"
                                        fill="white" />
                                    <path
                                        d="M8.00002 3.9999C5.79041 3.9999 4.00002 5.79044 4.00002 7.9998C4.00002 10.2083 5.79041 12.0001 8.00002 12.0001C10.209 12.0001 12 10.2083 12 7.9998C12 5.79044 10.209 3.9999 8.00002 3.9999ZM8.00002 10.6667C6.5274 10.6667 5.33342 9.47278 5.33342 7.9998C5.33342 6.52683 6.5274 5.33327 8.00002 5.33327C9.47264 5.33327 10.6666 6.52683 10.6666 7.9998C10.6666 9.47278 9.47264 10.6667 8.00002 10.6667Z"
                                        fill="white" />
                                    <path
                                        d="M12 0H4C1.8002 0 0 1.80015 0 3.9999V12.0001C0 14.1993 1.8002 16 4 16H12C14.1998 16 16 14.1993 16 12.0001V3.9999C16 1.80015 14.1998 0 12 0ZM14.6666 12.0001C14.6666 13.4701 13.4708 14.6666 12 14.6666H4C2.5298 14.6666 1.3334 13.4701 1.3334 12.0001V3.9999C1.3334 2.52955 2.5298 1.33337 4 1.33337H12C13.4708 1.33337 14.6666 2.52955 14.6666 3.9999V12.0001Z"
                                        fill="white" />
                                </svg>
                            </a>
                            <a href="https://bd.linkedin.com/">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 16V10.14C16 7.26 15.38 5.06 12.02 5.06C10.4 5.06 9.32 5.94 8.88 6.78H8.84V5.32H5.66V16H8.98V10.7C8.98 9.3 9.24 7.96 10.96 7.96C12.66 7.96 12.68 9.54 12.68 10.78V15.98H16V16Z"
                                        fill="white" />
                                    <path d="M0.26 5.32H3.58V16H0.26V5.32Z" fill="white" />
                                    <path
                                        d="M1.92 0C0.86 0 0 0.86 0 1.92C0 2.98 0.86 3.86 1.92 3.86C2.98 3.86 3.84 2.98 3.84 1.92C3.84 0.86 2.98 0 1.92 0Z"
                                        fill="white" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                    
                @endif
                
            </div>
        </div>
    </section>
    <!-- "our-team  area end -->

    <!-- "happy-customer  area start -->

    <!-- "happy-customer  area end -->

    <!-- "testimonial  area start -->



    <!-- blog area start -->
  
    <section class="blog-grid section-space">
        <div class="container">
           
            <div class="row mb-minus-30">

                @if (!empty($blogs))

                @foreach ($blogs as $blog )
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">@if (!empty($blog->image))
                                <img src="{{ asset('uploads/Blog/small/' . $blog->image) }}" alt="image not found">
                                @else
                                <img src="{{ asset('Asset/Admin/img/default.png') }}" alt="image not found">
    
    
                                @endif</figure>
                                
                            <div class="overlay-box"><a href="{{ route('Front.blog.detail',$blog->id) }}"><i class="fa fa-link"></i>{{ $blog->title }}</a></div>
                        </div>
                        <div class="caption-box">
                            <h3 style="font-size: 15px"><a href="{{ route('Front.blog.detail',$blog->id) }}">{{ $blog->short_description }}</a><h3>
                            <ul class="info">
                                <li>{{ \Carbon\Carbon::parse($blog->created_at)->format('M,d, Y') }}</li>
                                <li>John Smith</li>
                            </ul>
                        </div>
                    </div>
                </div>   @endforeach

                @endif
            </div>
        </div>
    </section>
    <!--End News Section -->

    <!--Clients Section-->
    <section class="clients-section">
        <div class="inner-container">
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item"><figure class="image-box"><a href="https://bginteriorsanddecor.com/landing-page/?gad_source=1&gclid=Cj0KCQjwurS3BhCGARIsADdUH53aJYvSTEZGjTjIgyRFpJj5NMX6AOl7UsKl0fbqHOMjkLz05PlVzzYaAngxEALw_wcB"><img src="{{asset('user/images/clients/1.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="https://deinterior.com.pk/"><img src="{{asset('user/images/clients/2.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="https://hiline.pk/interior-designer-in-karachi"><img src="{{asset('user/images/clients/3.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="https://www.styleyourspace.pk/"><img src="{{asset('user/images/clients/4.png')}}" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="https://landscape.com.pk/interior-designer-in-karachi/"><img src="{{asset('user/images/clients/5.png')}}" alt=""></a></figure></li>
                   
                </ul>
            </div>
        </div>
    </section>
                      
</main>


@endsection