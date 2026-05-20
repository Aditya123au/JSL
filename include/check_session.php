<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
// LOGIN CHECK
if(!isset($_SESSION['user_id'])){
    header("Location: login_signup.php");
    exit;
}
$session_timeout = 1800;
if(isset($_SESSION['login_time']) &&(time() - $_SESSION['login_time']) > $session_timeout){
    session_unset();
    session_destroy();
    header("Location: login_signup.php");
    exit;
}
$_SESSION['login_time'] = time();

?>