<?php 
	require_once("db.php");
	
	$sql = $conn->prepare("DELETE  FROM patient_registration WHERE id=?");  
	$sql->bind_param("i", $_GET["id"]); 
	$sql->execute();
	$sql->close(); 
	$conn->close();
	header('location:patient_list.php');		
?>