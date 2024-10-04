@extends('master')
@section('content')
<!--Page Title-->
<section class="page-title" style="background-image:url({{asset('user/images/background/10.jpg')}});">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1>Shopping Cart</h1>
                <span class="title">The Interior speak for themselves</span>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="index-2.html">Home</a></li>
                <li>Shopping Cart</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

@include('Message.message')
 <!--Cart Section-->
<section class="cart-section">
    <div class="auto-container">
        <!--Cart Outer-->
        @if (Cart::count() > 0)

        <div class="cart-outer">
            <div class="table-outer">
                <table class="cart-table">
                    <thead class="cart-header">
                        <tr>
                            <th>Preview</th>
                            <th class="prod-column">product</th>
                            <th class="price">Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $cartItem)
                        <script>
                            console.log(@json($cartItem));
                            
                        </script>
                        <tr id="item-{{ $cartItem->rowId }}">
                            <td class="prod-column">
                                <div class="column-box">
                                    <figure class="prod-thumb"><a href="#">
                                        @if(!empty($cartItem->options->productImage->image))
                                        <img src="{{asset('uploads/product/small/'.$cartItem->options->productImage->image)}}"
                                            width="150px">
                                        @else
                                        <img src="{{asset('asset/front/img/service-4.jpg')}}" width="60px">
                                        @endif
                                    </a></figure>
                                </div>
                            </td>
                            <td><h4 class="prod-title">{{ $cartItem->name }}</h4></td>
                            <td class="sub-total"  id="price-{{ $cartItem->rowId }}">${{ $cartItem->price }}</td>
                            <td class="qty">
                                <div class="input-group quantity mx-auto"
                                style="width: 100px; color: #fff; display: flex; align-items: center; justify-content: space-between;">
                                <button class="btn btn-sm btn-minus p-2 pt-1 pb-1 sub gear-button"
                                    data-id="{{$cartItem->rowId}}"
                                    style="background-color: #5d5044; color: #fff; border: none;height: 34px;">
                                    <i class="fa fa-minus"></i>
                                </button>

                                <input type="text"
                                    style="width: 40px; color: #525368; background-color: #fff; border: none; border-radius: 4px;"
                                    class="form-control form-control-sm qty-input"
                                    id="qty-{{ $cartItem->rowId }}" value="{{ $cartItem->qty }}"
                                    data-id="{{ $cartItem->rowId }}" readonly>

                                <button class="btn btn-sm btn-plus p-2 pt-1 pb-1 add gear-button"
                                    data-id="{{$cartItem->rowId}}"
                                    style="background-color: #5d5044; color: #fff; border: none;height: 34px;">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div></td>
                            <td class="total" id="total-{{ $cartItem->rowId }}">${{$cartItem->price * $cartItem->qty}}</td>
                            <td><button class="remove-btn" onclick="DeleteCart('{{$cartItem->rowId}}')"><span class="fa fa-remove"></span></button></td>
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        
        <div class="row justify-content-end mt-5">
            <div class="column pull-right col-lg-6 col-md-6 col-sm-12">
                <!--Totals Table-->
                <ul class="totals-table">
                    <li><h3>Cart Totals</h3></li>
                    <li class="clearfix total"><span class="col">Sub Total</span><span class="col price">${{Cart::subtotal()}}</span></li>
                    <li class="clearfix total"><span class="col">Total</span><span class="col price">${{Cart::subtotal()}}</span></li>
                    <li class="text-right"><a  href="{{ route('Front.chekout') }}" class="theme-btn proceed-btn">Proceed to Checkout</a></li>
                </ul>
            </div>  
        </div>
        @else
        <div class="col-md-12 mb-5">
            <div class="card mb-5">
                <div class="card-body mb-5">
                    <h1 class="cart-empty ">Your Cart Is Empty</h1>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>    
$(document).ready(function() {
    $('.add').click(function() {
        var qtyElement = $(this).prev();
        var qtyValue = parseInt(qtyElement.val());
        if (qtyValue < 100) {
            qtyElement.val(qtyValue + 1);
            var rowid = $(this).data("id");
            var qty = qtyElement.val();
            UpdateCart(rowid, qty);
        }
    });

    $('.sub').click(function() {
        var qtyElement = $(this).next();
        var qtyValue = parseInt(qtyElement.val());
        if (qtyValue > 1) {
            qtyElement.val(qtyValue - 1);
            var rowid = $(this).data("id");
            var qty = qtyElement.val();
            UpdateCart(rowid, qty);
        }
    });
    
    
    $('.qty-input').change(function() {

        var rowid = $(this).data("id");
        var qty = $(this).val();
        
        $.ajax({
            url: '{{route("Check.Cart")}}',
            type: 'post',
            data: {
                rowid: rowid,
                qty: qty,
                
            },
        dataType: 'json',
        success: function(response) {
            if (response.status == true) {
                var item = response.cartitem;
                
                
                $(`#price-${item.rowId}`).html('$' + item.price)
                $(`#qty-${item.rowId}`).val(item.qty)
                $(`#total-${item.rowId}`).html('$' + item.price * item.qty)
                $(`.subtotal`).html('$' + response.subTotal)
            } else {
                if (response.isZero == true)
                alert(response.msg)
                var item = response.cartitem;
                $(`#qty-${item.rowId}`).val(item.qty)
                
            }
            
            
            
        },

    })
})




function UpdateCart(rowid, qty) {

    $.ajax({
        url: '{{route("Update.Cart")}}',
        type: 'post',
        data: {
            rowid: rowid,
            qty: qty,
              _token: '{{ csrf_token() }}'
            
        },
        dataType: 'json',
        success: function(response) {
            if (response.status == true) {
                var item = response.cartitem;
                $(`#price-${item.rowId}`).html('$' + item.price)
                $(`#qty-${item.rowId}`).val(item.qty)
                $(`#total-${item.rowId}`).html('$' + item.price * item.qty)
                $(`.subtotal`).html('$' + response.subTotal)
            } else {
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response.msg,
                        showCloseButton: true,
                        timer: 3000,
                        timerProgressBar: true,
                        confirmButtonText: 'OK',
                    });
                });
                var item = response.cartitem;
                $(`#qty-${item.rowId}`).val(item.qty)
                
            }
            window.location.reload(); 
            
            


        },
        
    })
    
}


});

function DeleteCart(rowid) {
    if (confirm("Are You Want to Delete")) {
        $.ajax({
            url: '{{route("Delete.Cart")}}',
            type: 'post',
            data: {
                rowid: rowid,
                _token: '{{ csrf_token() }}' 
            },
            dataType: 'json',
            success: function(response) {
                
                if (response.status == true) {
                    $(`#item-${response.rowid}`).remove()
                    $(`.subtotal`).html('$' + response.subTotal)
                    if (response.CartCount == 0) {
                        window.location.href = " {{ route('Front.index') }} "
                    }

                    
                }
                
            },
            
        })
        
    }

}
</script>
