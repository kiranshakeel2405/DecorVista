@extends('master')
@section('content')
    <!--Page Title-->
    @include('Message.message')
    <section class="page-title" style="background-image:url({{ asset('user/images/background/10.jpg') }});">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>{{$projects->project_type}} Detail</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Designer Project</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <section class="project-details-section">

        <div class="project-detail">
            <div class="auto-container">
                <!-- Upper Box -->
                <div class="upper-box">
                    <!--Project Tabs-->
                    <div class="project-tabs tabs-box clearfix row">
                        <!--Tab Btns-->

                        <ul class="tab-btns tab-buttons clearfix mr-0 col-md-2 row align-items-center justify-content-center h-100" id="tabButtonContainer">
                        </ul>
                        
                        <!--Tabs Container-->
                        <div class="tabs-content col-md-10" id="tabsContentContainer">
                        </div>
                    </div>
                </div>
                <style>
                    .project-details-section #tabButtonContainer {
                        flex-direction: column;
                        flex-wrap: nowrap;
                        gap: 1.0rem;
                    }
                    .project-details-section #tabButtonContainer li {
                        flex-grow: 1;
                    }
                    .project-details-section #tabButtonContainer li img{
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                        border-radius: 10px;
                        scale: 1.0;
                        filter: grayscale(1);
                        opacity: 0.4;
                        transition: all 0.6s cubic-bezier(0.68, -0.6, 0.32, 1.6);
                    }
                    .project-details-section #tabButtonContainer li.active-btn img{
                        scale: 1.1;
                        filter: grayscale(0);
                        opacity: 1.0;
                        box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
                    }
                    .project-details-section #tabsContentContainer .tab img{
                        border-radius: 20px;
                        scale: 0.9;
                        box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 48px;
                    }
                    .project-details-section #tabsContentContainer .tab.active-tab img{
                        scale: 1.0;
                        transition: all 0.6s cubic-bezier(0.68, -0.6, 0.32, 1.6);
                    }
                    </style>
                <script defer>
                    console.log(@json($projects));
                    
                    let images = @json($projects->images);
                    document.querySelector("#tabButtonContainer").innerHTML = "";
                    document.querySelector("#tabsContentContainer").innerHTML = "";
                    for (let i = 0; i < images.length; i++) {
                        if(i==0){
                            document.querySelector("#tabButtonContainer").innerHTML += `
                                 <li data-tab="#tab-${(i+1)}" class="tab-btn active-btn col-md-12 mb-2">
                                    <img src="{{ asset('uploads/Projects/large/${images[i].image}') }}" alt=""></li>
                            `;    
                            document.querySelector("#tabsContentContainer").innerHTML += `
                                <div class="tab active-tab" id="tab-${(i+1)}">
                                    <figure class="image"><a href="{{ asset('uploads/Projects/large/${images[i].image}') }}" class="lightbox-image" data-fancybox="images">
                                        <img src="{{ asset('uploads/Projects/large/${images[i].image}') }}" alt=""></a></figure>
                                </div>
                            `;
                        } else {
                            document.querySelector("#tabButtonContainer").innerHTML += `
                                 <li data-tab="#tab-${(i+1)}" class="tab-btn col-md-12 mb-2">
                                    <img src="{{ asset('uploads/Projects/large/${images[i].image}') }}" alt=""></li>
                            `;
                            document.querySelector("#tabsContentContainer").innerHTML += `
                                <div class="tab" id="tab-${(i+1)}">
                                    <figure class="image"><a href="{{ asset('uploads/Projects/large/${images[i].image}') }}" class="lightbox-image" data-fancybox="images">
                                    <img src="{{ asset('uploads/Projects/large/${images[i].image}') }}" alt=""></a></figure>
                                </div>
                            `;
                        }
                    }
                </script>

                <!--Lower Content-->
                <div class="lower-content">
                    <div class="row clearfix">
                        <!--Content Column-->
                        <div class="content-column col-lg-8 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <h2>Project Descripation</h2>
                                <p>{{$projects->description}}</p>
                            </div>
                        </div>

                        <!--Info Column-->
                        <div class="info-column col-lg-4 col-md-12 col-sm-12 ">
                            <div class="inner-column wow fadeInRight animated"
                                style="visibility: visible; animation-name: fadeInRight;">
                                <h3>Short Description</h3>
                                <p>{{$projects->short_description}}</p>

                                <!--Help Box-->
                                <div class="help-box-two">
                                    <div class="inner">
                                        <span class="title">Quick Contact</span>
                                        <h2>Get Solution</h2>
                                        <div class="text">Contact us at the Interior office nearest to you or submit a
                                            business inquiry online.</div>
                                        <a class="theme-btn btn-style-two" href="contact.html">Contact</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
