<?php
include('./config.php');
extract($_REQUEST);
session_start();
$return = [];
switch($requestType){
    case 'signup':
        $db = new Database();
        $username = htmlspecialchars($username);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars($phone);
        $address = htmlspecialchars($address);
        $emergencyContactName = htmlspecialchars($emergencyContactName);
        $emergencyContactPhone = htmlspecialchars($emergencyContactPhone);
        $role = htmlspecialchars($role);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $checkQuery = "SELECT count(user_id) as rowCount FROM users WHERE email = '$email'";
        $result = $db->fetchSingle($checkQuery);
        if($result['rowCount'] < 1){
            $insertQuery = "INSERT INTO `users`(`email`, `password`, `name`, `phone_number`, `address`, `emergency_contact_name`, `emergency_contact_phone`, `role`, `created_at`, `updated_at`, `is_deleted`) VALUES ('$email','$hashedPassword','$username','$phone','$address','$emergencyContactName','$emergencyContactPhone','$role',NOW(),NOW(),'0')";
            $result = $db->execute($insertQuery);
            if($result){
                $userId = $db->lastInsertId();
                if($role == 'driver'){
                    $query = "INSERT INTO `drivers`( `name`, `user_id`, `contact_number`, `address`, `ambulance_id`, `status`, `created_at`, `updated_at`, `is_deleted`) VALUES ('$username','$userId','$phone','$address','0','available',NOW(),NOW(),'0')";
                    $db->execute($query);
                }
                $_SESSION['userId'] = $userId;
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $phone;
                $_SESSION['role'] = $role;
                $_SESSION['username'] = $username;
                $return = ['status'=>'1','message'=>'Success']; 
            }else{
                $return = ['status'=>'0','message'=>'Api Error!']; 
            }
        }else{
            $return = ['status'=>'0','message'=>'This email already exists']; 
        }
        echo json_encode($return);
    break;

    case 'login':
        $db = new Database();
        $checkQuery = "SELECT count(user_id) as rowCount,`password`,`name`,phone_number,user_id,`role` FROM users WHERE email = '$email'";
        $result = $db->fetchSingle($checkQuery);
        if($result['rowCount'] > 0){
            $hashedpassword = $result['password'];
            $verify = password_verify($password,$hashedpassword);
            if($verify){
                $_SESSION['userId'] = $result['user_id'];
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $result['phone_number'];
                $_SESSION['role'] = $result['role'];
                $_SESSION['username'] = $result['name'];
                $return = ['status'=>'1','message'=>'Success'];
            }else{
                $return = ['status'=>'0','message'=>'Invalid Password'];
            }
        }else{
            $return = ['status'=>'0','message'=>'Invalid Email'];
        }
        echo json_encode($return);
    break;
}