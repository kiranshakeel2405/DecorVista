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
$query = "SELECT driver_id FROM drivers WHERE user_id = '$userId'";
$res = $db->fetchSingle($query);
$driverId = $res['driver_id'];
$query = "SELECT er.*,users.*,ambulances.ambulance_number,er.updated_at AS emergency_request_updated_at, users.updated_at AS user_updated_at FROM emergency_requests er LEFT JOIN users ON users.user_id = er.user_id LEFT JOIN ambulances ON ambulances.ambulance_id = er.ambulance_id WHERE er.request_id = '$requestId'";
$requestDetails = $db->fetchSingle($query);
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
                        <div
                            class="d-flex flex-column flex-sm-row align-items-center justify-content-sm-between mb-6 text-center text-sm-start gap-2">
                            <div class="mb-2 mb-sm-0">
                                <h4 class="mb-1">
                                    Request ID #<?= $requestId ?>
                                </h4>
                                <p class="mb-0">
                                    <?= $requestDetails['emergency_request_updated_at'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                                <!-- Customer-detail Card -->
                                <div class="card mb-6">
                                    <div class="card-body pt-12">
                                        <div class="customer-avatar-section">
                                            <div class="d-flex align-items-center flex-column">
                                                <img class="img-fluid rounded mb-4"
                                                    src="../dashboard/assets/img/avatars/1.png" height="120" width="120"
                                                    alt="User avatar">
                                                <div class="customer-info text-center mb-6">
                                                    <h5 class="mb-0"><?= $requestDetails['name'] ?></h5>
                                                    <span>User ID #<?= $requestDetails['user_id'] ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="info-container">
                                            <h5 class="pb-4 border-bottom text-capitalize mt-6 mb-4">Details</h5>
                                            <ul class="list-unstyled mb-6">
                                                <li class="mb-2">
                                                    <span class="h6 me-1">Username:</span>
                                                    <span><?= $requestDetails['name'] ?></span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="h6 me-1">Email:</span>
                                                    <span><?= $requestDetails['email'] ?></span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="h6 me-1">Medical Details:</span>
                                                    <span><?= isset($requestDetails['medical_history'])?$requestDetails['medical_history']:'No details to show' ?></span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="h6 me-1">Allergies:</span>
                                                    <span><?= isset($requestDetails['allergies'])?$requestDetails['allergies']:'No details to show' ?></span>
                                                </li>
                                                <li class="mb-2">
                                                    <span class="h6 me-1">Contact:</span>
                                                    <span><?= $requestDetails['phone_number'] ?></span>
                                                </li>

                                                <li class="mb-2">
                                                    <span class="h6 me-1">Request Type:</span>
                                                    <span><?= $requestDetails['type'] ?></span>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <!-- /Customer-detail Card -->

                            </div>

                            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                                

                                <!-- Address accordion -->

                                <div class="card card-action mb-6">
                                    <div class="card-header align-items-center py-6">
                                        <h5 class="card-action-title mb-0">Address Details</h5>
                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="accordion accordion-flush accordion-arrow-left"
                                            id="ecommerceBillingAccordionAddress">

                                            <div class="accordion-item border-bottom">
                                                <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap"
                                                    id="headingHome">
                                                    <a class="accordion-button collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#ecommerceBillingAddressHome"
                                                        aria-expanded="false" aria-controls="headingHome" role="button">
                                                        <span>
                                                            <span class="d-flex gap-2 align-items-baseline">
                                                                <span class="h6 mb-1">Hospital Address</span>
                                                                
                                                            </span>
                                                            <span class="mb-0 text-body"><?= $requestDetails['hospital_address'] ?></span>
                                                        </span>
                                                    </a>
                                                    
                                                </div>
                                                
                                            </div>

                                            <div class="accordion-item border-bottom border-top-0">
                                                <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap"
                                                    id="headingOffice">
                                                    <a class="accordion-button collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#ecommerceBillingAddressOffice"
                                                        aria-expanded="false" aria-controls="headingOffice"
                                                        role="button">
                                                        <span class="d-flex flex-column">
                                                            <span class="h6 mb-0">Pickup Address</span>
                                                            <span class="mb-0 text-body"><?= $requestDetails['pickup_address'] ?></span>
                                                        </span>
                                                    </a>
                                                    
                                                </div>
                                                
                                            </div>

                                            <div class="accordion-item border-top-0">
                                                <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap"
                                                    id="headingFamily">
                                                    <a class="accordion-button collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#ecommerceBillingAddressFamily"
                                                        aria-expanded="false" aria-controls="headingFamily"
                                                        role="button">
                                                        <span class="d-flex flex-column">
                                                            <span class="h6 mb-0">Ambulance Number</span>
                                                            <span class="mb-0 text-body"><?= $requestDetails['ambulance_number'] ?></span>
                                                        </span>
                                                    </a>
                                                    
                                                </div>
                                                
                                            </div>
                                            <?php
                                                if(in_array($requestDetails['status'],['on-route','arrived','dispatched'])){
                                            ?>
                                            <div class="my-6">
                                                <select user_id="<?= $requestDetails['user_id'] ?>" request_id="<?= $requestId ?>" onchange="updateStatus()" class="form-control" id="status" name="status">
                                                    <option value="">Update Status</option>
                                                    <option value="on-route">On Route</option>
                                                    <option value="arrived">Arrived</option>
                                                    <option value="completed">Complete</option>
                                                </select>
                                            </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Address accordion -->

                               

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
        function updateStatus(){
            let status = $('#status').val();
            let request_id = $('#status').attr('request_id');
            let user_id = $('#status').attr('user_id');
            let data = {
                status:status,
                request_id:request_id,
                user_id:user_id,
                requestType:'updateStatus'
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
    </script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>