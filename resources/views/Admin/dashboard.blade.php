@extends('Admin.master')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('Admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">



                            <div class="card-body">
                                <h5 class="card-title">Sales <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{  $ThisDaySale }}</h6>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">



                            <div class="card-body">
                                <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>${{ number_format($Reveneuthismonth,2) }}</h6>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">


                            <div class="card-body">
                                <h5 class="card-title">Customers <span>| This Year</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $customers }}</h6>


                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->



                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Recent Sales</h5>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Purchase Date</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($orders))
                                        @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row"><a href="#">#{{ $order->id }}</a></th>
                                            <td>{{ $order->first_name }} {{$order->last_name }}</td>
                                            <td><a href="#"
                                                    class="text-primary">{{ \Carbon\Carbon::parse($order->created_at)->format('d M ,Y') }}</a>
                                            </td>
                                            <td>${{ number_format($order->grand_total,2) }}</td>
                                            <td>
                                                @if($order->delivery_status == 'pending')
                                                <span class="badge bg-danger">Pending</span>
                                                @elseif($order->delivery_status == 'shipped')
                                                <span class="badge bg-info">Shipped</span>
                                                @elseif($order->delivery_status == 'delivered')
                                                <span class="badge bg-success">Delivered</span>
                                                @else
                                                <span class="badge bg-danger">Cancelled</span>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                        @endforeach

                                        @endif

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->



                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">





                <!-- News & Updates Traffic -->
                <div class="card">

                    <div class="card-body pb-0">
                        <h5 class="card-title">Blogs &amp; Updates</h5>

                        <div class="news">


                            @if (!empty($blogs))

                            @foreach ($blogs as $blog)
                            <div class="post-item clearfix">
                                @if (!empty($blog->image))
                                <img src="{{ asset('uploads/Blog/small/'.$blog->image) }}" alt="">
                                @else
                                <img src="{{ asset('Asset/Admin/img/default.png') }}" alt="">

                                @endif
                                <h4><a href="{{ route('Admin.Blog') }}">{{ $blog->title }}</a></h4>
                                <p>{{ $blog->short_description }}</p>
                            </div>
                            @endforeach

                            @endif

                        </div><!-- End sidebar recent posts-->

                    </div>
                </div><!-- End News & Updates -->

            </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->
@endsection