<?php
include '../config.php';
$db = new Database();
$query = "SELECT ambulance_id,ambulance_number, location_latitude as latitude, location_longitude as longitude FROM ambulances WHERE is_deleted = '0'";
$result = $db->fetchAll($query);
echo json_encode($result);