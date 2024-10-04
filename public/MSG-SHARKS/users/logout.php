<?php
session_start();
session_destroy();
$currentUrl = $_SERVER['REQUEST_URI'];

// Get the domain and scheme (http or https) dynamically
$domain = $_SERVER['HTTP_HOST'];
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$baseUrl = $scheme . "://" . $domain; // This will give you the correct base URL
header('location: '.$baseUrl.'/MSG-SHARKS/index.php');
?>