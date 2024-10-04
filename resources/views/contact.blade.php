@extends('master');
@section('content')
 <!--Page Title-->
 <section class="page-title" style="background-image:url({{asset('user/images/background/10.jpg')}});">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1>Contact Us</h1>
                <span class="title">The Interior speak for themselves</span>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="index-2.html">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Contact Page Section -->
<section class="contact-page-section">
    <div class="auto-container">
        <div class="row">
            <!-- Form Column -->
            <div class="form-column col-lg-7 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="float-text">informaer</span>
                        <h2>Contact Us</h2>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="contact-form">
                        <form method="post" action="{{route('Front.contact.store')}}" id="contact-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <input name="name" id="name" type="text" placeholder="Name">
                                </div>
                                
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                   <input name="email" id="email" type="email" placeholder="Email">
                                </div>

                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                   <input name="phone" id="number" type="number" placeholder="Phone">
                                </div>

                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <input type="text" name="subject" placeholder="Subject" required="">
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <textarea name="message" placeholder="Massage"></textarea>
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <button class="theme-btn btn-style-three" type="submit" name="submit-form">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="contact-info">
                        <div class="row">
                            <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                <div class="inner">
                                    <h4>Location</h4>
                                    <p>Complax interprice company, 882 street Latrobe, PA 15786</p>
                                </div>
                            </div>

                            <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                <div class="inner">
                                    <h4>Call Us</h4>
                                    <p>+88 169 787 5256</p>
                                    <p>+88 165 358 5678</p>
                                </div>

                            </div>

                            <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                <div class="inner">
                                    <h4>Email</h4>
                                    <p><a href="#">support@contra.com</a></p>
                                    <p><a href="#">info@contra.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <div class="mt-5">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3619.3139925217156!2d67.14924997482744!3d24.887269144185325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb339999415e0c3%3A0x36742eee0fd9c291!2sAptech%20Metro%20Star%20Gate!5e0!3m2!1sen!2s!4v1727031923299!5m2!1sen!2s" width="400" 
             height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
           </div>
        </div>
    </div>
</section>
<!--End Contact Page Section -->
@endsection