@extends('master');
@section('content')

<main>
    <!-- Breadcrumb area start  -->
    <div
        class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background" data-background="{{ asset('Asset/decorVista/assets/imgs/breadcrumb/page-header-1.png') }}"></div>
        <div class="container">
            <div class="breadcrumb__bg-left"></div>
            <div class="breadcrumb__bg-right"></div>
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">404 Error</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="index.html">Home</a></span></li>
                                    <li class="active"><span>404 Error</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <!-- "error  area start -->
    <section class="error section-space">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="error__content">
                        <div class="error__media">
                            <img class="img-fluid" src="{{ asset('Asset/decorVista/assets/imgs/error/error.png') }}" alt="image not found">
                        </div>

                        <div class="error__text mt-30">
                            <h2 class="title-animation mb-15">Opos... Page Not Found!</h2>
                            <p class="mb-40">The page you looking for not found may be it not exist or removed.</p>

                            <a href="{{ route('Front.index') }}" class="rr-btn">
                                <span class="btn-wrap">
                                    <span class="text-one">Go Back Home
                                        <svg width="13" height="14" viewBox="0 0 13 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1 5.2L6.5 1L12 5.2V11.8C12 12.1183 11.8712 12.4235 11.642 12.6485C11.4128 12.8736 11.1019 13 10.7778 13H2.22222C1.89807 13 1.58719 12.8736 1.35798 12.6485C1.12877 12.4235 1 12.1183 1 11.8V5.2Z"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M4.66504 13V7H8.33171V13" stroke="white" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                    <span class="text-two">Go Back Home
                                        <svg width="13" height="14" viewBox="0 0 13 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1 5.2L6.5 1L12 5.2V11.8C12 12.1183 11.8712 12.4235 11.642 12.6485C11.4128 12.8736 11.1019 13 10.7778 13H2.22222C1.89807 13 1.58719 12.8736 1.35798 12.6485C1.12877 12.4235 1 12.1183 1 11.8V5.2Z"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M4.66504 13V7H8.33171V13" stroke="white" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- "error  area end -->

</main>

@endsection