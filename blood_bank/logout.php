<?php
// logout
    session_start();
    session_regenerate_id();
//     session_unset();
//     session_destroy();
//     // unset($_SESSION['user_type']);
//     // unset($_SESSION["user_id"]);
//     // unset($_SESSION["user_name"]);
//     // unset($_SESSION["user_email"]);
//     // unset($_SESSION["user_img"] );
//     header("location:./");
//     die;

// // echo "<pre>";
// // print_r($_SERVER);
// echo $_SESSION['user_type'];
// echo "<pre>";
// print_r($_SESSION);
// print_r($_COOKIE[session_name()]);
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