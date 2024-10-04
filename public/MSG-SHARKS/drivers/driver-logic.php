
<?php
include('../config.php');
extract($_REQUEST);
session_start();
$return = [];
switch($requestType){
    
    case 'updateProfile':
        $db = new Database();
        $checkQuery = "SELECT count(license_number) as rowCount FROM drivers WHERE user_id != '$userId' AND license_number = '$licensenumber'";
        $res = $db->fetchSingle($checkQuery);
        if($res['rowCount'] == 0){
            $query = "UPDATE drivers SET `name` = '$username',`contact_number`='$phone',`address`='$address',`license_number`='$licensenumber',updated_at=NOW() WHERE user_id = '$userId'";
            $result = $db->execute($query);
            if($result){
                $query = "UPDATE users SET `name` = '$username',updated_at=NOW() WHERE user_id = '$userId'";
                $db->execute($query);
                $return = ['status'=>'1','message'=>'Profile update successfully!'];
                $_SESSION['username'] = $username;
            }else{
                $return = ['status'=>'0','message'=>'Api Error!'];
            }
        }else{
            $return = ['status'=>'0','message'=>'This license number already exists'];
        }
        echo json_encode($return);
    break;

    case 'updateStatus':
        $db = new Database();
        $query = "UPDATE emergency_requests SET `status`='$status',updated_at=NOW() WHERE request_id = '$request_id'";
        $result = $db->execute($query);
        if($result){
            switch($status){
                case 'on-route':
                    $message = "Your driver is On Route";
                break;
                case 'arrived':
                    $message = "Your driver is arrived on your pickup address";
                break;
                case 'completed':
                    $message = "Your request complete successfully dont forget to feedback about our service";
                    $query = "SELECT driver_id,ambulance_id FROM emergency_requests WHERE request_id = '$request_id'";
                    $data = $db->fetchSingle($query);
                    $driver_id = $data['driver_id'];
                    $ambulance_id = $data['ambulance_id'];
                    $query = "UPDATE drivers SET `status`='available',updated_at=NOW() WHERE driver_id = '$driver_id'";
                    $db->execute($query);
                    $query = "UPDATE ambulances SET `status`='available',updated_at=NOW() WHERE ambulance_id = '$ambulance_id'";
                    $db->execute($query);
                break;
            }
            $query = "INSERT INTO `notifications`( `user_id`, `message`, `status`, `created_at`, `is_deleted`) VALUES ('$user_id','$message','sent',NOW(),'0')";
            $db->execute($query);
            $return = ['status'=>'1','message'=>'Status updated successfully!'];
        }else{
            $return = ['status'=>'0','message'=>'Failed to update status'];
        }
        echo json_encode($return);
    break;
}