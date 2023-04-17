<?php

function getActualFilePath(){
	$path = __DIR__;
    $startPoint = strpos($path,"\user");
    $endPoint = intval($startPoint)+1;
    return substr($path,0,$endPoint);
}
define("page_access_permission",true);
include_once(getActualFilePath()."app/init.php");
$get_donar_result = $conn->query("SELECT * FROM `donar` WHERE `register_id` = {$_SESSION['patient_id']}");
$donar_data = $get_donar_result->fetch_assoc();
$data = [];
$pending = 0;
$cancel = 0;
$reject = 0;
$accept = 0;
 if(isset($_POST['value']) && ($_POST['value'] === "need_blood")){
    $total_request_res = $conn->query("SELECT * FROM need_blood WHERE patient_id = {$_SESSION['patient_id']}");
    $total= $conn->affected_rows;
    $data['total_request'] = $total;
    if($total){
        while($res= $total_request_res->fetch_object()){
            if($res->request_status === "pending"){
                $pending++;
            }else if($res->request_status === "cancel"){
                $cancel++;
            }else if($res->request_status === "reject"){ 
                $reject++;
            }else if($res->request_status === "accept"){
                $accept++;
            }
        }
    }
    $data['pending'] = $pending;
    $data['cancel'] = $cancel;
    $data['accept'] = $accept;
    $data['reject'] = $reject;
 } else if($_POST['value'] && ($_POST['value'] === "blood_donation")){
    $total_request_res = $conn->query("SELECT * FROM blood_donate WHERE donar_id = {$donar_data['donar_id']}");
    $total= $conn->affected_rows;
    $data['total_request'] = $total;
    if($total){
        while($res= $total_request_res->fetch_object()){
            if($res->status === "pending"){
                $pending++;
            }else if($res->status === "cancel"){
                $cancel++;
            }else if($res->status === "reject"){
                $reject++;
            }else if($res->status === "accept"){
                $accept++;
            }
        }
    }
    $data['pending'] = $pending;
    $data['cancel'] = $cancel;
    $data['accept'] = $accept;
    $data['reject'] = $reject;
 }

 echo json_encode($data);

?>