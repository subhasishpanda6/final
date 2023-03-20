<?php
  if (isset($_POST['submit'])) {
    require_once("../db.php");
    $sql = $conn->prepare("INSERT INTO lab_registration (lab_name,email,password,address,city,pincode,joining_date) VALUES (?, ?, ?,?,?,?,?)");  
    $lab_name=$_POST['lab_name'];
    $email = $_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
    $joining_date=$_POST['joining_date'];
    $sql->bind_param("sssssss", $lab_name, $email,$password,$address,$city,$pincode,$joining_date); 
    if($sql->execute()) {
      echo '<script>alert("Added Successfully")</script>';
      header("Location:lab_information.php");
    } else {
      echo '<script>alert("Problem in Adding New Record")</script>';
    }
    $sql->close();   
    $conn->close();
  } 
?>