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
                    <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">My Portfolio</h2>

                    <div class="breadcrumb__menu">
                        <nav>
                            <ul>
                                <li><span><a href="index.html">Home</a></span></li>
                                <li  class="active"><span>My Portfolio</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb area start  -->

    <!-- "team-details  area start -->
    <section class="team-details section-space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="team-details__media wow clip-a-z">
                        <img src="{{asset('Asset/decorVista/assets/imgs/our-team/team-2.jpg')}}" alt="image not found">
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="team-details__content">
                        <h2 class="name title-animation">William Lucas</h2>
                        <span class="designation">Designer </span>
                        <p>Eros justo, posuere loborti viverra laoreet matti ullamcorper posuere viverra .Aliquam eros justo, posuere lobortis, viverra laoreet augue mattis fermentum ullamcorper viverra laoreet Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere</p>

                        <div class="team-details__skill__progress mb-50 mb-xs-30">
                            <h6 class="mb-20">Skills</h6>
                            <div class="team-details__skill__progress-single">
                                <h6 class="team-details__skill__progress-title">Devoloping Process</h6>
                                <div class="bar">
                                    <div class="count-text">75%</div>
                                    <div class="bar-inner count-bar counted" data-percent="75%">
                                    </div>
                                </div>
                            </div>
    
                            <div class="team-details__skill__progress-single">
                                <h6 class="team-details__skill__progress-title">Power Design</h6>
                                <div class="bar">
                                    <div class="count-text">85%</div>
                                    <div class="bar-inner count-bar counted" data-percent="85%">
                                    </div>
                                </div>
                            </div>
                            <div class="team-details__skill__progress-single">
                                <h6 class="team-details__skill__progress-title">Comfort Functionality</h6>
                                <div class="bar">
                                    <div class="count-text">80%</div>
                                    <div class="bar-inner count-bar counted" data-percent="80%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="team-details__wrapper">
                            <a href="{{url('/contact-us')}}" class="rr-btn">
                                <span class="btn-wrap">
                                    <span class="text-one">Contact Now
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6.5H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M6 1.5L11 6.5L6 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                    <span class="text-two">Contact Now
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 6.5H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M6 1.5L11 6.5L6 11.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </span>
                            </a>
                            
                            <div class="team-details__social">

                                <h6>Follow me:</h6>
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://bd.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- "team-details  area end -->

    <div class="biography section-space__bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h6 class="mb-20">Biography</h6>
                    <p>Neque porro quisquam est, qui is dolor emr ipsum quia dolor sit amet the consec tetur is adipisci velit, sed the quia non num quam. Neque porro quis quam est, qui dolor emr ipsum quia dolor sit amet, consec tetur. Esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et ac cumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
            
                    <p class="mb-0">Neque porro quisquam est, qui is dolor emr ipsum quia dolor sit amet the consec tetur is adipisci velit, sed the quia non num quam. Neque porro quis quam est, qui dolor emr ipsum quia dolor sit amet, consec tetur. Esse mo lestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et ac cumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                </div>
            </div>
        </div>
    </div>

    <section style="    margin-top: 0px; margin-bottom: 100px" class="protfolio section-space__top">
        <div class="container">
            {{-- <div class="protfolio__tab masonary-menu">
                <button data-filter="*" class="active">All </button>
                <button data-filter=".architecture">architecture</button>
                <button data-filter=".commercial">Commercial</button>
                <button data-filter=".corporate">Corporate</button>
                <button data-filter=".interior">Interior</button>
                <button data-filter=".residential">Residential</button>
            </div> --}}
            <div class="row">
                <div class="section__title-wrapper text-center mb-55 mb-xs-40">
                    <span class="section__subtitle justify-content-center">Projects</span>
                    <h2 class="section__title title-animation">Latest Projects</h2>
                </div>
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
        </div>
    </section>

    <section class="get-in-touch ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="get-in-touch__media wow clip-a-z">
                        <img src="{{asset('Asset/decorVista/assets/imgs/team-details/team-2.jpg')}}" alt="image not found">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="get-in-touch__contact-form">
                        <span>Get In Touch</span>
                        <h2>Contact Me</h2>

                        <div class="row">
                            <div class="col-12">
                                <div class="get-in-touch__form-input">
                                    <input name="name" id="lname" type="text" placeholder="Your Name">
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="get-in-touch__form-input">
                                    <input name="number" id="number" type="number" placeholder="Your number">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="get-in-touch__form-input">
                                    <input name="email" id="email" type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="get-in-touch__form-input">
                                    <div class="validation__wrapper-up position-relative">
                                        <textarea name="textarea" id="textarea" placeholder="Send Message"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="rr-btn">
                                        <span class="btn-wrap">
                                            <span class="text-one">Make An Order
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                            <span class="text-two">Make An Order
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 6H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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