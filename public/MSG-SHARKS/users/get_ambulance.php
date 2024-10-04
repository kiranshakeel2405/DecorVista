<?php
include '../config.php';
$db = new Database();
$ambulance_id = $_GET['ambulance_id'];
$query = "SELECT ambulance_id, ambulance_number, location_latitude as latitude, location_longitude as longitude FROM ambulances WHERE ambulance_id = '$ambulance_id'";
$result = $db->fetchSingle($query);
echo json_encode($result);