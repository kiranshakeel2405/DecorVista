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
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Blog Details</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('Front.index') }}">Home</a></span></li>
                                    <li class="active"><span>Blog Details</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    {{-- <section class="blog-details section-space">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="blog-details__content">
                        <div class="blog-details__content">
                            <div class="details">
                                <img src="{{asset('Asset/decorVista/assets/imgs/blog-details/blog-details.jpg')}}" alt="image not found">
                            </div>
                            
                     
    

                        <div class="comment-widget mt-50 mt-xs-60">
                            <h6 class="comment-widget__title">02 Comments</h6>

                            <div class="comment-item d-flex align-items-start mb-30">
                                <div class="comment-item__img">
                                    <img src="{{asset('Asset/decorVista/assets/imgs/blog-details/author-1.png')}}" alt="image not found">
                                </div>
                                <div class="comment-item__content">
                                    <span class="name">{{ $blog->title }}</span>
                                    <span class="date">{{\Carbon\Carbon::parse($blog->created_at)-format('m, d, Y at h:i A')}} at {{ \Carbon\Carbon::parse($blog->created_at)->format('h:i A') }}
                                    </span>
                                    <p>Phasellus ac eleifend nunc. Aenean efficitur, augue a tristique mollis, nulla leo dictum nunc, viverra magna sapien ut dolor.</p>
                                    <button class="rr-btn btn-gary">
                                        <span class="btn-wrap">
                                            <span class="text-one">Reply</span>
                                            <span class="text-two">Reply</span>
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <div class="comment-item d-flex align-items-start comment-item__reply mb-30">
                                <div class="comment-item__img">
                                    <img src="{{asset('Asset/decorVista/assets/imgs/blog-details/author-2.png')}}" alt="image not found">
                                </div>
                                <div class="comment-item__content">
                                    <span class="name">Fletch Skinner</span>
                                    <span class="date mb-10">march 26,2024 at 10:47 pm</span>
                                    <p class="mb-20">Phasellus ac eleifend nunc. Aenean efficitur, augue a tristique mollis, nulla leo dictum nunc, viverra magna sapien ut dolor.</p>
                                    <button class="rr-btn">
                                        <span class="btn-wrap">
                                            <span class="text-one">Reply</span>
                                            <span class="text-two">Reply</span>
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <div class="comment-item d-flex align-items-start mb-30">
                                <div class="comment-item__img">
                                    <img src="{{asset('Asset/decorVista/assets/imgs/blog-details/author-1.png')}}" alt="image not found">
                                </div>
                                <div class="comment-item__content">
                                    <span class="name">Samuel Serif</span>
                                    <span class="date">march 26,2024 at 10:47 pm</span>
                                    <p>Phasellus ac eleifend nunc. Aenean efficitur, augue a tristique mollis, nulla leo dictum nunc, viverra magna sapien ut dolor.</p>
                                    <button class="rr-btn btn-gary">
                                        <span class="btn-wrap">
                                            <span class="text-one">Reply</span>
                                            <span class="text-two">Reply</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
    
                        <div class="live-comment-widget mt-80 mt-xs-60">
                            <h3 class="mb-10">Leave a Comment</h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
    
                            <div class="live-comment-widget__form">
                                <div class="row g-20">
                                    <div class="col-xl-6">
                                        <div class="live-comment-widget__form-input">
                                            <label>Name *</label>
                                            <input name="name" id="name" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="live-comment-widget__form-input">
                                            <label >Email *</label>
                                            <input name="email" id="email" type="email">
                                        </div>
                                    </div>
    
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
                                                <textarea name="textarea" id="textarea" ></textarea>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-12 d-flex justify-content-between mb-40">
                                        <div class="live-comment-widget__agree">
                                            <input type="checkbox" class="form-check-input" id="agree">
                                            <label for="agree">Save my name, email, and website in this browser for the next time I comment.</label>
                                        </div>
                                    </div>
    
                                    <div class="col-12">
                                        <button type="submit" class="rr-btn">
                                            <span class="btn-wrap">
                                                <span class="text-one">Post Comment
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6H11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M6 1L11 6L6 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </span>
                                                <span class="text-two">Post Comment 
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
    
            
            </div>
        </div>
    </section> --}}



    <section class="blog-details section-space">
       
        <div class="container">
            <div class="row">
                <div style="align-items: center; " class="blog-details__content">
                    <div class="blog-details__content">
                        @if (!empty($blog->image))
                        <img src="{{asset('uploads/Blog/large/'.$blog->image)}}" style="height: 600px;" alt="image not found">

                            
                        @endif
                    </div>
        
                    </div>
                <div style="margin-top: 35px;" class="col-xl-8">
                    <div class="blog-details__content">
                    
                        <ul class="blog-details__meta">
                            <li>
                                <a href="blog-details.html">
                                    <svg width="11" height="13" viewBox="0 0 11 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.5625 2H6.9375V1.0625C6.9375 0.757812 7.17188 0.5 7.5 0.5C7.80469 0.5 8.0625 0.757812 8.0625 1.0625V2H9C9.82031 2 10.5 2.67969 10.5 3.5V11C10.5 11.8438 9.82031 12.5 9 12.5H1.5C0.65625 12.5 0 11.8438 0 11V3.5C0 2.67969 0.65625 2 1.5 2H2.4375V1.0625C2.4375 0.757812 2.67188 0.5 3 0.5C3.30469 0.5 3.5625 0.757812 3.5625 1.0625V2ZM1.125 6.3125H3V5H1.125V6.3125ZM1.125 7.4375V8.9375H3V7.4375H1.125ZM4.125 7.4375V8.9375H6.375V7.4375H4.125ZM7.5 7.4375V8.9375H9.375V7.4375H7.5ZM9.375 5H7.5V6.3125H9.375V5ZM9.375 10.0625H7.5V11.375H9C9.1875 11.375 9.375 11.2109 9.375 11V10.0625ZM6.375 10.0625H4.125V11.375H6.375V10.0625ZM3 10.0625H1.125V11C1.125 11.2109 1.28906 11.375 1.5 11.375H3V10.0625ZM6.375 5H4.125V6.3125H6.375V5Z" fill="#906E50"/>
                                        </svg>                                        
                                        {{\Carbon\Carbon::parse($blog->created_at)->format('M, d, Y')}} at {{ \Carbon\Carbon::parse($blog->created_at)->format('h:i A') }}
                                </a>
                            </li>
                           
                        </ul>
    
                        <h4>{{$blog->title}}.</h4>
    
                        <p>{{$blog->description}}</p>

                        
    
                        
                    
                </div>
                </div>
    
                 
            </div>
        </div>
    </section>
    
</main>

@endsection