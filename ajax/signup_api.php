<?php
session_start();
header('Content-Type: application/json');
include ('../include/config.php');
if($conn->connect_error){
    echo json_encode([
        "status" => "error",
        "message" => "Database connection failed"
    ]);
    exit;
}
$name             = trim($_POST['name']);
$email            = trim($_POST['email']);
$phone            = trim($_POST['phone']);
$password         = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$phone = mysqli_real_escape_string($conn, $phone);
if(empty($name) || empty($email) || empty($phone) || empty($password) ||  empty($confirm_password)){
    echo json_encode([
        "status" => "error",
        "message" => "All fields are required"
    ]);
    exit;
}
if(!preg_match("/^[a-zA-Z ]+$/", $name)){
    echo json_encode([
        "status" => "error",
        "message" => "Name must contain only letters"
    ]);
    exit;
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo json_encode([
        "status" => "error",
        "message" => "Invalid email address"
    ]);
    exit;
}
if(!preg_match("/^[0-9]{10}$/", $phone)){
    echo json_encode([
        "status" => "error",
        "message" => "Phone number must be 10 digits"
    ]);
    exit;
}
$passwordPattern ="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/";
if(!preg_match($passwordPattern, $password)){
    echo json_encode([
        "status" => "error",
        "message" => "Password must be strong"
    ]);
    exit;
}
if($password !== $confirm_password){
    echo json_encode([
        "status" => "error",
        "message" => "Passwords do not match"
    ]);
    exit;
}
$checkUser = mysqli_query($conn,  "SELECT id FROM user WHERE email='$email' LIMIT 1");
if(mysqli_num_rows($checkUser) > 0){
    echo json_encode([
        "status" => "error",
        "message" => "Account already exists"
    ]);
    exit;
}
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$created_at = date("Y-m-d H:i:s");
$insertQuery = "INSERT INTO user (name,email,phone,password,created_at)
VALUES( '$name','$email','$phone','$hashedPassword','$created_at')";
if(mysqli_query($conn, $insertQuery)){
    $_SESSION['user_id'] = mysqli_insert_id($conn);
    $_SESSION['user_name'] = $name;
    echo json_encode([
        "status" => "success",
        "message" => "Signup successful"
    ]);
}else{
    echo json_encode([
        "status" => "error",
        "message" => "Something went wrong"
    ]);
}
?>