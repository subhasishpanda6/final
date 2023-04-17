<?php
// logout
    session_start();
    session_regenerate_id();
if($_SESSION['user_type'] === "blood_bank"){
    unset($_SESSION['user_type']);
    unset($_SESSION["user_id"]);
    unset($_SESSION["user_name"]);
    unset($_SESSION["user_email"]);
    unset($_SESSION["user_img"] );
    header("location:./");
    die;
}
?>