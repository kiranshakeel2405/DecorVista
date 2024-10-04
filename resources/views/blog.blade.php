@extends('master');
@section('content')

<main>
    <!-- Breadcrumb area start  -->
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
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Blog</h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('Front.index') }}">Home</a></span></li>
                                    <li class="active"><span>Blog</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <section class="blog-grid section-space">
        <div class="container">
            <div class="row mb-minus-30">

                @if (!empty($blogs))

                @foreach ($blogs as $blog )
                <div class="col-lg-4">
                    <div class="blog-grid__item">
                        <a href="{{ route('Front.blog.detail',$blog->id) }}" class="blog-grid__media">
                        @if (!empty($blog->image))
                        <img src="{{ asset('uploads/Blog/small/' . $blog->image) }}"
                                alt="image not found">
                        @else
                        <img src="{{ asset('Asset/Admin/img/default.png') }}" alt="image not found">

                            
                        @endif
                            
                        </a>
                        <span class="blog-grid__date">{{ \Carbon\Carbon::parse($blog->created_at)->format('M,d, Y') }}</span>
                        <div class="blog-grid__content">
                            
                            <h6 class="mb-10"><a href="{{ route('Front.blog.detail',$blog->id) }}">{{ $blog->title }}</a>
                            </h6>

                            <p>{{ $blog->short_description }}</p>

                            <a class="read-more" href="{{ route('Front.blog.detail',$blog->id) }}">Read More
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 6H11" stroke="#767676" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M6 1L11 6L6 11" stroke="#767676" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
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

    
</main>

@endsection 