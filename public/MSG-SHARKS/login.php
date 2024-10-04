<?php
include './guard.php';
?>
<!doctype html>

<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Rapid Rescue</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="./dashboard/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="./dashboard/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./dashboard/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./dashboard/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="./dashboard/assets/vendor/css/pages/page-auth.css" />
    <style>
        .error-message {
            color: red;
            font-size: 12px;
        }
    </style>
    <!-- Helpers -->
    <script src="./dashboard/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="./dashboard/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card px-sm-6 px-0">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <img height="120" width="150" src="assets/images/resources/sticky-logo.png" alt="" srcset="">
                  </span>
                </a>
              </div>
              <!-- /Logo -->
              <!-- <h4 class="mb-1">Welcome to sneat! 👋</h4>
              <p class="mb-6">Please sign-in to your account and start the adventure</p> -->

              <form id="formAuthentication" class="mb-6" action="index.html">
                <div class="mb-6">
                  <label for="email" class="form-label">Email </label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email-username"
                    placeholder="Enter your email"
                    autofocus />
                    <span class="error-message" id="email-error"></span>
                </div>
                <div class="mb-6 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                  <span class="error-message" id="password-error"></span>
                </div>
                
                <div class="mb-6">
                  <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                </div>
              </form>

              <p class="text-center">
                <span>New on our platform?</span>
                <a href="./signup.php">
                  <span>Create an account</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./dashboard/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./dashboard/assets/vendor/libs/popper/popper.js"></script>
    <script src="./dashboard/assets/vendor/js/bootstrap.js"></script>
    <script src="./dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="./dashboard/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="./dashboard/assets/js/main.js"></script>
    <script>
      $(document).ready(function () {
            // Function to check if field is only letters
            function isValidName(name) {
                var regex = /^[A-Za-z\s]+$/;
                return regex.test(name);
            }

            // Function to check if email is valid
            function isValidEmail(email) {
                var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(email);
            }

            // Function to check if phone number is valid (10-15 digits)
            function isValidPhone(phone) {
                var regex = /^\d{10,15}$/;
                return regex.test(phone);
            }

            // Function to perform validation for each field
            function validateField(field, validator, errorMsg) {
                var fieldValue = $(field).val();
                if (!validator(fieldValue)) {
                    $(field).next('.error-message').text(errorMsg);
                    $(field).addClass('invalid');
                } else {
                    $(field).next('.error-message').text('');
                    $(field).removeClass('invalid');
                }
            }

            // Validate form on submit
            $('#formAuthentication').submit(function (event) {
                event.preventDefault(); // Prevent default form submission

                var isValid = true;

                // Validate each field on form submission
                validateField('#email', isValidEmail, 'Enter a valid email address.');
                validateField('#password', function (pw) { return pw.length >= 6; }, 'Password must be at least 6 characters long.');
                // If no errors, allow the form to be submitted
                if ($('.invalid').length === 0) {
                    // alert("Form submitted successfully!");
                    // Uncomment this to allow form submission
                    let data = {
                        email:$('#email').val(),
                        password:$('#password').val(),
                        requestType:"login"
                    }
                    $.post('./auth-logic.php',data,function(response){
                        let result = JSON.parse(response);
                        if(result.status == 1){
                          window.location.href= './users/index.php';
                        }else{
                            if(result.message == 'Invalid Email'){
                              $('#email-error').text('Invalid Email');
                            }else{
                              $('#password-error').text('Invalid Password');
                            }
                        }
                    })
                }
            });

            // Real-time validation on input focus and change, without submitting the form
            $(' #email, #password').on('input focusout', function () {
                var fieldId = $(this).attr('id');

                // Validate the field individually
                if (fieldId === 'email') {
                    validateField(this, isValidEmail, 'Enter a valid email address.');
                } else if (fieldId === 'password') {
                    validateField(this, function (pw) { return pw.length >= 6; }, 'Password must be at least 6 characters long.');
                }
            });
        });

    </script>

    <!-- Page JS -->

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
