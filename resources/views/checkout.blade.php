@extends('master');
@section('content')

<main>
    @include('Message.message')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('user/images/background/10.jpg')}});">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Check Out</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Check Out</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
   <!--CheckOut Page-->
    <div class="checkout-page">
        <div class="auto-container">
            <div class="checkout-form">
               <form action="javascript:void(0);" method="post" id="OrderForm" name="OrderForm">
                    @csrf
                    <div class="row clearfix">
                        <!--Column-->
                        <div class="column col-lg-12 col-md-12 col-sm-12">
                            <div class="sec-title">
                                <h3>Billing Details</h3>
                            </div>

                            <div class="row clearfix">
                                
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="field-label">First Name <sup>*</sup></div>
                                   <input style="border: 1px solid black; outline: none; box-shadow: none;"
                                                type="text" name="first_name" id="first_name" class="form-control"
                                                placeholder="First Name" value="{{ ($Customers) ? $Customers->first_name : '' }}">
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="field-label">Last Name </div>
                                    <input style="border: 1px solid black; outline: none; box-shadow: none;"
                                                type="text" name="last_name" id="last_name" class="form-control"
                                                placeholder="Last Name" value="{{ ($Customers) ? $Customers->last_name : '' }}">
                                </div>
                                
                               
                                
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="field-label">Email Address</div>
                                   <input style="border: 1px solid black; outline: none; box-shadow: none;"
                                                type="text" name="email" id="email" class="form-control"
                                                placeholder="Email" value="{{ auth()->user()->email}}" readonly>
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="field-label">Phone</div>
                                    <input style="border: 1px solid black; outline: none; box-shadow: none;"
                                                type="text" name="mobile" id="mobile" class="form-control"
                                                placeholder="Mobile No." value="{{ ($Customers) ? $Customers->mobile : '' }}">
                                </div>
                                
                              
                                <!--Form Group-->
                                <div class="form-group col-md-12 col-sm-12">
                                    <div class="field-label">Address</div>
                                     <textarea style="border: 1px solid black; outline: none; box-shadow: none;"
                                                name="address" id="address" cols="30" rows="3" placeholder="Address"
                                                class="form-control">{{ ($Customers) ? $Customers->address : '' }}</textarea>
                                            <p></p>
                                </div>

                                <div class="form-group col-md-12 col-sm-12">
                                      <div class="field-label">Apartment</div>
                                    <input style="border: 1px solid black; outline: none; box-shadow: none;"
                                                type="text" name="apartment" id="apartment" class="form-control"
                                                placeholder="Apartment, suite, unit, etc. (optional)" value="{{ ($Customers) ? $Customers->apartment : '' }}">
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group col-md-12 col-sm-12">
                                    <div class="field-label">Town/City</div>
                                     <input style="border: 1px solid black; outline: none; box-shadow: none;"
                                                type="text" name="city" id="city" class="form-control"
                                                placeholder="City" value="{{ ($Customers) ? $Customers->city : '' }}">
                                            <p></p>
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="field-label">State </div>
                                   <input style="border: 1px solid black; outline: none; box-shadow: none;"
                                                type="text" name="state" id="state" class="form-control"
                                                placeholder="State" value="{{ ($Customers) ? $Customers->state : '' }}">
                                            <p></p>
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="field-label">Postcode/ ZIP</div>
                                    <input style="border: 1px solid black; outline: none; box-shadow: none;"
                                                type="text" name="zip" id="zip" class="form-control" placeholder="Zip"
                                                value="{{ ($Customers) ? $Customers->zip : '' }}">
                                            <p></p>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="field-label">Notes</div>
                                     <textarea style="border: 1px solid black; outline: none; box-shadow: none;"
                                                name="order_notes" id="order_notes" cols="30" rows="2"
                                                placeholder="Order Notes (optional)" class="form-control"></textarea>
                                </div>
                                
                            </div>
                        </div>
                     
                    </div>
                    </div>
                    <!--End Checkout Details-->
             
                    <!--Order Box-->
                    <div class="order-box">
                        <div class="sec-title">
                            <h2>Your Order</h2>
                        </div>
                        
                        <div class="title-box clearfix">
                            <div class="col">PRODUCT</div>
                            <div class="col">TOTAL</div>
                        </div>
                         @foreach(Cart::content() as $item)
                        <ul>
                            
                            <li class="clearfix"><strong>{{ $item->name }} X {{ $item->qty }}</strong><span>${{  $item->price * $item->qty }}</span></li>
                          
                            <li class="clearfix"${{  $item->price * $item->qty }}</li>
                        </ul>
                              @endforeach
                            <li class="clearfix">TOTAL<span>${{ Cart::subtotal(2,'.',',') }}</span></li>
                    </div>
                  <div class=" text-right">
                            <button type="submit" class="theme-btn btn-style-one mb-5" id="pay">Place Order</button>
                        </div>
              </form>
                </div>
                </div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>


   $(document).ready(function() {
        console.log("jQuery is working");
    });
$("#OrderForm").submit(function(event) {
      console.log("Form submission intercepted!"); 
    event.preventDefault(); // Prevent default submission
    var element = $(this);
    $('#pay').prop('disabled', true);
    $.ajax({
        url: '{{route("Proceed")}}',
        type: 'post',
        data: element.serializeArray(),
        dataType: 'json',
        success: function(response) {
            $('#pay').prop('disabled', false)
            if (response.status == true) {

                alert("Thanks for Shopping")

                window.location.href = "{{route('Front.cart') }}"


            } else {
                var error = response.errors
                if (error['first_name']) {
                    $('#first_name').addClass('is-invalid').siblings('p').addClass(
                            'invalid-feedback')
                        .html(error['first_name'])
                } else {
                    $('#first_name').removeClass('is-invalid').siblings('p').removeClass(
                        'invalid-feedback').html('')
                }

                if (error['last_name']) {
                    $('#last_name').addClass('is-invalid').siblings('p').addClass(
                            'invalid-feedback')
                        .html(error['last_name'])
                } else {
                    $('#last_name').removeClass('is-invalid').siblings('p').removeClass(
                        'invalid-feedback').html('')
                }

                if (error['email']) {
                    $('#email').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                        .html(error['email'])
                } else {
                    $('#email').removeClass('is-invalid').siblings('p').removeClass(
                        'invalid-feedback').html('')
                }

                

                if (error['address']) {
                    $('#address').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                        .html(error['address'])
                } else {
                    $('#address').removeClass('is-invalid').siblings('p').removeClass(
                        'invalid-feedback').html('')
                }

                if (error['city']) {
                    $('#city').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                        .html(error['city'])
                } else {
                    $('#city').removeClass('is-invalid').siblings('p').removeClass(
                        'invalid-feedback').html('')
                }

                if (error['state']) {
                    $('#state').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                        .html(error['state'])
                } else {
                    $('#state').removeClass('is-invalid').siblings('p').removeClass(
                        'invalid-feedback').html('')
                }

                if (error['zip']) {
                    $('#zip').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                        .html(error['zip'])
                } else {
                    $('#zip').removeClass('is-invalid').siblings('p').removeClass(
                        'invalid-feedback').html('')
                }

                if (error['mobile']) {
                    $('#mobile').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                        .html(error['mobile'])
                } else {
                    $('#mobile').removeClass('is-invalid').siblings('p').removeClass(
                        'invalid-feedback').html('')
                }



            }
        },
    })

})
</script>

</main>
@endsection


@section('js')

@endsection