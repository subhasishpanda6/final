<?php
// session_start();
function getActualFilePath(){
	$path = __DIR__;
    $startPoint = strpos($path,"\user");
    $endPoint = intval($startPoint)+1;
    return substr($path,0,$endPoint);
}
// include_once(getActualFilePath()."app/db/db.php");
include_once(getActualFilePath()."app/init.php");
if(isset($_POST['reason']) && $_POST['reason']==="cancel"){

    $status = "cancel";
    $donation_id = $_POST['donation_id'];
    $response = $conn->prepare("UPDATE blood_donate SET status=? WHERE donate_id = ?");
    $response->bind_param("si",$status,$donation_id);
    if($response->execute()){
        echo "ok";
    }
    $response->close();
    $conn->close();
}
if(isset($_POST['for']) && $_POST['status']==="cancel"){

    $status = "cancel";
    $request_id = $_POST['request_id'];
    $response = $conn->prepare("UPDATE need_blood SET request_status=? WHERE request_id = ?");
    $response->bind_param("si",$status,$request_id);
    if($response->execute()){
        echo "ok";
    }
    $response->close();
    $conn->close();
}
?>