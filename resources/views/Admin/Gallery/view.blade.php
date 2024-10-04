@extends('Admin.master')
@section('content')


<main id="main" class="main">

    @include('Message.message')


    <div class="pagetitle">
        <h1>Gallery View</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Admin.gallery') }}">Home</a></li>
                <li class="breadcrumb-item">Gallery</li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6 ">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{  $gallery->subcategory->name }}</h5>
                        <p>
                            {{ $gallery->description }}
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('Admin.gallery') }}" class="btn btn-secondary px-3">Back</a>

                </div>
            </div>

        </div>
        <div class="row">
            @if (!empty($gallery->images))
            @foreach ($gallery->images as $img )
            <div class="col-md-3">
                <div class="card pt-3">
                    <div class="card-body">




                        <img src="{{ asset('uploads/gallery/small/'.$img->image) }}" class="d-block w-100" alt="...">


                    </div>
                </div>
            </div>
            @endforeach



            @endif

        </div>
    </section>


</main><!-- End #main -->


@endsection