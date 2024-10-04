@extends('master');
@section('content')

<main>
    <!-- Breadcrumb area start  -->
    <div style="margin-top: -29px" class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{asset('Asset/decorVista/assets/imgs/breadcrumb/page-header-1.png')}}"></div>
        <div class="container">
            <div class="breadcrumb__bg-left"></div>
            <div class="breadcrumb__bg-right"></div>
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div style="margin-top: 100px;"  class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">My Design</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="index.html">Home</a></span></li>
                                    <li  class="active"><span>My Design</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->
    <section class=" section-11 ">
        <div class="container  mt-5">
            <div class="row order-row">
                <div class="col-md-3">
                </div>
                <div class=" p-5">
                    <div style="margin: 0px 105px" class="card">
                        <div class="card-header wishlist">
                            <h2 style="font-weight: 700;font-size: 37px;color: #5e5246;font-weight: 500;" class="h5 mb-0 pt-2 pb-2 nav-nigth">My Design</h2>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                                <div class="d-block d-sm-flex align-items-start text-center text-sm-start">
                                    <a class="d-block flex-shrink-0 mx-auto me-sm-4"
                                        href="#"
                                        style="width: 10rem;">
                                        <img style="width: 500px;" src="{{asset('Asset/decorVista/assets/imgs/blog-grid/blog-4.png')}}" alt="Product" class="wishlist-item-img">
                                        {{-- <img style="width: 100%;" src="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-2.jpg')}}" alt="Product"class="wishlist-item-img"> --}}
                                    </a>
                                    <div class="pt-2">
                                        <h3 class="product-title fs-base mb-2 Wishlist-item-title"><a style="font-size: 45px;color: #000;text-decoration: none;font-weight: 500;" href="#" class="nav-nigth"></a></h3>
                                        <div style="font-size: 35px;color: #000;font-weight: 500;" class="fs-lg text-accent pt-2 Wishlist-item-price nav-nigth"></div>
                                    </div>
                                </div>
                                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                    <button style="font-size: 18px;" class="btn btn-outline-danger btn-sm" type="button"><i class="fas fa-trash-alt me-2"></i>Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection    