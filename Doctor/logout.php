<?php 
session_start();
unset($_SESSION['sess_user']);
unset($_SESSION['doctor_id']);
unset($_SESSION['doctor_name']);
session_destroy();
header("location:index.php");
?>
