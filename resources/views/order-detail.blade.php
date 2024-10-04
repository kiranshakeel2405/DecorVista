@extends('master');
@section('content')
<main>
    <!-- Breadcrumb area start  -->
    <div style="margin-top: -29px"
        class="breadcrumb__area header__background-color breadcrumb__header-up breadcrumb-space overly overflow-hidden">
        <div class="breadcrumb__background"
            data-background="{{ asset('Asset/decorVista/assets/imgs/breadcrumb/page-header-1.png') }}"></div>
        <div class="container">
            <div class="breadcrumb__bg-left"></div>
            <div class="breadcrumb__bg-right"></div>
            <div class="row align-items-center justify-content-between">
                <div class="col-12">
                    <div style="margin-top: 100px;" class="breadcrumb__content text-center">
                        <h2 class="breadcrumb__title mb-15 mb-sm-10 mb-xs-5 color-white title-animation">Order Details
                        </h2>

                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('Front.index') }}">Home</a></span></li>
                                    <li class="active"><span>Order Details</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb area start  -->

    <section style=" font-family:'jost', sans-serif;position: relative;" class=" section-11 Order-detail-container">
        <div class="container  mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div style="border-bottom: 2px solid #fff;" class="card-header nigth-card-header">
                            <h2 style="color: #685642;" class=" mb-0 pt-2 pb-2 Order-detail-title nav-nigth">My Orders
                            </h2>
                        </div>

                        <div class="card-body pb-0 ">
                            <!-- Info -->
                            <div class="card card-sm">
                                <div class="card-body  mb-3">
                                    <div class="row">
                                        <div class="col-6 col-lg-3 order-detail-top">
                                            <!-- Heading -->
                                            <h6 class="nav-nigth">Order No:</h6>
                                            <!-- Text -->
                                            <p class="mb-lg-0 nav-nigth">
                                                #{{ $order->id }}
                                            </p>
                                        </div>
                                        <div class="col-6 col-lg-3 order-detail-top">
                                            <!-- Heading -->
                                            <h6 class="nav-nigth">Shipped date:</h6>
                                            <!-- Text -->
                                            <p class="mb-lg-0 nav-nigth">
                                                @if ($order->shipping_date != null)
                                                <time datetime="2019-10-01"
                                                    class="nav-nigth">{{ \Carbon\Carbon::parse($order->shipping_date)->format('M ,d,Y')  }}</time>
                                                @else

                                                <time datetime="2019-10-01" class="nav-nigth">n/a</time>

                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-6 col-lg-3 order-detail-top">
                                            <!-- Heading -->
                                            <h6 class="nav-nigth">Status:</h6>
                                            <!-- Text -->
                                            <p class="mb-0">

                                                @if($order->delivery_status == 'pending')
                                                <span class="badge bg-danger text-white">Pending</span>
                                                @elseif($order->delivery_status == 'shipped')
                                                <span class="badge bg-info text-white">Shipped</span>
                                                @elseif($order->delivery_status == 'delivered')
                                                <span class="badge bg-success text-white">Delivered</span>
                                                @else
                                                <span class="badge bg-danger text-white">Cancelled</span>
                                                @endif

                                            </p>
                                        </div>
                                        <div class="col-6 col-lg-3 order-detail-top">
                                            <!-- Heading -->
                                            <h6 class="nav-nigth">Order Amount:</h6>
                                            <!-- Text -->
                                            <p class="mb-0 nav-nigth">${{  number_format($order->grand_total,2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer p-3">

                            <!-- Heading -->
                            <h6 style="font-size: 28px; font-family: 'DM Sans';color: 5e5348"
                                class="mb-7 order-main-title mt-4 nav-nigth">Order Items 1</h6>

                            <!-- Divider -->
                            <hr class="my-3">

                            <!-- List group -->
                            <ul>
                                @if(!empty($orderItems))
                                @foreach($orderItems as $orderItem)

                                @php
                                $img = productImages($orderItem->product_id) ;


                                @endphp
                                <li class="list-group-item py-3">
                                    <div class="row align-items-center">
                                        <div class="col-4 col-md-3 col-xl-2">
                                            <!-- Image -->
                                            @if(!empty($img))
                                            <a href="product.html"><img
                                                    src="{{asset('uploads/product/small/'.$img->image)}}" alt="..."
                                                    class="img-fluid order-img rounded">
                                            </a>

                                            @endif
                                        </div>
                                        <div class="col">
                                            <!-- Title -->
                                            <p class="mb-4 fs-sm fw-bold order-text">
                                                <a class="text-body nav-nigth" href="product.html">{{$orderItem->name}}
                                                    x
                                                    {{$orderItem->qty}}</a>
                                                <br>
                                                <span
                                                    class="text-muted nav-nigth">${{number_format($orderItem->total,2)}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <hr>
                                @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>

                    <div class="card card-lg mb-5 mt-3">
                        <div class="card-body">
                            <!-- Heading -->
                            <h6 style="font-size: 28px; font-family: 'DM Sans';color5e5348"
                                class="mt-0 mb-3 order-main-title nav-nigth">Order Total</h6>
                            <!-- Divider -->

                            <!-- List group -->
                            <ul style="line-height: 46px;">

                                <hr class="my-1">
                                <li style="font-size: 23px;"
                                    class="list-group-item d-flex order-sub-title fs-lg fw-bold">
                                    <span class="nav-nigth">Total</span>
                                    <span class="ms-auto nav-nigth">${{  number_format($order->grand_total,2) }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="order-button">
        <a href="javascript:void(0)" onclick="CancelOrder('{{$order->id}}')" class="download-cancel-button
        gear-button">Cancel Order</a>
        </div> --}}

    </section>
</main>
@endsection