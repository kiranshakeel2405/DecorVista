<?php
// Start the session
session_start();

// Get the current URL path
$currentUrl = $_SERVER['REQUEST_URI'];

// Get the domain and scheme (http or https) dynamically
$domain = $_SERVER['HTTP_HOST'];
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$baseUrl = $scheme . "://" . $domain; // This will give you the correct base URL

// Ensure session variable 'role' is set
if (isset($_SESSION['role'])) {
    // Redirect based on user role
    switch ($_SESSION['role']) {
        case 'user':
            // Allow access to '/users/' URLs, and redirect otherwise
            if (strpos($currentUrl, '/users/') === false) {
                header("Location: $baseUrl/MSG-SHARKS/users/index.php");
                exit();
            }
            break;

        case 'driver':
            // Allow access to '/drivers/' URLs, and redirect otherwise
            if (strpos($currentUrl, '/drivers/') === false) {
                header("Location: $baseUrl/MSG-SHARKS/drivers/index.php");
                exit();
            }
            break;

        case 'admin':
            // Allow access to '/admin/' URLs, and redirect otherwise
            if (strpos($currentUrl, '/admin/') === false) {
                header("Location: $baseUrl/MSG-SHARKS/admin/index.php");
                exit();
            }
            break;

        default:
            // If the role is something unexpected, redirect to a fallback page
            header("Location: $baseUrl/MSG-SHARKS/index.php");
            exit();
    }
} else {
    // If session role is not set, redirect to the home page for protected URLs
    if (strpos($currentUrl, '/MSG-SHARKS/users/') !== false ||
        strpos($currentUrl, '/MSG-SHARKS/drivers/') !== false ||
        strpos($currentUrl, '/MSG-SHARKS/admin/') !== false) {
        // Redirect if trying to access a protected area without a valid session
        header("Location: $baseUrl/MSG-SHARKS/index.php");
        exit();
    }
}
