<?php
session_start();
  require_once("../db.php");
 $patient_id= $_SESSION['patient_id'];
  if (isset($_POST['submit'])) {    
    $sql = $conn->prepare("UPDATE appoinment_booking SET  payment_mode=?  WHERE patient_id='$patient_id' ");
    $payment_mode=$_POST['payment_mode'];
    



    $sql->bind_param("s",$payment_mode);  
    if($sql->execute()) {
      echo '<script>alert("Saved Successfully")</script>';
      header("Location:booking_success.php");
    } else {
      echo '<script>alert("Problem in Adding New Record")</script>';
    }

  }