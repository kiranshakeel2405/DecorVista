<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>DecorVista</title>
    <!-- Stylesheets -->
    <link href="{{ asset('user/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/responsive.css') }}" rel="stylesheet">
    <!--Color Switcher Mockup-->
    <link href="{{ asset('user/css/color-switcher-design.css') }}" rel="stylesheet">
    <!--Color Themes-->
    <link id="theme-color-file" href="{{ asset('user/css/color-themes/default-theme.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('user/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('user/images/favicon.png') }}" type="image/x-icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>

<body>

    <div class="page-wrapper">
        <!-- Preloader -->
        {{-- <div class="preloader"></div> --}}

        <!-- Main Header-->
        <header class="main-header header-style-one">
            <div class="auto-container">
                <div class="header-lower">
                    <div class="main-box clearfix">
                        <div style="margin-top: 17px;" class="logo-box">
                            <div class="logo"><a style=" color: #ffffff; font-size: 28px; font-weight: bold;"
                                    href="{{ url('/') }}" class="">DecorVista</a></div>
                        </div>

                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md ">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="icon flaticon-menu-button"></span>
                                    </button>
                                </div>

                                <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ route('Front.about') }}">About</a> </li>
                                        <li><a href="{{ route('Front.gallery') }}">Gallery</a></li>

                                        @php
                                            $categories = Category();
                                        @endphp

                                        <li class="dropdown"><a href="#">Categories</a>
                                            <ul>
                                                @if (!empty($categories))
                                                    @foreach ($categories as $category)
                                                        <li><a
                                                                href="{{ route('Front.category', $category->id) }}">{{ $category->name }}</a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                        {{-- <li><a href="{{url('/design')}}">Design</a></li> --}}
                                        {{-- <li><a href="{{ route('Front.products') }}">Products</a> </li> --}}
                                        <li><a href="{{ route('productsall') }}">Shop</a></li>
                                        <li><a href="{{ route('Front.contact') }}">Contact</a></li>
                                        <li><a href="{{ route('Front.cart') }}">Cart</a></li>
                                        @if (Auth::check())
                                             <li class="dropdown"><a href="#">Account</a>
                                            <ul>
                                               <li><a href="{{ route('logout') }}">Logout</a></li>
                                               <li><a href="{{ route('Front.wishlist') }}">My WishList</a></li>
                                               <li><a href="{{ route('Front.order') }}">My Orders</a></li>
                                            </ul>


                                        @else
                                            <li><a href="{{ route('login') }}"><span
                                                class="fa fa-user mt-2"></span></a></li>
                                        @endif

                                    </ul>
                                </div>
                            </nav><!-- Main Menu End-->

                            <!-- Outer Box-->
                            <div class="outer-box">
                                <!--Search Box-->
                                <div class="search-box-outer">
                                    <div class="dropdown">
                                        <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                                class="fa fa-search"></span></button>
                                        <ul class="dropdown-menu pull-right search-panel"
                                            aria-labelledby="dropdownMenu3">
                                            <li class="panel-outer">
                                                <div class="form-container">
                                                    <form method="post" action="#">
                                                        <div class="form-group">
                                                            <input type="search" name="field-name" value=""
                                                                placeholder="Search Here" required>
                                                            <button type="submit" class="search-btn"><span
                                                                    class="fa fa-search"></span></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--End Main Header -->



    @yield('content')

    <!-- Main Footer -->
    <footer class="main-footer" style="background-image: url({{ asset('user/images/background/5.jpg') }});">
        <div class="auto-container">
            <!--Widgets Section-->
            <div class="widgets-section">
                <div class="row">
                    <!--Big Column-->
                    <div class="big-column col-xl-7 col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <!--Footer Column-->
                            <div class="footer-column col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget about-widget">
                                    <div class="footer-logo">
                                        <figure>
                                            <div class="logo"><a style=" color: #ffffff; font-size: 28px; font-weight: bold;" href="{{url('/')}}" class="p-5">DecorVista</a></div>
                                        </figure>
                                    </div>
                                    <div class="widget-content">
                                        <div class="text">Contra and layouts, in content of dummy text is
                                            nonsensical.typefaces of dummy text is appearance of different general
                                            the content of dummy text is nonsensical. typefaces of dummy text is
                                            nonsensical.</div>
                                    </div>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget recent-posts">
                                    <h2 class="widget-title">Recent Posts</h2>
                                    <!--Footer Column-->
                                    <div class="widget-content">
                                        <div class="post">
                                            <div class="thumb"><a href="blog-detail.html"><img
                                                        src="{{ asset('user/images/resource/post-thumb-1.jpg') }}"
                                                        alt=""></a></div>
                                            <h4><a href="blog-detail.html">Triangle Concrete House on lake</a></h4>
                                            <ul class="info">
                                                <li>26 Aug</li>
                                                <li>3 Comments</li>
                                            </ul>
                                        </div>

                                        <div class="post">
                                            <div class="thumb"><a href="blog-detail.html"><img
                                                        src="{{ asset('user/images/resource/post-thumb-2.jpg') }}"
                                                        alt=""></a></div>
                                            <h4><a href="blog-detail.html">The Amazing Interior for the Hotel
                                                    art</a></h4>
                                            <ul class="info">
                                                <li>26 Aug</li>
                                                <li>3 Comments</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Big Column-->
                    <div class="big-column col-xl-5 col-lg-12 col-md-12 col-sm-12">
                        <div class="row clearfix">
                            <div class="footer-column col-xl-5 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h2 class="widget-title">Useful links</h2>
                                    <div class="widget-content">
                                        <ul class="list">
                                            <li><a href="{{ url('/') }}">Home</a></li>
                                            <li><a href="{{ route('Front.about') }}">About</a> </li>
                                            <li><a href="{{ route('Front.gallery') }}">Contact</a></li>
                                            <li><a href="{{ route('Front.gallery') }}">Gallery</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!--Footer Column-->
                            <div class="footer-column col-xl-7 col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget gallery-widget">
                                    <h2 class="widget-title">Recent Works</h2>
                                    <div class="widget-content">
                                        <div class="outer clearfix">
                                            <figure class="image">
                                                <a href="{{ asset('user/images/gallery/1.jpg') }}"
                                                    class="lightbox-image" title="Image Title Here"><img
                                                        src="{{ asset('user/images/resource/work') }}-thumb-1.jpg"
                                                        alt=""></a>
                                            </figure>

                                            <figure class="image">
                                                <a href="{{ asset('user/images/gallery/2.jpg') }}"
                                                    class="lightbox-image" title="Image Title Here"><img
                                                        src="{{ asset('user/images/resource/work') }}-thumb-2.jpg"
                                                        alt=""></a>
                                            </figure>

                                            <figure class="image">
                                                <a href="{{ asset('user/images/gallery/3.jpg') }}"
                                                    class="lightbox-image" title="Image Title Here"><img
                                                        src="{{ asset('user/images/resource/work') }}-thumb-3.jpg"
                                                        alt=""></a>
                                            </figure>

                                            <figure class="image">
                                                <a href="{{ asset('user/images/gallery/4.jpg') }}"
                                                    class="lightbox-image" title="Image Title Here"><img
                                                        src="{{ asset('user/images/resource/work') }}-thumb-4.jpg"
                                                        alt=""></a>
                                            </figure>

                                            <figure class="image">
                                                <a href="{{ asset('user/images/gallery/5.jpg') }}"
                                                    class="lightbox-image" title="Image Title Here"><img
                                                        src="{{ asset('user/images/resource/work') }}-thumb-5.jpg"
                                                        alt=""></a>
                                            </figure>

                                            <figure class="image">
                                                <a href="{{ asset('user/images/gallery/1.jpg') }}"
                                                    class="lightbox-image" title="Image Title Here"><img
                                                        src="{{ asset('user/images/resource/work') }}-thumb-6.jpg"
                                                        alt=""></a>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="social-links">
                        <ul class="social-icon-two">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>

                    <div class="copyright-text">
                        <a href="https://www.templateshub.net" target="_blank">Templates Hub</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Main Footer -->

    </div>

    <script>
        @yield('js')
    </script>

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-o-up"></span>
    </div>
    <script src="{{ asset('user/js/jquery.js') }}"></script>
    <script src="{{ asset('user/js/popper.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('user/js/owl.js') }}"></script>
    <script src="{{ asset('user/js/wow.js') }}"></script>
    <script src="{{ asset('user/js/appear.js') }}"></script>
    <script src="{{ asset('user/js/mixitup.js') }}"></script>
    <script src="{{ asset('user/js/script.js') }}"></script>
    <script src="{{ asset('user/js/jquery.bootstrap-touchspin.js') }}"></script>
    <!-- Color Setting -->
    <script src="{{ asset('user/js/color-settings.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        </script>
        
       
</body>
<script>
  
</script>

</html>
