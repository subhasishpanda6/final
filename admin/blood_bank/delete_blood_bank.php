<?php 
	require_once("../db.php");
	
	$sql = $conn->prepare("DELETE  FROM blood_bank_registration WHERE blood_bank_id=?");  
	$sql->bind_param("i", $_GET["id"]); 
	$sql->execute();
	$sql->close(); 
	$conn->close();
	header('location:blood_bank_information.php');		
?>