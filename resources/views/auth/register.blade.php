@extends('master')
@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{ asset('user/images/background/10.jpg') }});">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Register</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Register</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--Login Section-->
    <section class="login-section">
        <div class="auto-container">
            <div class="row clearfix">
                {{-- <div class="column col-lg-6 col-md-12 col-sm-12">
                    <h2>Login</h2>
                    
                    <!-- Login Form -->
                    <div class="login-form">
                        <!--Login Form-->
                        <form method="post" action="#">
                            <div class="form-group">
                                <label>Username or Email Address</label>
                                <input type="text" name="username" placeholder="Name or Email " required>
                            </div>
                            
                            <div class="form-group">
                                <label>Enter Your Password</label>
                                <input type="email" name="email" placeholder="Password" required>
                            </div>
                            
                            <div class="clearfix">
                                <div class="pull-left">
                                    <div class="form-group check-box">
                                        <input type="checkbox" name="shipping-option" id="account-option-1">&nbsp; <label for="account-option-1">Remember me</label>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <div class="form-group no-margin">
                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form">LOGIN</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="#" class="psw">Lost your password?</a>
                            </div>
                        </form>
                    </div>
                    <!--End Login Form -->
                </div> --}}

                <div class="column col-lg-12 col-md-12 col-sm-12">
                    <h2>Register</h2>

                    <!-- Register Form -->
                    <div class="login-form register-form">
                        <!--Login Form-->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}"
                                    required>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Enter your email"
                                    value="{{ old('email') }}" required>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            </div>
                            <div class="form-group">
                                <x-input-label for="contact" :value="__('Contact')" />
                                <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact"
                                    :value="old('contact')" required autocomplete="contact" placeholder="Enter your Phone" />
                                <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" class="block mt-3 w-full" type="password" name="password"
                                    required autocomplete="new-password" placeholder="Your password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <!-- Confirm Password -->
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="Confirm your password" required>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <x-input-label for="role" :value="__('Role')" />
                                <br>
                                <x-text-input id="role" class="block mt-1" type="radio" name="role" required
                                    value="user" />User
                                <x-text-input id="role" class="block mt-1" type="radio" name="role" required
                                    value="designer" />Designer
                                <x-input-error :messages="$errors->get('role')" class="mt-5" />
                            </div>

                            <div class="form-group text-right">
                                <button class="theme-btn btn-style-one" type="submit" name="submit-form">Register</button>
                            </div>
                            <div class="link">
                                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                            </div>
                        </form>
                    </div>
                    <!--End Register Form -->
                </div>
            </div>
        </div>
    </section>
    <!--End Login Section-->
@endsection
{{-- <div class="register-container">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}" id="registerForm">
        @csrf

        <!-- Name -->
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}"
            required autofocus>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />

        <!-- Email Address -->
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}"
            required>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />


        <div class="mt-4">
            <x-input-label for="contact" :value="__('Contact')" />
            <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')"
                required autocomplete="contact" placeholder="Enter your Phone" />
            <x-input-error :messages="$errors->get('contact')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-5">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-3 w-full" type="password" name="password" required
                autocomplete="new-password" placeholder="Your password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mt-5">
            <!-- Confirm Password -->
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <input type="password" id="password_confirmation" name="password_confirmation"
                placeholder="Confirm your password" required>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <br>
            <x-text-input id="role" class="block mt-1" type="radio" name="role" required value="user" />User
            <x-text-input id="role" class="block mt-1" type="radio" name="role" required
                value="designer" />Designer
            <x-input-error :messages="$errors->get('role')" class="mt-5" />
        </div>
        <button type="submit">Register</button>
    </form>

    <div class="link">
        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
</div> --}}
