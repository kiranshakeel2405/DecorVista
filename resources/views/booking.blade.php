@extends('master')
@section('content')
    <!--Page Title-->
    @include('Message.message')
    <section class="page-title" style="background-image:url({{ asset('user/images/background/10.jpg') }});">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Booking</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Booking</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <div class="checkout-page">
        <div class="auto-container">
            <div class="checkout-form">
                <form action="" method="post" id="BookingForm" name="BookingForm">
                    @csrf
                    <div class="row clearfix">
                        <!--Column-->
                        <div class="column col-lg-12 col-md-12 col-sm-12">
                            <div class="sec-title">
                                <h3>Booking</h3>
                            </div>

                            <div class="row clearfix">

                                <div class="form-group col-md-4 col-sm-12">
                                    <div class="field-label">First Name <sup>*</sup></div>
                                    <input style="border: 1px solid black; outline: none; box-shadow: none;" type="text"
                                        name="first_name" id="first_name" value="{{ $user->name }}" class="form-control" placeholder="First Name" readonly>
                                        <p></p>
                                </div>

                                <div class="form-group col-md-4 col-sm-12">
                                    <div class="field-label">Email</div>
                                    <input style="border: 1px solid black; outline: none; box-shadow: none;" type="text"
                                        name="email" id="email" value="{{ $user->email }}" class="form-control" placeholder="Email" readonly>
                                        <p></p>
                                </div>

                                <div class="form-group col-md-4 col-sm-12">
                                    <div class="field-label">Phone</div>
                                    <input style="border: 1px solid black; outline: none; box-shadow: none;" type="text"
                                        name="mobile" id="mobile" class="form-control" value="{{ $user->contact }}" placeholder="Mobile No." readonly>
                                        <p></p>
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="field-label">Days</div>
                                    <select name="day" id="day" class="form-select" data-id="{{ $user_id }}"
                                        style="border: 1px solid black; outline: none; box-shadow: none;">
                                        <option value="" selected disabed>Select Days</option>
                                        @foreach ($consaltations as $consultation)
                                            <option value="{{ $consultation->days }}" style="color:black;">
                                                {{ $consultation->days }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="field-label">Slots</div>
                                    <select name="time" id="time" class="form-select"
                                            style="border: 1px solid black; outline: none; box-shadow: none;" >
                                            <option value="" selected disabed>Select Slots</option>
                                    </select>
                                    <p></p>
                                </div>

                                <div class="form-group col-md-12 col-sm-12">
                                    <div class="field-label">Address</div>
                                    <textarea style="border: 1px solid black; outline: none; box-shadow: none;"
                                            name="address" id="address" cols="30" rows="5" placeholder="Address"
                                            ></textarea>
                                        <p></p>
                                </div>
                               

                            </div>
                        </div>

                    </div>
            </div>

            <div class=" text-right">
                <button type="submit" class="theme-btn btn-style-one mb-5" id="pay">Book</button>
            </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#day').change(function() {
            // console.log("sjhsjfsdjfgdzgfzdj");
            $.ajax({
                url: '{{ route('Front.designer.booking.time') }}',
                type: 'post',
                data: {
                    days: $(this).val(),
                    id: $(this).data('id'),
                    _token: '{{ csrf_token() }}',

                },
                dataType: 'json',
                success: function(response) {
                    let cid = JSON.parse(response.timeSlots.id);
                    let data = JSON.parse(response.timeSlots.time);
                    document.querySelector("#time").innerHTML =
                        `<option value="" selected disabed>Select Slots</option>`;
                    for (let i = 0; i < data.length; i++) {
                        document.querySelector("#time").innerHTML += `
                    <option value="${cid}">${data[i]}</option>
                `
                    }
                },

            })
        })

        $('#BookingForm').submit(function(elem) {
            $('button[type=submit]').prop('disabled', false)

            elem.preventDefault();
            var element = $(this)

            $.ajax({
                url: '{{ route('Front.designer.booking.store') }}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $('button[type=submit]').prop('disabled', true)

                    if (response.status == true) {
                       alert("Bookings saved successfully");
                       window.location.reload();

                        $('#address').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback')
                            .html('')
                        $('#time').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback')
                            .html('')
                        $('#day').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback')
                            .html('')
                    } else {
                        var error = response['errors']
                        if (error['address']) {
                            $('#address').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback')
                                .html(error['address'])
                        } else {
                            $('#address').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html('')
                        }

                        if (error['time']) {
                            $('#time').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                                .html(error['time'])
                        } else {
                            $('#time').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html('')
                        }

                        if (error['day']) {
                            $('#day').addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                                .html(error['day'])
                        } else {
                            $('#day').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html('')
                        }

                    }
                }
            })

        })
    </script>
@endsection
