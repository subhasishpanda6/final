<?php
session_start();
if($_SESSION['user_type'] === "admin"){
    session_unset();
    session_destroy();
    header("location:./");
    die;
}

// echo "<pre>";
// print_r($_SESSION);
?>