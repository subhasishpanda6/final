<?php
session_start();
require_once("../db.php");

if(!empty($_GET["action"])) {
$testId = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
//$quantity = isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : '';
switch($_GET["action"]) {
case "add":
//if(!empty($quantity)) {
$stmt = $conn->prepare("select l.lab_name,l.email,l.address,l.city,l.pincode,l.phone_no ,t.id,t.test_name,t.price from lab_registration l ,lab_test t where l.lab_id=t.lab_id and t.id='$testId'");
$stmt->bind_param('i',$testId);
$stmt->execute();
$testDetails = $stmt->get_result()->fetch_object();

$itemArray = array($testDetails->id=>array('test_name'=>$testDetails->test_name,'lab_name'=>$testDetails->lab_name,'id'=>$testDetails->id, 'price'=>$testDetails->price));

if(!empty($_SESSION["cart_item"])) {

if(in_array($testDetails->id,array_keys($_SESSION["cart_item"]))) {

  //key and value  differentiate



} else {
$_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray;
}
} else {
$_SESSION["cart_item"] = $itemArray;
}
//echo '<script>alert("Item is added")</script>';
header("Location:lab.php");
break;



case "remove":
if(!empty($_SESSION["cart_item"])) {
foreach($_SESSION["cart_item"] as $k => $v) {
if($testId == $v['id'])
unset($_SESSION["cart_item"][$k]);

}
header("Location:lab.php");

}
break;

case "empty":
unset($_SESSION["cart_item"]);
//echo '<script>alert("All item are removed")</script>';
header("Location:lab.php");
break;
}
}

