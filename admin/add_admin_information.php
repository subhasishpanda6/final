<?php

 
  if (isset($_POST['submit'])) {
    require_once("../db.php");
    $sql = $conn->prepare("INSERT INTO admin (name,password,city,pincode,joining_date) VALUES (?, ?, ?,?,?,?,?,?,?,?)");  
    $name=$_POST['name'];
    $email = $_POST['email'];
    $department= $_POST['department'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $education=$_POST['education'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
    $joining_date=$_POST['joining_date'];
    $sql->bind_param("ssssssssss",  $name, $email,$department,$password,$gender,$education,$address,$city,$pincode,$joining_date); 
    if($sql->execute()) {
      echo '<script>alert("Added Successfully")</script>';
      header("Location:doctor_information.php");
    } else {
      echo '<script>alert("Problem in Adding New Record")</script>';
    }
    $sql->close();   
    $conn->close();
  } 
?>