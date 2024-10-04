@extends('master');
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url({{asset('user/images/background/10.jpg')}});">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1>My Orders</h1>
                <span class="title">The Interior speak for themselves</span>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>My Orders</li>
            </ul>
        </div>
    </div>
</section>
<section class="cart-section">
    <div class="auto-container">
        <!--Cart Outer-->
       

        <div class="cart-outer">
            <div class="table-outer">
                <table class="cart-table">
                    <thead class="cart-header">
                        <tr>
                            <th>Orders #</th>
                            <th class="prod-column"> Date Purchased</th>
                            <th class="price">Status</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         @if (!empty($orders))

                            @foreach($orders as $order)
                        <tr >
                            <td>{{ $order->id }}</td>
                            <td>  {{ \Carbon\Carbon::parse($order->created_at)->format('d M ,Y') }}</td>
                            <td class="prod-column">
                                 @if($order->delivery_status == 'pending')
                                <span class="badge bg-danger text-white">Pending</span>
                                @elseif($order->delivery_status == 'shipped')
                                <span class="badge bg-info text-white">Shipped</span>
                                @elseif($order->delivery_status == 'delivered')
                                <span class="badge bg-success text-white">Delivered</span>
                                @else
                                <span class="badge bg-danger text-white">Cancelled</span>
                                @endif
                            </td>
                            <td><h4 class="prod-title">${{number_format($order->grand_total,2)}}</h4></td>
                            <td>
                                  <a href="{{ route('Front.order.detail',$order->id) }}"
                                        class="gear-button">View More</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <br><br><br><br><br>
            </div>

        </div>
        
</section>
  
@endsection