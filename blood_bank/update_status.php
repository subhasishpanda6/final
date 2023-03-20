<?php
// require_once("../blood_bank/private/initialization.php");
session_start();
$_SESSION["user_id"];
if(isset($_POST['reason']) && $_POST['reason']==="accept"){
    require_once("db.php");
    $status = "accept";
    $donation_id = $_POST['donation_id'];
    $response = $conn->prepare("UPDATE blood_donate SET status=? WHERE donate_id = ?");
    $response->bind_param("si",$status,$donation_id);
    if($response->execute()){
        echo "ok";
    }
    $response->close();
    $conn->close();
}
if(isset($_POST['reason']) && $_POST['reason']==="reject"){
    require_once("db.php");
    $status = "reject";
    $donation_id = $_POST['donation_id'];
    $response = $conn->prepare("UPDATE blood_donate SET status=? WHERE donate_id = ?");
    $response->bind_param("si",$status,$donation_id);
    if($response->execute()){
        echo "ok"; 
    }
    $response->close();
    $conn->close();
}
// need blood
if(isset($_POST['for'])  && $_POST['for'] === 'need_blood' && $_POST['status'] === 'accept'){
    require_once("db.php");
    $status = "accept";
    $request_id = $_POST['request_id'];
    // get blood stock
    $blood_stock = $conn->query("SELECT * FROM blood_bank_stock WHERE blood_group_id = {$_POST['bg']} AND user_id = {$_POST['bb']}");
    $result = $blood_stock->fetch_object();
    // print_r($conn);
    if($conn->affected_rows<=0){
        echo "stock";
        return;
    }
    // change the request status for need blood
    $response = $conn->prepare("UPDATE need_blood SET request_status=? WHERE request_id = ?");
    if($_POST['unit'] > $result->stock || $result->stock < 10){
        echo "insufficent";
    }else{
        $response->bind_param("si",$status,$request_id);
        // calculate stock after need blood request
        $current_stock = intval($result->stock);
        $need_unit = intval($_POST['unit']);
        $final_stock = $current_stock - $need_unit;
        if($response->execute()){
            // update the final stock
            $stock_update = $conn->query("UPDATE blood_bank_stock SET stock = $final_stock WHERE blood_group_id = {$_POST['bg']} AND user_id = {$_POST['bb']}");
            echo "ok";
        }
    }
    $response->close();
    $conn->close();
   
}
if(isset($_POST['for'])  && $_POST['for'] === 'need_blood' && $_POST['status'] === 'reject'){
    require_once("db.php");
    $status = "reject";
    $request_id = $_POST['request_id'];
    $response = $conn->prepare("UPDATE need_blood SET request_status=? WHERE request_id = ?");
    $response->bind_param("si",$status,$request_id);
    if($response->execute()){
        echo "ok";
    }
    $response->close();
    $conn->close();
   
}