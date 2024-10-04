@extends('master');
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url({{asset('user/images/background/10.jpg')}});">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1>Gallery</h1>
                <span class="title">The Interior speak for themselves</span>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>Gallery</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Projects Section -->
<section class="projects-section alternate">
    <div class="auto-container">
         <!--MixitUp Galery-->
        <div class="mixitup-gallery">
        
                                        
            <div class="filter-list row">
                <!-- Project Block -->
                  @if (!empty('$galleries'))
                    @foreach ($galleries as $gallery )
                    @php
                    $img = $gallery->images->first()
                    @endphp
                <div class="project-block all mix interior architecture landescape col-lg-4 col-md-6 col-sm-12">
                    <div class="image-box">
                        <figure class="image">
                             @if (!empty($img->image))
                                <img src="{{ asset('uploads/gallery/large/' . $img->image) }}"
                                class="img-fluid" alt="image not found">
                                @endif</figure>
                                @if (!empty($gallery->images))
                                    @foreach ($gallery->images as $Galleryimage )
                                        <a href="{{ asset('uploads/gallery/small/' . $Galleryimage->image) }}">
                                    @endforeach       
                                 @endif
                        
                            </a>
                        <div class="overlay-box">
                            <h4><a href="project-detail.html">{{ $gallery->subcategory->name }}</a></h4>
                            <div class="btn-box">
                                <a href="images/gallery/2-1.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>
                                <a href=""><i class="fa fa-external-link"></i></a>
                            </div>
                            <span class="tag">{{ $gallery->subcategory->name }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
             @endif
             
            </div>
        </div>

        <!--Post Share Options-->
        <div class="styled-pagination">
            <ul class="clearfix">
                <li class="prev-post"><a href="#"><span class="fa fa-long-arrow-left"></span> Prev</a></li>
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li class="next-post"><a href="#"> Next <span class="fa fa-long-arrow-right"></span> </a></li>
            </ul>
        </div>
    </div>
</section>

@endsection