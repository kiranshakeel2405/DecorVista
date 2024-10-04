
<?php
include('../config.php');
extract($_REQUEST);
session_start();
$return = [];
function generateRandomCoordinatesWithinKarachi() {
    // Define approximate latitude and longitude bounds for Karachi
    $karachiLatitudeMin = 24.8617;
    $karachiLatitudeMax = 25.4081;
    $karachiLongitudeMin = 66.9260;
    $karachiLongitudeMax = 67.3434;

    // Use mt_rand to generate a more precise random number, and scale it for decimals
    $latitude = mt_rand($karachiLatitudeMin * 1000000, $karachiLatitudeMax * 1000000) / 1000000;
    $longitude = mt_rand($karachiLongitudeMin * 1000000, $karachiLongitudeMax * 1000000) / 1000000;

    // Create an associative array with keys
    $coordinates = [
        'latitude' => $latitude,
        'longitude' => $longitude
    ];

    return $coordinates;
}
switch($requestType){
    
    case 'dispatchRequest':
        $db = new Database();
        $query = "UPDATE emergency_requests SET ambulance_id = '$ambulance_id',driver_id='$driver_id',updated_at=NOW(),`status`='dispatched' WHERE request_id = '$request_id'";
        $db->execute($query);
        $query = "UPDATE drivers SET `status`='on-duty',updated_at=NOW() WHERE driver_id = '$driver_id'";
        $db->execute($query);
        $query = "UPDATE ambulances SET `status`='on-duty',updated_at=NOW() WHERE ambulance_id = '$ambulance_id'";
        $db->execute($query);
        $query = "SELECT user_id FROM drivers WHERE driver_id = '$driver_id'";
        $driverUserId = $db->fetchSingle($query);
        $dui = $driverUserId ['user_id'];
        $query = "INSERT INTO `notifications`(`user_id`, `message`, `status`, `created_at`, `is_deleted`) VALUES ('$dui','New request dispatched please check your active request section for details','sent',NOW(),'0')";
        $db->execute($query);
        $query = "INSERT INTO `notifications`(`user_id`, `message`, `status`, `created_at`, `is_deleted`) VALUES ('$user_id','Your request dispatched successfully please check your active request status section for details','sent',NOW(),'0')";
        $db->execute($query);
        $return = ['status'=>'1','message'=>'Request dispatched successfully!'];
        echo json_encode($return);
    break;

    case 'addAmbulance':
        $db = new Database();
        $query = "SELECT count(ambulance_id) as rowCount FROM ambulances WHERE ambulance_number = '$ambulancenumber'";
        $result = $db->fetchSingle($query);
        $coordinates = generateRandomCoordinatesWithinKarachi();
        $latitude = $coordinates['latitude'];
        $longitude = $coordinates['longitude'];
        if($result['rowCount'] == 0){
            if(isset($_FILES['imageupload']) && $_FILES['imageupload']['error'] == 0){
                $imageFileName = basename($_FILES['imageupload']['name']);
                $targetFilePath = '../uploads/' . $imageFileName;
                
                if(move_uploaded_file($_FILES['imageupload']['tmp_name'],$targetFilePath)){
                    $query = "INSERT INTO `ambulances`(`type`, `image`, `ambulance_number`, `equipment`, `size`, `status`, `cost`, `location_latitude`, `location_longitude`, `created_at`, `updated_at`, `is_deleted`) VALUES ('$type','$imageFileName','$ambulancenumber','$equipments','$size','$status','$costprice','$latitude','$longitude',NOW(),NOW(),'0')";
                    $db->execute($query);
                    $return = ['status'=>'1','message'=>'Ambulance Add Successfully!'];
                }else{
                    $return = ['status'=>'0','message'=>'Failed to Add Image'];
                }
            }else{
                $return = ['status'=>'0','message'=>'Failed to Add Image'];
            }
        }else{
            $return = ['status'=>'0','message'=>'This ambulance number already exists'];
        }
        echo json_encode($return);
    break;
    
    case 'editAmbulance':
        $db = new Database();
        if(isset($_FILES['imageupload'])){
            $imageFileName = basename($_FILES['imageupload']['name']);
            $targetFilePath = '../uploads/' . $imageFileName;
            
            if(move_uploaded_file($_FILES['imageupload']['tmp_name'],$targetFilePath)){
                $query = "UPDATE `ambulances`
                SET `type` = '$type',
                    `image` = '$imageFileName',
                    `ambulance_number` = '$ambulancenumber',
                    `equipment` = '$equipments',
                    `size` = '$size',
                    `status` = '$status',
                    `cost` = '$costprice',
                    `location_latitude` = '$latitude',
                    `location_longitude` = '$longitude',
                    `updated_at` = NOW()
                WHERE `ambulance_id` = '$ambulanceId'";
                $db->execute($query);
                $return = ['status'=>'1','message'=>'Ambulance Updated Successfully!'];
            }else{
                $return = ['status'=>'0','message'=>'Failed to Add Image'];
            }
        }else{
            $query = "UPDATE `ambulances`
            SET `type` = '$type',
                `ambulance_number` = '$ambulancenumber',
                `equipment` = '$equipments',
                `size` = '$size',
                `status` = '$status',
                `cost` = '$costprice',
                `updated_at` = NOW()
            WHERE `ambulance_id` = '$ambulanceId'";
            $db->execute($query);
            $return = ['status'=>'1','message'=>'Ambulance Updated Successfully!'];
        }
        echo json_encode($return);
    break;

    case 'deleteAmbulance':
        $db = new Database();
        $query = "UPDATE ambulances SET is_deleted = '1',updated_at=NOW() WHERE ambulance_id = $id";
        $db->execute($query);
        $return = ['status'=>'1','message'=>'Ambulance deleted successfully'];
        echo json_encode($return);
    break;

    case 'modifyDriver':
        $db = new Database();
        $query = "UPDATE drivers SET `status` = '$status',license_number='$licensenumber',updated_at=NOW() WHERE driver_id = $driver_id";
        $db->execute($query);
        $return = ['status'=>'1','message'=>'Driver Profile updated successfully'];
        echo json_encode($return);
    break;

    case 'deleteDriver':
        $db = new Database();
        $query = "UPDATE drivers SET is_deleted = '1',updated_at=NOW() WHERE driver_id = $id";
        $db->execute($query);
        $return = ['status'=>'1','message'=>'Driver deleted successfully'];
        echo json_encode($return);
    break;

    case 'updateLocation':
        $db = new Database();
        $query = "SELECT * FROM ambulances WHERE is_deleted = '0'";
        $result = $db->fetchAll($query);
        foreach($result as $val){
            $coordinates = generateRandomCoordinatesWithinKarachi();
            $latitude = $coordinates['latitude'];
            $longitude = $coordinates['longitude'];
            $ambulanceId = $val['ambulance_id'];
            $query = "UPDATE ambulances SET location_longitude = '$longitude',location_latitude='$latitude' WHERE ambulance_id = '$ambulanceId'";
            $db->execute($query);
        }
        $return = ['status'=>'1','message'=>'Success'];
        echo json_encode($return);
    break;
    
}