<?php
			
session_start();							
	$patient_id=$_SESSION['patient_id'];									
require_once("db.php"); 

										if (isset($_POST['submit1'])) {   
$change_password=$_POST['change_password'];

    //$sql = $conn->prepare("UPDATE doctor_registration SET $change_password=? WHERE id='$doc_id'")
     $sql = "UPDATE patient_registration SET password=$change_password  WHERE id='$patient_id' ";
    
    
    
    
     $result=$conn->query($sql);

    //$sql->bind_param("s", $change_password); 
    if($result)
    { 
     
      //echo '<script>alert("Saved Successfully")</script>';
      header("Location:patient_profile.php");
 
    } else {
      echo '<script>alert("Problem in Adding New Record")</script>';
    }

  }
  $conn->close();

   ?>