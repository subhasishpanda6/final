<?php
			
session_start();							
	$doc_id=$_SESSION['doctor_id'];									
require_once("db.php"); 

										if (isset($_POST['submit'])) {   


    $sql = $conn->prepare("UPDATE doctor_registration SET  phone_no=?,reg_no=?,fees=? WHERE id='$doc_id'");
    $phone_no=$_POST['phone_no'];
    $reg_no = $_POST['reg_no'];
    $fees= $_POST['fees'];
    
    
    


    $sql->bind_param("sss",$phone_no,$reg_no,$fees);  
    if($sql->execute()) {
      echo '<script>alert("Saved Successfully")</script>';
      header("Location:doctor_profile.php");
 
    } else {
      echo '<script>alert("Problem in Adding New Record")</script>';
    }

  }
  $conn->close();

   ?>