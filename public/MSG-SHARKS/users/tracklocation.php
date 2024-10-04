<?php
include '../guard.php';
$userId = $_SESSION['userId'];
$username = $_SESSION['username'];
$userrole = ucfirst($_SESSION['role']);
$ambulanceId = $_GET['id'];
$requestId = $_GET['request_id'];
include '../config.php';
$db = new Database();
$query = "SELECT count(notification_id) as rowCount FROM notifications WHERE user_id = '$userId' AND `status` = 'sent'";
$notiCount = $db->fetchSingle($query);
$query = "SELECT latitude,longitude FROM emergency_requests WHERE request_id = '$requestId'";
$result = $db->fetchSingle($query);
$latitude = $result['latitude'];
$longitude = $result['longitude'];
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
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
                        <a href="./request.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chat"></i>
                            <div class="text-truncate" data-i18n="Chat">Ambulance Request</div>
                            <!-- <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div> -->
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="./managemedical.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-calendar"></i>
                            <div class="text-truncate" data-i18n="Calendar">Medical Profile</div>
                            <!-- <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div> -->
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="./ambulances.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-grid"></i>
                            <div class="text-truncate" data-i18n="Kanban">Ambulance Details</div>
                            <!-- <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div> -->
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="./requeststatus.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-grid"></i>
                            <div class="text-truncate" data-i18n="Kanban">Request History</div>
                            <!-- <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div> -->
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="./firstaid.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-grid"></i>
                            <div class="text-truncate" data-i18n="Kanban">First Aid</div>
                            <!-- <div class="badge rounded-pill bg-label-primary text-uppercase fs-tiny ms-auto">Pro</div> -->
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="./drivers-list.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-grid"></i>
                            <div class="text-truncate" data-i18n="Kanban">Drivers List</div>
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
                        <input id="ambulance_id" hidden type="text" value="<?= $ambulanceId ?>">
                        <input id="latitude" hidden type="text" value="<?= $latitude ?>">
                        <input id="longitude" hidden type="text" value="<?= $longitude ?>">
                        <div style="height:100%;width:100%" id="map"></div>
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
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script>
        // Initialize the map centered on Karachi
        // Initialize the map
        var map = L.map('map').setView([24.8607, 67.0011], 12); // Karachi coordinates

// Add OpenStreetMap tiles
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
}).addTo(map);

// Marker for a single ambulance
var ambulanceMarker = null;

// Marker for request location (static)
var requestMarker = null;

// Polyline instance
var routeLine = null;

// Function to calculate distance between two latitude and longitude points using Haversine formula
function calculateDistance(lat1, lon1, lat2, lon2) {
    const R = 6371; // Radius of the earth in km
    const dLat = (lat2 - lat1) * (Math.PI / 180); // deg2rad below
    const dLon = (lon2 - lon1) * (Math.PI / 180); 
    const a = 
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) * 
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a)); 
    const distance = R * c; // Distance in km
    return distance;
}

// Function to update ambulance location and calculate distance
function updateAmbulanceLocation(ambulance_id, requestLat, requestLng) {
    // Fetch ambulance location by ID
    fetch(`get_ambulance.php?ambulance_id=${ambulance_id}`)
        .then(response => response.json())
        .then(ambulance => {
            const lat = parseFloat(ambulance.latitude);
            const lng = parseFloat(ambulance.longitude);

            // If ambulance has valid coordinates, update or add the marker
            if (!isNaN(lat) && !isNaN(lng)) {
                if (ambulanceMarker) {
                    // Update existing marker position
                    ambulanceMarker.setLatLng([lat, lng]);
                } else {
                    // Create a new marker for the ambulance
                    ambulanceMarker = L.marker([lat, lng])
                        .addTo(map)
                        .bindPopup(`Ambulance: ${ambulance.ambulance_number}`)
                        .openPopup();
                }

                // Calculate the distance between the ambulance and the request location
                const distance = calculateDistance(lat, lng, requestLat, requestLng);
                console.log(`Distance to destination: ${distance.toFixed(2)} km`);

                // Estimate time to reach the destination
                const speedKmPerHour = 50; // Assume ambulance speed is 50 km/h
                const estimatedTime = distance / speedKmPerHour; // Time in hours
                const estimatedMinutes = estimatedTime * 60; // Convert to minutes
                console.log(`Estimated time to destination: ${estimatedMinutes.toFixed(2)} minutes`);

                // Update ambulance marker popup with distance and ETA
                ambulanceMarker.bindPopup(
                    `Ambulance: ${ambulance.ambulance_number}<br>Distance: ${distance.toFixed(2)} km<br>ETA: ${estimatedMinutes.toFixed(2)} minutes`
                ).openPopup();

                // Add a static marker for the request location (only once)
                if (!requestMarker) {
                    requestMarker = L.marker([requestLat, requestLng])
                        .addTo(map)
                        .bindPopup(`Request Location: [${requestLat}, ${requestLng}]`)
                        .openPopup();
                }

                // Draw or update the polyline between the ambulance and request location
                if (routeLine) {
                    // Update the polyline with new coordinates
                    routeLine.setLatLngs([[lat, lng], [requestLat, requestLng]]);
                } else {
                    // Create a new polyline between the ambulance and request location
                    routeLine = L.polyline([[lat, lng], [requestLat, requestLng]], {
                        color: 'blue',
                        weight: 4,
                        opacity: 0.7,
                        smoothFactor: 1
                    }).addTo(map);
                }

            } else {
                console.error('Invalid latitude or longitude data.');
            }
        })
        .catch(error => {
            console.error('Error fetching ambulance data:', error);
        });
}

// Call this function to simulate the ambulance moving slowly
function simulateAmbulanceMovement(ambulance_id, requestLat, requestLng) {
    // Fetch the current ambulance location first
    fetch(`get_ambulance.php?ambulance_id=${ambulance_id}`)
        .then(response => response.json())
        .then(ambulance => {
            let currentLat = parseFloat(ambulance.latitude);
            let currentLng = parseFloat(ambulance.longitude);

            // Simulate slow movement by increasing coordinates slightly
            const newLat = currentLat + (Math.random() * 0.001); // Increment latitude slightly
            const newLng = currentLng + (Math.random() * 0.001); // Increment longitude slightly

            // Send updated coordinates to the server
            let data = {
                ambulance_id: ambulance_id,
                latitude: newLat,
                longitude: newLng,
                requestType: "updateLocation"
            };

            $.post('./users-logic.php', data, function (response) {
                let result = JSON.parse(response);
                // After updating the server, refresh the ambulance marker on the map
                updateAmbulanceLocation(ambulance_id, requestLat, requestLng);
            });
        })
        .catch(error => {
            console.error('Error fetching current ambulance location:', error);
        });
}
let ambulance_id = $('#ambulance_id').val(); // Assuming you have ambulance ID
let requestLat = $('#latitude').val(); // Replace with actual request location latitude
let requestLng = $('#longitude').val(); // Replace with actual request location longitude

// Initial load for a single ambulance with ID
updateAmbulanceLocation(ambulance_id, requestLat, requestLng);

// Set interval to update the ambulance location every 10 seconds (simulate movement)
setInterval(function () {
    simulateAmbulanceMovement(ambulance_id, requestLat, requestLng);
}, 10000); // Update every 10 seconds

    </script>


    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>