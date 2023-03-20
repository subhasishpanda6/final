<?php
			
session_start();							
	$patient_id=$_SESSION['patient_id'];									
require_once("db.php"); 

										if (isset($_POST['submit3'])) {   



      $phone_no=$_POST['phone_no'];
                
    
    $sql = "UPDATE patient_registration SET  phone_no=$phone_no WHERE id='$patient_id'";
    
    
    
    

    $result=$conn->query($sql);

     
    if($result){

    
   
     echo '<script>alert("Saved Successfully")</script>';
      header("Location:patient_profile.php");
 
    } else {
      echo '<script>alert("Problem in Adding New Record")</script>';
    }

  }
  $conn->close();


   ?>