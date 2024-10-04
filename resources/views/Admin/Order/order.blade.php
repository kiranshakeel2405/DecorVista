@extends('Admin.master')
@section('content')

<main id="main" class="main">

    @include('Message.message')

    <div class="pagetitle">
        <h1>Orders</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Orders</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Recent Sales</h5>
                        <table class="table table-borderless datatable" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Purchase Date</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
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
                                    <td>
                                        <a href="{{ route('Admin.order.report',$order->id) }}" class="btn btn-info">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
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
    </section>

</main><!-- End #main -->


@endsection