<?php
include '../guard.php';
$userId = $_SESSION['userId'];
$username = $_SESSION['username'];
$userrole = ucfirst($_SESSION['role']);
$requestId = $_GET['id'];
include '../config.php';
$db = new Database();
$query = "SELECT count(notification_id) as rowCount FROM notifications WHERE user_id = '$userId' AND `status` = 'sent'";
$notiCount = $db->fetchSingle($query);
$query = "SELECT * FROM emergency_requests WHERE request_id = $requestId";
$requestDetails = $db->fetchSingle($query);
$requestType = $requestDetails['type'];
$user_id = $requestDetails['user_id'];
$query = "SELECT * FROM ambulances WHERE is_deleted = '0' AND `type` = '$requestType' AND `status` = 'available'";
$allAmbulances = $db->fetchAll($query);
$query = "SELECT * FROM drivers WHERE is_deleted = '0' AND `status` = 'available' AND license_number IS NOT NULL";
$allDrivers = $db->fetchAll($query);
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
                        <a href="./ambulances.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chat"></i>
                            <div class="text-truncate" data-i18n="Chat">Ambulances</div>
                            <!-- <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div> -->
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="./drivers.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chat"></i>
                            <div class="text-truncate" data-i18n="Chat">Drivers</div>
                            <!-- <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div> -->
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="./allrequests.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chat"></i>
                            <div class="text-truncate" data-i18n="Chat">Request Details</div>
                            <!-- <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div> -->
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="./monitoring.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chat"></i>
                            <div class="text-truncate" data-i18n="Chat">Monitoring</div>
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
                                        <h5 class="mb-0">DISPATCH REQUEST</h5> <small class="text-muted float-end">Save Life</small>
                                    </div>
                                    <div class="card-body">
                                        <form id="DispatchRequest">
                                            
                                            <div class="row mb-6">
                                                <label class="col-sm-2 col-form-label"
                                                for="basic-default-company">Select Ambulance</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="ambulance_id" name="ambulance_id">
                                                        <option value="">Select Ambulance</option>
                                                        <?php
                                                            foreach($allAmbulances as $ambulance){
                                                        ?>
                                                        <option value="<?= $ambulance['ambulance_id'] ?>"><?= $ambulance['ambulance_number'] ?></option>
                                                        <?php }?>
                                                    </select>
                                                    <span class="error-message" id="type-error"></span>
                                                </div>
                                            </div>
                                            <div class="row mb-6">
                                                <label class="col-sm-2 col-form-label"
                                                for="basic-default-company">Select Drivers</label>
                                                <div class="col-sm-10">
                                                    <select user_id="<?= $requestDetails['user_id'] ?>" request_id="<?= $requestId ?>" class="form-control" id="driver_id" name="ambulance_id">
                                                        <option value="">Select Driver</option>
                                                        <?php
                                                            foreach($allDrivers as $driver){
                                                        ?>
                                                        <option value="<?= $driver['driver_id'] ?>"><?= $driver['name'] ?></option>
                                                        <?php }?>
                                                    </select>
                                                    <span class="error-message" id="type-error"></span>
                                                </div>
                                            </div>
                                            <div class="row justify-content-end">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Dispatch</button>
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
            $('#DispatchRequest').submit(function (event) {
                event.preventDefault(); // Prevent default form submission

                var isValid = true;

                // Validate each field on form submission
                // validateField('#hospitalname', isValidName, 'Hospital Name should contain only letters.');
                // validateField('#hospitaladdress', function (addr) { return addr.trim() !== ""; }, 'Hospital Address cannot be empty.');
                // validateField('#pickupaddress', function (addr) { return addr.trim() !== ""; }, 'Pickup Address cannot be empty.');
                validateField('#ambulance_id', function (role) { return role !== ""; }, 'Please select a Ambulance.');
                validateField('#driver_id', function (role) { return role !== ""; }, 'Please select a Driver.');
                // validateField('#email', isValidEmail, 'Enter a valid email address.');
                // validateField('#password', function (pw) { return pw.length >= 6; }, 'Password must be at least 6 characters long.');
                // validateField('#phone', isValidPhone, 'Enter a valid phone number (10-15 digits).');
                // validateField('#address', function (addr) { return addr.trim() !== ""; }, 'Address cannot be empty.');
                // validateField('#emergencyContactName', isValidName, 'Emergency Contact Name should contain only letters.');
                // validateField('#emergencyContactPhone', isValidPhone, 'Enter a valid emergency contact phone number (10-15 digits).');
                // validateField('#role', function (role) { return role !== ""; }, 'Please select a role.');
                // If no errors, allow the form to be submitted
                if ($('.invalid').length === 0) {
                    // alert("Form submitted successfully!");
                    // Uncomment this to allow form submission
                    let data = {
                        ambulance_id:$('#ambulance_id').val(),
                        driver_id:$('#driver_id').val(),
                        user_id: $('#driver_id').attr('user_id'),
                        request_id: $('#driver_id').attr('request_id'),
                        requestType:"dispatchRequest"
                    }
                    $.post('./admin-logic.php',data,function(response){
                        let result = JSON.parse(response);
                        if(result.status == 1){
                            Swal.fire({
                            title: 'Success!',
                            text: `${result.message}`,
                            icon: 'success'
                            });
                            $('#DispatchRequest input').val('');
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
            $('#ambulance_id,#driver_id').on('input focusout', function () {
                var fieldId = $(this).attr('id');

                // Validate the field individually
                if (fieldId === 'ambulance_id') {
                    validateField(this, function (role) { return role !== ""; }, 'Please select a Ambulance.');
                }else if(fieldId = 'driver_id'){
                    validateField(this, function (role) { return role !== ""; }, 'Please select a Driver.');
                }
            });
        });


    </script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>