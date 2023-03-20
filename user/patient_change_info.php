<?php
			
session_start();							
	$patient_id=$_SESSION['patient_id'];									
require_once("db.php"); 

										if (isset($_POST['submit2'])) {   
$change_age=$_POST['change_age'];
$change_location=$_POST['change_location'];
$change_phone_no=$_POST['change_phone_no'];



    $sql = $conn->prepare("UPDATE patient_registration SET age=?,location=?, phone_no=? WHERE id='$patient_id' ");
  
    
    $sql->bind_param("iss", $change_age,$change_location,$change_phone_no); 

    if($sql->execute()) {
    
     
      echo '<script>alert("Saved Successfully")</script>';
      header("Location:patient_profile.php");
 
    } else {
      echo '<script>alert("Problem in Adding New Record")</script>';
    }

  }
  $conn->close();

   ?>