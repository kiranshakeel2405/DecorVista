<?php
include '../guard.php';
$userId = $_SESSION['userId'];
$username = $_SESSION['username'];
$userrole = ucfirst($_SESSION['role']);
include '../config.php';
$db = new Database();
$query = "SELECT count(notification_id) as rowCount FROM notifications WHERE user_id = '$userId' AND `status` = 'sent'";
$notiCount = $db->fetchSingle($query);
$query = "SELECT * FROM drivers WHERE user_id = '$userId'";
$userDetail = $db->fetchSingle($query);
$driverId = $userDetail['driver_id'];
?>
<!doctype html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
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

    <link rel="stylesheet" href="../dashboard/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../dashboard/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../dashboard/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../dashboard/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../dashboard/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../dashboard/assets/js/config.js"></script>
    <style>
        .error-message {
            color: red;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div style="height:76px" class="app-brand demo">
                    <a href="./index.php" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img height="75" width="150" src="../assets/images/resources/sticky-logo.png" alt=""
                                srcset="">
                        </span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-5">


                    <!-- Apps & Pages -->
                    <!-- <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Apps &amp; Pages</span>
            </li> -->
                    <li class="menu-item">
                        <a href="./index.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-envelope"></i>
                            <div class="text-truncate" data-i18n="Email">Dashboard</div>
                            <!-- <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div> -->
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="./requests.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chat"></i>
                            <div class="text-truncate" data-i18n="Chat">Active Requests</div>
                            <!-- <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div> -->
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="./completedtask.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chat"></i>
                            <div class="text-truncate" data-i18n="Chat">Completed Tasks</div>
                            <!-- <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div> -->
                        </a>
                    </li>
                    
                    <!-- Pages -->


                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="bx bx-menu bx-md"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center d-none">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search bx-md"></i>
                                <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2"
                                    placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            <!-- <li class="nav-item lh-1 me-4">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li> -->
                            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                                <a class="nav-link dropdown-toggle hide-arrow" href="./notifications.php"
                                    data-bs-auto-close="outside" aria-expanded="false">
                                    <span class="position-relative">
                                        <i class="bx bx-bell bx-md"></i>
                                        <span
                                            class="badge rounded-pill bg-danger badge-notifications position-absolute top-0 start-100 translate-middle"
                                            style="font-size: 0.75rem; padding: 5px 8px;">
                                            <?= $notiCount['rowCount'] ?>
                                        </span>
                                    </span>
                                </a>
                            </li>

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="../dashboard/assets/img/avatars/1.png" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="../dashboard/assets/img/avatars/1.png" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0"><?= $username ?></h6>
                                                    <small class="text-muted"><?= $userrole ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./profile.php">
                                            <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
                                        </a>
                                    </li>
                                    <!-- <li>
                      <a class="dropdown-item" href="#"> <i class="bx bx-cog bx-md me-3"></i><span>Settings</span> </a>
                    </li> -->
                                    <!-- <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card bx-md me-3"></i
                          ><span class="flex-grow-1 align-middle">Billing Plan</span>
                          <span class="flex-shrink-0 badge rounded-pill bg-danger">4</span>
                        </span>
                      </a>
                    </li> -->
                                    <li>
                                        <div class="dropdown-divider my-1"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./logout.php">
                                            <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">
                        
                    <div class="row">
                            <div class="col-xxl">
                                <div class="card mb-6">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">UPDATE PROFILE</h5> <small class="text-muted float-end">Save Life</small>
                                    </div>
                                    <div class="card-body">
                                        <form id="UpdateProfileForm">
                                            <div class="row mb-6">
                                                <label class="col-sm-2 col-form-label"
                                                    for="basic-default-name">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="username"
                                                        placeholder="Enter Name" value="<?= $userDetail['name'] ?>">
                                                        <span class="error-message" id="username-error"></span>
                                                        <input hidden id="userId" type="text" value="<?= $userId ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-6">
                                                <label class="col-sm-2 col-form-label"
                                                    for="basic-default-company">Phone Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="phone"
                                                        placeholder="Enter Phone" value="<?= $userDetail['contact_number'] ?>">
                                                        <span class="error-message" id="phone-error"></span>
                                                </div>
                                            </div>
                                            <div class="row mb-6">
                                                <label class="col-sm-2 col-form-label"
                                                    for="basic-default-company">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="address"
                                                        placeholder="Enter Address" value="<?= $userDetail['address'] ?>">
                                                        <span class="error-message" id="address-error"></span>
                                                </div>
                                            </div>
                                            <div class="row mb-6">
                                                <label class="col-sm-2 col-form-label"
                                                    for="basic-default-company">License Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="licensenumber"
                                                        placeholder="Enter License Number" value="<?= isset($userDetail['license_number'])?$userDetail['license_number']:'' ?>">
                                                        <span class="error-message" id="licensenumber-error"></span>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row justify-content-end">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                                <div class="text-body">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    Rapid Rescue
                                    <a href class="footer-link">Ambulance Service</a>
                                </div>
                                <div class="d-none d-lg-inline-block">
                                    <a href="#" class="footer-link me-4">License</a>
                                    <!-- <a href class="footer-link me-4">More Themes</a> -->

                                    <!-- <a
                      href="#"
    
                      class="footer-link me-4"
                      >Documentation</a
                    > -->

                                    <a href="#" class="footer-link">Support</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../dashboard/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../dashboard/assets/vendor/libs/popper/popper.js"></script>
    <script src="../dashboard/assets/vendor/js/bootstrap.js"></script>
    <script src="../dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../dashboard/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <!-- Main JS -->
    <script src="../dashboard/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../dashboard/assets/js/extended-ui-perfect-scrollbar.js"></script>
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

            function isValidLicense(license){
                var regex = /^[a-zA-Z0-9]{8,}$/;
                return regex.test(license);
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
            $('#UpdateProfileForm').submit(function (event) {
                event.preventDefault(); // Prevent default form submission

                var isValid = true;

                // Validate each field on form submission
                validateField('#username', isValidName, 'User Name should contain only letters.');
                validateField('#licensenumber', isValidLicense, 'Invalid license number. Must be at least 8 characters and contain only letters and numbers.');
                // validateField('#hospitaladdress', function (addr) { return addr.trim() !== ""; }, 'Hospital Address cannot be empty.');
                validateField('#address', function (addr) { return addr.trim() !== ""; }, 'Address cannot be empty.');
                // validateField('#type', function (role) { return role !== ""; }, 'Please select a type.');
                // validateField('#email', isValidEmail, 'Enter a valid email address.');
                // validateField('#password', function (pw) { return pw.length >= 6; }, 'Password must be at least 6 characters long.');
                validateField('#phone', isValidPhone, 'Enter a valid phone number (10-15 digits).');
                // validateField('#address', function (addr) { return addr.trim() !== ""; }, 'Address cannot be empty.');
                // validateField('#emergencyContactName', isValidName, 'Emergency Contact Name should contain only letters.');
                // validateField('#emergencyContactPhone', isValidPhone, 'Enter a valid emergency contact phone number (10-15 digits).');
                // validateField('#role', function (role) { return role !== ""; }, 'Please select a role.');
                // If no errors, allow the form to be submitted
                if ($('.invalid').length === 0) {
                    // alert("Form submitted successfully!");
                    // Uncomment this to allow form submission
                    let data = {
                        username:$('#username').val(),
                        address:$('#address').val(),
                        phone:$('#phone').val(),
                        licensenumber:$('#licensenumber').val(),
                        userId: $('#userId').val(),
                        requestType:"updateProfile"
                    }
                    $.post('./driver-logic.php',data,function(response){
                        let result = JSON.parse(response);
                        if(result.status == 1){
                            Swal.fire({
                            title: 'Success!',
                            text: `${result.message}`,
                            icon: 'success'
                            });
                            // $('#AmbulanceRequestForm input').val('');
                        }else{
                            Swal.fire({
                            title: 'Error!',
                            text: `${result.message}`,
                            icon: 'error'
                            });
                        }
                    })
                }
            });

            // Real-time validation on input focus and change, without submitting the form
            $('#username,#address,#phone','#licensenumber').on('input focusout', function () {
                var fieldId = $(this).attr('id');

                // Validate the field individually
                if (fieldId === 'username') {
                    validateField(this, isValidName, 'User name should contain only letters.');
                } else if (fieldId === 'address') {
                    validateField(this, function (addr) { return addr.trim() !== ""; }, 'Address cannot be empty.');
                } else if (fieldId === 'phone') {
                    validateField(this, isValidPhone, 'Enter a valid phone number (10-15 digits).');
                }else if(fieldId === 'licensenumber'){
                    validateField(this,isValidLicense,"Invalid license number. Must be at least 8 characters and contain only letters and numbers.");
                }
            });
        });


    </script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>