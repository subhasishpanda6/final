<?php
session_start();  
  // Create database connection
 require_once("db.php");
$doc_id=$_SESSION['doctor_id'];
  // Initialize message variable
 

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];// predefined image is image and name is the image format(jpg or png)
  	// Get text
  	

  	// image file directory
  	$target = "profile_pic/".basename($image);//

  	$sql = "UPDATE doctor_registration SET image='$image'  WHERE id='$doc_id' ";
  	// execute query
  	//mysqli_query($sql);
  	$result=$conn->query($sql);
  	if($result)
  	{

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) { // tmp_name:stores the name of the temporary file, move_uploaded_file() function which moves an uploaded file from its temporary to permanent location
  		 //echo '<script>alert(" Profile Picture Saved Successfully")</script>';
  		 header("Location:doctor_profile.php");



  	}else{
  		echo '<script>alert("Problem in Adding Profile Picture")</script>';
  	}
  }
  }


?>