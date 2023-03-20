<?php 
session_start();
unset($_SESSION['sess_user2']);
unset($_SESSION['patient']);
unset($_SESSION['patient_id']);
unset($_SESSION['patient_name']);
unset($_SESSION['patient_age']);
// session_destroy();
echo "<script>window.location.href = './'</script>";
?>
