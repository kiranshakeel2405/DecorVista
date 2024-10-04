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
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Design</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{url('/')}}">Home</a></span></li>
                                    <li class="active"><span>Design</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <section class="protfolio section-space__top">
        <div class="container">
            <div class="protfolio__tab masonary-menu">
                <button data-filter="*" class="active">All </button>
                <button data-filter=".architecture">architecture</button>
                <button data-filter=".commercial">Commercial</button>
                <button data-filter=".corporate">Corporate</button>
                <button data-filter=".interior">Interior</button>
                <button data-filter=".residential">Residential</button>
            </div>

            <div class="protfolio__item-wrapper">
                <div class="row grid mb-minus-30">
                <div class="col-lg-4 col-sm-6 grid-item architecture interior">
                    <div class="protfolio__item">
                    <div class="protfolio__item-media ">
                        <img src="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-1.jpg')}}" class="img-fluid" alt="image not found">
                    </div>
                    <a href="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-1.jpg')}}"  class="protfolio__item-icon  popup-image">
                        <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M27 2V52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 27H52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <div class="protfolio__item-text">
                        <span class="price">Architecture – Luxury Living</span>
                        <h6><a href="#">Modern Family House</a></h6>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 grid-item commercial">
                    <div class="protfolio__item">
                        <div class="protfolio__item-media">
                            <img src="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-2.jpg')}}" class="img-fluid" alt="image not found">
                        </div>
                        <a href="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-2.jpg')}}" class="protfolio__item-icon  popup-image">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 2V52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 27H52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a> 
                        <div class="protfolio__item-text">
                            <span class="price">Architecture – Luxury Living</span>
                            <h6><a href="#">Longwater Avenue</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 grid-item corporate interior">
                    <div class="protfolio__item">
        
                        <div class="protfolio__item-media ">
                            <img src="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-3.jpg')}}" class="img-fluid" alt="image not found">
                        </div>
                        <a href="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-3.jpg')}}" class="protfolio__item-icon  popup-image">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 2V52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 27H52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a> 
                        <div class="protfolio__item-text">
                            <span class="price">Architecture – Luxury Living</span>
                            <h6><a href="#">Urbanest City</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 grid-item corporate architecture">
                    <div class="protfolio__item">
                        <div  class="protfolio__item-media ">
                            <img src="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-4.jpg')}}" class="img-fluid" alt="image not found">
                        </div>
                        <a href="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-4.jpg')}}" class="protfolio__item-icon popup-image">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 2V52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 27H52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a> 
                        <div class="protfolio__item-text">
                            <span class="price">Architecture – Luxury Living</span>
                            <h6><a href="#">Lowesmoor Wharf</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 grid-item commercial">
                    <div class="protfolio__item">
                        <div  class="protfolio__item-media ">
                            <img src="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-5.jpg')}}" class="img-fluid" alt="image not found">
                        </div>
                        <a href="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-5.jpg')}}" class="protfolio__item-icon popup-image">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 2V52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 27H52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a> 
                        <div class="protfolio__item-text">
                            <span class="price">Architecture – Luxury Living</span>
                            <h6><a href="#">Medius House</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 grid-item commercial corporate">
                    <div class="protfolio__item">
                    <div  class="protfolio__item-media ">
                        <img src="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-6.jpg')}}" class="img-fluid" alt="image not found">
                    </div>
                    <a href="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-6.jpg')}}" class="protfolio__item-icon popup-image">
                        <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M27 2V52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2 27H52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a> 
                    <div class="protfolio__item-text">
                       
                        <span class="price">Architecture – Luxury Living</span>
                        <h6><a href="#">Chapter House Interiors</a></h6>
                        
                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-sm-6 grid-item residential architecture">
                    <div class="protfolio__item">
                        <div  class="protfolio__item-media ">
                            <img src="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-7.jpg')}}" class="img-fluid" alt="image not found">
                        </div>
                        <a href="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-7.jpg')}}" class="protfolio__item-icon popup-image">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 2V52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 27H52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a> 
                        <div class="protfolio__item-text">
                            <span class="price">Architecture – Luxury Living</span>
                            <h6><a href="#">Auriens John's Wood</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 grid-item interior">
                    <div class="protfolio__item">
                        <div  class="protfolio__item-media ">
                            <img src="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-8.jpg')}}" class="img-fluid" alt="image not found">
                        </div>
                        <a href="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-8.jpg')}}" class="protfolio__item-icon popup-image">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 2V52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 27H52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a> 
                        <div class="protfolio__item-text">
                            <span class="price">Architecture – Luxury Living</span>
                            <h6><a href="#">Bathroom House</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 grid-item residential">
                    <div class="protfolio__item">
                        <div  class="protfolio__item-media ">
                            <img src="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-9.jpg')}}" class="img-fluid" alt="image not found">
                        </div>
                        <a href="{{asset('Asset/decorVista/assets/imgs/protfolio/protfolio-9.jpg')}}" class="protfolio__item-icon popup-image">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27 2V52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2 27H52" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a> 
                        <div class="protfolio__item-text">
                            <span class="price">Architecture – Luxury Living</span>
                            <h6><a href="#">Interiors House</a></h6>
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>

        <!-- brand area start -->
        <section class="brand section-space has--transparent">
            <div class="container">
                <div class="slider-brand">
                    <div class="container">
                        <div class="rr-scroller" data-speed="slow">
                            <ul class="text-anim rr-scroller__inner">
                                <li><a href="#"><img src="{{asset('Asset/decorVista/assets/imgs/brand-2/brand-1.png')}}" alt="image not found"></a></li>
                                <li><a href="#"><img src="{{asset('Asset/decorVista/assets/imgs/brand-2/brand-2.png')}}" alt="image not found"></a></li>
                                <li><a href="#"><img src="{{asset('Asset/decorVista/assets/imgs/brand-2/brand-4.png')}}" alt="image not found"></a></li>
                                <li><a href="#"><img src="{{asset('Asset/decorVista/assets/imgs/brand-2/brand-1.png')}}" alt="image not found"></a></li>
                                <li><a href="#"><img src="{{asset('Asset/decorVista/assets/imgs/brand-2/brand-2.png')}}" alt="image not found"></a></li>
                                <li><a href="#"><img src="{{asset('Asset/decorVista/assets/imgs/brand-2/brand-4.png')}}" alt="image not found"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- brand area end -->
</main>

@endsection