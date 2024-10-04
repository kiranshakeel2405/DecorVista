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
        <div class="content-wrapper">
 
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Order: #{{ $order->id}}</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{ route('Admin.order') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header pt-3">
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">

                                            <h1 class="h5 mb-3">Shipping Address</h1>
                                            <address>
                                                <strong>{{$order->first_name}} {{$order->last_name}}</strong><br>
                                                {{ $order->address }} <br>
                                                {{ $order->state }}, {{ $order->zip }}  <br>
                                                Phone: {{ $order->mobile }}<br>
                                                Email: {{ $order->email }}
                                            </address>
                                            <h1 class="h5 ">Shipping Date</h1>
                                            <address>
                                                @if(!empty($order->shipping_date))
                                                {{ \Carbon\Carbon::parse($order->shipping_date)->format('d M, Y') }}
                                                @else
                                                n/a
                                                @endif
                                                <br>
                                            </address>
                                        </div>





                                        <div class="col-sm-4 invoice-col">
                                            <b>Invoice #{{$order->id}}</b><br>
                                            <br>
                                            <b>Order ID:</b> {{$order->id}}<br>
                                            <b>Total:</b> ${{number_format($order->grand_total,2)}}<br>
                                            <b>Status:</b>
                                            @if($order->delivery_status == 'pending')
                                            <span class="text-danger">Pending</span>
                                            @elseif($order->delivery_status == 'shipped')
                                            <span class="text-info">Shipped</span>
                                            @elseif($order->delivery_status == 'delivered')
                                            <span class="text-success">Delivered</span>
                                            @else
                                            <span class="text-danger">Cancelled</span>
                                            @endif
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-3">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th width="100">Price</th>
                                                <th width="100">Qty</th>
                                                <th width="100">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach($items as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>${{ number_format($item->price,2) }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>${{ number_format($item->total,2) }}</td>
                                            </tr>

                                            @endforeach
                                            <tr>
                                                <th colspan="3" class="text-right">Grand Total:</th>
                                                <td>${{ number_format($order->grand_total,2)}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <form method="post" id="StatusForm" name="StatusForm">
                                <div class="card py-5">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Order Status</h2>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="pending"
                                                    {{ ($order->delivery_status == 'pending') ? 'selected' : ' ' }}>
                                                    Pending
                                                </option>
                                                <option value="shipped"
                                                    {{ ($order->delivery_status == 'shipped') ? 'selected' : ' ' }}>
                                                    Shipped
                                                </option>
                                                <option value="delivered"
                                                    {{ ($order->delivery_status == 'delivered') ? 'selected' : ' ' }}>
                                                    Delivered
                                                </option>
                                                <option value="cancelled"
                                                    {{ ($order->delivery_status == 'cancelled') ? 'selected' : ' ' }}>
                                                    Cancelled
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="shipping_date">Shipped Date</label>
                                            <input type="text" class="form-control" autocomplete="off"
                                                name="shipping_date" id="shipping_date" value="{{ ($order->shipping_date) ? $order->shipping_date : ''  }}">
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
    </section>


</main><!-- End #main -->


@endsection

@section('js')
$(document).ready(function() {
    $('#shipping_date').datetimepicker({
        // options here
        format: 'Y-m-d H:i:s',
    });

});
$('#StatusForm').submit(function(event) {
    event.preventDefault();
    if (confirm("Are you want to Sure Change Order Status")) {
        $.ajax({
            url: '{{ route("Change.Order.Status",$order->id) }}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response) {

                window.location.href = "{{ route('Admin.order.report',$order->id) }}"

            }


        })
    }
})
@endsection