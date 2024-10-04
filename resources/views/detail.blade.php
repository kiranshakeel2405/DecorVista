@extends('master')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('user/images/background/10.jpg') }});">
    
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Shop Single</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">Home</a></li>
                    <li>Shop Single</li>
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
                <div class="content-side col-xl-12 col-lg-8 col-md-12">
                    <div class="shop-single">
                        <div class="product-details">

                            <!--Basic Details-->
                            <div class="basic-details">
                                <div class="row clearfix">
                                    <div class="image-column col-md-6 col-sm-12">
                                        <figure class="image-box"><a
                                                href="{{ asset('user/images/resource/products/10.jpg') }}"
                                                class="lightbox-image" title="Image Caption Here">
                                                @php
                                                    $img = productImages($product->id);
                                                @endphp

                                                @if (!empty($img))
                                                    <img src="{{ asset('uploads/product/large/' . $img->image) }}"
                                                        style="height: 600px;" alt="image not found">
                                                @endif
                                            </a></figure>
                                    </div>
                                    <div class="info-column col-md-6 col-sm-12">
                                        <div class="details-header">
                                            <h4>Product Name :
                                                <br> {{ $product->name }}
                                            </h4>

                                            <div class="item-price">Product Price: <br>${{ $product->price }}</div>
                                        </div>
                                        <div class="text">
                                            <h4>Decription</h4>
                                            {{ $product->description }}
                                        </div>
                                        <div class="other-options clearfix">
                                            <div class="item-quantity">
                                                <input class="quantity-spinner" type="number" value="1"
                                                    name="quantity" min="1">
                                            </div>
                                            <br>


                                        </div>

                                        @if ($product->qty != 0)
                                            <button type="button" class="theme-btn btn-style-one add-to-cart"
                                                onclick="AddtoCart('{{ $product->id }}')">
                                                Add To Cart
                                            </button>
                                        @else
                                            <button type="button" class="theme-btn btn-style-one add-to-cart" disabled>
                                                Out of Stock
                                            </button>
                                        @endif
                                        <button type="button" class="theme-btn btn-style-one add-to-cart"
                                            onclick="AddWishlist('{{ $product->id }}')">
                                            Add to Wishlist
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--Basic Details-->

                            <!--Product Info Tabs-->
                            <div class="product-info-tabs">
                                <!--Product Tabs-->
                                <div class="prod-tabs tabs-box">

                                    <!--Tab Btns-->
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li data-tab="#prod-details" class="tab-btn">Descripton</li>
                                        <li data-tab="#prod-reviews" class="tab-btn active-btn">Review (3)</li>
                                    </ul>

                                    <!--Tabs Container-->
                                    <div class="tabs-content">

                                        <!--Tab-->
                                        <div class="tab" id="prod-details">
                                            <div class="content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                    velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                                    deserunt mollit anim id est laborum consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                                    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                                    mollit anim id est laborum</p>
                                            </div>
                                        </div>

                                        <!--Tab-->
                                        <div class="tab active-tab" id="prod-reviews">
                                            <h2 class="title">3 Reviews For Patient Ninja</h2>
                                            <!--Reviews Container-->
                                            <div class="comments-area style-two">
                                                <!--Comment Box-->
                                                <div class="comment-box">
                                                    <div class="comment">
                                                        <div class="author-thumb"><img
                                                                src="{{ asset('user/images/resource/author-6.jpg') }}"
                                                                alt=""></div>
                                                        <div class="comment-inner">
                                                            <div class="comment-info clearfix">James Koster <span>June
                                                                    7’2013:</span></div>
                                                            <div class="rating">
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star light"></span>
                                                            </div>
                                                            <div class="text">Lorem Ipsum is simply dummy text of the
                                                                printing and typesetting industry. Lorem Ipsum has been the
                                                                industry's.</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Comment Box-->
                                                <div class="comment-box reply-comment">
                                                    <div class="comment">
                                                        <div class="author-thumb"><img
                                                                src="{{ asset('user/images/resource/author-7.jpg') }}"
                                                                alt=""></div>
                                                        <div class="comment-inner">
                                                            <div class="comment-info clearfix">Cobus Besten <span>June
                                                                    7’2013:</span></div>
                                                            <div class="rating">
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                            </div>
                                                            <div class="text">Lorem Ipsum is simply dummy text of the
                                                                printing </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Comment Box-->
                                                <div class="comment-box">
                                                    <div class="comment">
                                                        <div class="author-thumb"><img
                                                                src="{{ asset('user/images/resource/author-8.jpg') }}"
                                                                alt=""></div>
                                                        <div class="comment-inner">
                                                            <div class="comment-info clearfix">Magnus <span>June
                                                                    7’2013:</span></div>
                                                            <div class="rating">
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                                <span class="fa fa-star"></span>
                                                            </div>
                                                            <div class="text">Contrary to popular belief, Lorem Ipsum is
                                                                not simply random text. It has roots in a piece of classical
                                                                Latin literature from 45 BC, making it over 2000 years old.
                                                                Richard McClintock, </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Comment Form -->
                                            <div class="shop-comment-form">
                                                <h2>Add A REVIEW</h2>
                                                <div class="mail-text"><span class="theme_color">Your email address will
                                                        not be published.</span> Required fields are marked*</div>
                                                <div class="rating-box">
                                                    <div class="text"> Your Rating:</div>
                                                    <div class="rating">
                                                        <a href="#"><span class="fa fa-star"></span></a>
                                                    </div>
                                                    <div class="rating">
                                                        <a href="#"><span class="fa fa-star"></span><span
                                                                class="fa fa-star"></span></a>
                                                        <a href="#"></a>
                                                    </div>
                                                    <div class="rating">
                                                        <a href="#"><span class="fa fa-star"></span><span
                                                                class="fa fa-star"></span><span
                                                                class="fa fa-star"></span></a>
                                                    </div>
                                                    <div class="rating">
                                                        <a href="#"><span class="fa fa-star"></span><span
                                                                class="fa fa-star"></span><span
                                                                class="fa fa-star"></span><span
                                                                class="fa fa-star"></span></a>
                                                    </div>
                                                    <div class="rating">
                                                        <a href="#"><span class="fa fa-star"></span><span
                                                                class="fa fa-star"></span><span
                                                                class="fa fa-star"></span><span
                                                                class="fa fa-star"></span><span
                                                                class="fa fa-star"></span></a>
                                                    </div>
                                                </div>
                                                <form method="post" action="" name="CommentForm" id="CommentForm">
                                                    <input type="hidden" value="{{ $product->id}}" name="id" id="id">
                                                    <div class="form-group">
                                                        <label>Your Review*</label>
                                                        <textarea name="message" id="message" placeholder=""></textarea>
                                                        <span></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" name="name" id="name"
                                                            placeholder="">
                                                        <span></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" id="email"
                                                            placeholder="">
                                                        <span></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="theme-btn btn-style-one" type="submit"
                                                            name="submit-form">SUBMIT</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Product Info Tabs-->
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            function AddtoCart(id) {

                $.ajax({
                    url: '{{ route('AddtoCart') }}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == true) {
                            window.location.href = "{{ route('Front.cart') }}"
                        } else {
                            alert(response.msg)
                        }
                    },
                });
            }

            function AddWishlist(id) {
                $.ajax({
                    url: '{{ route('Store.Wishlist') }}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == true) {
                            alert(response.msg)
                        } else {
                            alert(response.msg)
                        }
                    },
                });
            }


            $(document).ready(function() {
                $('#CommentForm').submit(function(event) {

                    event.preventDefault();
                    var data = $(this).serializeArray();
                    $.ajax({
                        url: '{{ route('comments.store') }}',
                        type: 'post',
                        data: data,
                        _token: '{{ csrf_token() }}',
                        success: function(response) {
                            if(response.isLogin == false){
                                alert(response.msg);
                            }
                            
                            if (response.status == true) {
                             
                                alert(response.msg);

                                window.location.reload();

                                ('#name').removeClass('is-invalid').siblings('span').removeClass(
                                        'invalid-feedback')
                                    .html('')
                                $('#email').removeClass('is-invalid').siblings('span').removeClass(
                                        'invalid-feedback')
                                    .html('')
                                $('#message').removeClass('is-invalid').siblings('span')
                                    .removeClass(
                                        'invalid-feedback')
                                    .html('')
                            } else {
                                var error = response['errors']
                                if (error['name']) {
                                    $('#name').addClass('is-invalid').siblings('span').addClass(
                                            'invalid-feedback')
                                        .html(error['name'])
                                } else {
                                    $('#name').removeClass('is-invalid').siblings('span')
                                        .removeClass(
                                            'invalid-feedback').html('')
                                }
                                if (error['email']) {
                                    $('#email').addClass('is-invalid').siblings('span').addClass(
                                            'invalid-feedback')
                                        .html(error['email'])
                                } else {
                                    $('#email').removeClass('is-invalid').siblings('span')
                                        .removeClass(
                                            'invalid-feedback').html('')
                                }

                                if (error['message']) {
                                    $('#message').addClass('is-invalid').siblings('span').addClass(
                                            'invalid-feedback')
                                        .html(error['message'])
                                } else {
                                    $('#message').removeClass('is-invalid').siblings('span')
                                        .removeClass(
                                            'invalid-feedback').html('')
                                }
                            }

                        },
                    });
                })
            });
        </script>
    </div>
    <!--End Sidebar Page Container-->
    {{-- 
<main>
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
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Detail Page
                        </h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('Front.index') }}">Home</a></span></li>
                                    <li class="active"><span>Detail Page</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <section class="blog-details section-space">
        <div style="display: flex; align-items: center; padding: 0px 48px; " class="blog-details__content">
            <div class="blog-details__content">
                @php
                $img = productImages($product->id);
                @endphp

                @if (!empty($img))
                <img src="{{asset('uploads/product/large/'.$img->image)}}" style="height: 600px;" alt="image not found">
                @endif
            </div>

            <div style="padding-left: 44px" class="section__title-wrapper mb-45 mb-xs-40">
                <h2 class="section__title mb-25 title-animation">{{$product->name }}</h2>
                <h3 style="color: #906e50;">${{ $product->price }}</h3>
                <p style="padding-top: 40px" class="mb-0">{{ $product->description}}</p>
                @if ($product->qty != 0)
                <button type="button" onclick="AddtoCart('{{$product->id}}')" style="margin-top: 40px" type="submit"
                    class="rr-btn">
                    <span class="btn-wrap">
                        <span class="text-one">Add to Cart
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6H11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="text-two">Add to cart
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6H11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </span>
                </button>

                @else
                <button type="button"  style="margin-top: 40px" type="submit"
                    class="rr-btn">
                    <span class="btn-wrap">
                        <span class="text-one">Out of Stock
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6H11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="text-two">Out of Stock
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6H11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </span>
                </button>
                @endif

                <button type="button" style="margin-top: 40px" type="submit" class="rr-btn"
                    onclick="AddWishlist('{{$product->id}}')">
                    <span class="btn-wrap">
                        <span class="text-one">Add to Wishlist
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6H11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="text-two">Add to Wishlist
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 6H11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </span>
                </button>
            </div>
        </div>                           </div>

                                <div class="col-12">
                                    <div class="live-comment-widget__form-input">
                                        <label>Website</label>
                                        <input name="text" id="text" type="text">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="live-comment-widget__form-input">
                                        <div class="validation__wrapper-up position-relative">
                                            <label>Comment</label>
                                            <textarea name="textarea" id="textarea"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-between mb-40">
                                    <div class="live-comment-widget__agree">
                                        <input type="checkbox" class="form-check-input" id="agree">
                                        <label for="agree">Save my name, email, and website in this browser for the next
                                            time I comment.</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="rr-btn">
                                        <span class="btn-wrap">
                                            <span class="text-one">Post Comment
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6H11" stroke="white" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <span class="text-two">Post Comment
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6H11" stroke="white" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</section>
</main>

--}}
@endsection
