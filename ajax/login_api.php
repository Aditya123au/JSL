<?php
session_start();
include ('../include/config.php');
if($conn->connect_error){
    die("Connection Failed");
}
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];
if(empty($email) || empty($password)){
    echo json_encode([
        "status" => "error",
        "message" => "All fields are required"
    ]);
    exit;
}
$query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row['password'])){
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        echo json_encode([
            "status" => "success",
            "message" => "Login Successful"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Incorrect Password"
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Email not found"
    ]);
}
?>