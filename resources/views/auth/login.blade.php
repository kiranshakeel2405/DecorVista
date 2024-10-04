@extends('master')
@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('user/images/background/10.jpg') }});">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Login</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--Login Section-->
    <section class="login-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="column col-lg-16 col-md-12 col-sm-12">
                        <h2>Login</h2>
                        
                        <!-- Login Form -->
                        <div class="login-form">
                            <!--Login Form-->
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <form method="POST" action="{{ route('login') }}" id="loginForm">
                                @csrf
                                <div class="form-group">
                                    <input type="text" id="email" name="email" placeholder="Enter email" required
                                        value="{{ old('email') }}" autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
    
                                <div class="form-group">
                                    <input type="password" id="password" name="password" placeholder="Enter password" required
                                        autocomplete="current-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
    
                                <div class="clearfix">
    
                                    <div class="pull-right">
                                        <div class="form-group no-margin">
                                            <button class="theme-btn btn-style-one" type="submit"
                                                name="submit-form">LOGIN</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="{{route('register')}}">Are you new ?Click Here</a><br>
                                    <a href="{{ route('password.request') }}">Forget your password</a>
                                </div>
                            </form>
                        </div>
                        <!--End Login Form -->
                    </div>
                </div>
                <div class="col-md-2"></div>


            </div>
        </div>
    </section>
    <!--End Login Section-->
@endsection
