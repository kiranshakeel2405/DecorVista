<?php
include('../config.php');
extract($_REQUEST);
session_start();
$return = [];
switch ($requestType) {
    case 'ambulanceRequest':
        $db = new Database();
        $query = "INSERT INTO `emergency_requests`( `user_id`, `hospital_name`, `hospital_address`, `pickup_address`, `type`, `status`,`latitude`,`longitude`, `created_at`, `updated_at`, `is_deleted`) VALUES ('$userId','$hospitalname','$hospitaladdress','$pickupaddress','$type','pending','$latitude','$longitude',NOW(),NOW(),'0')";
        $result = $db->execute($query);
        if ($result) {
            $return = ['status' => '1', 'message' => 'Your request send successfully'];
        } else {
            $return = ['status' => '0', 'message' => 'Api Error!'];
        }
        echo json_encode($return);
        break;

    case 'updateMedicalHistory':
        $db = new Database();
        $query = "UPDATE users SET `medical_history` = '$medicalhistory',`allergies`='$allergies',`emergency_contact_phone`='$emergencycontact',updated_at=NOW() WHERE user_id = '$userId'";
        $result = $db->execute($query);
        if ($result) {
            $return = ['status' => '1', 'message' => 'Medical History update successfully!'];
        } else {
            $return = ['status' => '0', 'message' => 'Api Error!'];
        }
        echo json_encode($return);
        break;

    case 'fetchFirstAidDetails':
        $db = new Database();
        $query = "SELECT * FROM first_aid_instructions WHERE instruction_id = '$instruction_id'";
        $result = $db->fetchSingle($query);
        if ($result) {
            $_SESSION['firstaid'] = $result;
            $return = ['status' => '1', 'message' => 'Fetch Data successfully!'];
        } else {
            $return = ['status' => '0', 'message' => 'Api Error!'];
        }
        echo json_encode($return);
        break;

    case 'updateProfile':
        $db = new Database();
        $query = "UPDATE users SET `name` = '$username',`phone_number`='$phone',`address`='$address',updated_at=NOW() WHERE user_id = '$userId'";
        $result = $db->execute($query);
        if ($result) {
            $return = ['status' => '1', 'message' => 'Profile update successfully!'];
            $_SESSION['username'] = $username;
        } else {
            $return = ['status' => '0', 'message' => 'Api Error!'];
        }
        echo json_encode($return);
        break;

    case 'updateLocation':
        $db = new Database();
        $query = "UPDATE ambulances SET location_latitude = $latitude, location_longitude = $longitude WHERE ambulance_id = '$ambulance_id'";
        $result = $db->execute($query);
        echo json_encode(['status' => 1, 'message' => 'Ambulance location updated successfully']);
        break;

    case 'addFeedback':
        $db = new Database();
        $query = "INSERT INTO `feedback`( `user_id`, `request_id`,  `comments`, `created_at`, `is_deleted`) VALUES ('$userId','$requestId','$feedback',NOW(),'0')";
        $db->execute($query);
        echo json_encode(['status' => 1, 'message' => 'Thank you for your feedback']);
        break;

    case 'filterAmbulance':
        $db = new Database();
        $where = "WHERE type = '$type' AND is_deleted = '0'";
        if (isset($status) && !empty($status)) {
            $where .= " AND `status`='$status' ";
        }
        $query = "SELECT * FROM ambulances $where";
        $result = $db->fetchAll($query);
        $html = '';
        foreach ($result as $ambulance) {
            $html .= '<div class="col-sm-6 col-lg-4">
        <div class="card p-2 h-100 shadow-none border">
            <div class="rounded-2 text-center mb-4">
                <a href="#"><img style="height:195px" class="img-fluid" 
                    src="' . (strpos($ambulance['image'], 'https://') === 0 ? $ambulance['image'] : '../uploads/' . $ambulance['image']) . '" 
                    alt="ambulance image"></a>
            </div>
            <div class="card-body p-4 pt-2">
                <div class="d-flex justify-content-between align-items-center mb-4">';

            // PHP block for setting badge
            switch ($ambulance['status']) {
                case 'available':
                    $badge = "bg-label-success";
                    break;
                case 'on-duty':
                    $badge = "bg-label-warning";
                    break;
                case 'maintenance':
                    $badge = "bg-label-danger";
                    break;
            }

            $html .= '<span class="badge ' . $badge . '">' . $ambulance['status'] . '</span>
                </div>
                <a href="#" class="h5">' . $ambulance['type'] . '</a>
                <p class="mt-1">' . $ambulance['equipment'] . '</p>
                <p class="d-flex align-items-center mb-1">Cost: ' . $ambulance['cost'] . '</p>
                <div class="d-flex flex-column flex-md-row gap-4 text-nowrap flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                    <a class="w-100 btn btn-label-primary d-flex align-items-center" href="#">
                        <span class="me-2">' . $ambulance['size'] . '</span>
                        <i class="bx bx-chevron-right bx-sm lh-1 scaleX-n1-rtl"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>';

        }
        $return = ['status' => '1', 'html' => $html];
        echo json_encode($return);
        break;
}