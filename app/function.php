<?php
// it accept ony numeric values
function only_integer($param){
    if(preg_match("/^[0-9]+$/", $param)){
        return $param;
    }
    return preg_match("/^[0-9]+$/", $param);
}


// ------------------------
// ob_start();
//    // get directory path

//    //PATH LINK
//    define("PATH",__FILE__);
   
//    //get private path (it will return C:\xampp\htdocs\shms\private)
//    $dir_name = strpos(PATH,"htdocs");
//    $startingPoint = intval($dir_name)+7;
//     $getFileName = substr(PATH,$startingPoint);
// //    define("PRIVATE_PATH",dirname(PATH)); 
   
//    //get public path(it will return C:\xampp\htdocs\shms\public)
// //    define("PUBLIC_PATH",dirname(PRIVATE_PATH)."\public");

//     // get document path
//     // $link = $_SERVER['SCRIPT_NAME'];
//     // echo $link;
    // define("WWW_PATH","shms_final/user/");
    // define('CSSPATH', 'shms_final/user/assets/css/'); //define css path
    // $cssItem = 'style.css'; //css item to display
// echo $d;
define("BASE_URL","http://localhost/shms_final/");
// HTTP_HOST
// http://localhost/shms_final/user/doctor/show_doctor.php

// -----------------------------------------------------------------------
// profile side links 
$dashboard_link = "patient_dashboard.php";
$doctor_link = "doctor/show_doctor.php";
$blood_bank_link = "blood-bank/blood_bank_dashboard.php";
$pathlab_link = "lab/lab.php";
$profile_settings = "patient_profile.php";
$logout_link = "logout.php";
// parimary nav links
$home_link = "./";
$nav_blood_bank = "blood_bank.php";
// profile pic loaction
$profile = "profile_pic";

// get file path
function getPath($path){
    $convertArr = explode("\\", $path);
    $length = intval(count($convertArr));
    if($convertArr[$length - 1] === "doctor"){
        dorctoryDir();
    }else if($convertArr[$length - 1] === "blood-bank"){
        bloodBank();
    }else if($convertArr[$length - 1] === "lab"){
        labtest();
    }
}
// if page inside doctor directory
function dorctoryDir(){
        $GLOBALS['dashboard_link'] = "../patient_dashboard.php";
        $GLOBALS['doctor_link'] = "show_doctor.php";
        $GLOBALS['blood_bank_link'] = "../blood_bank_dashboard.php";
        $GLOBALS['pathlab_link'] = "../lab/lab.php";
        $GLOBALS['profile_settings'] = "../patient_profile.php";
        $GLOBALS['logout_link'] = "../logout.php";
        $GLOBALS['nav_blood_bank'] = "../blood_bank.php";
        $GLOBALS['home_link'] = "../";
        $GLOBALS['profile'] = "../profile_pic";
}
// if page inside labtest directory
function labtest(){
        $GLOBALS['dashboard_link'] = "../patient_dashboard.php";
        $GLOBALS['doctor_link'] = "../show_doctor.php";
        $GLOBALS['blood_bank_link'] = "../blood-bank/blood_bank_dashboard.php";
        $GLOBALS['pathlab_link'] = "lab.php";
        $GLOBALS['profile_settings'] = "../patient_profile.php";
        $GLOBALS['logout_link'] = "../logout.php";
        $GLOBALS['home_link'] = "../";
        $GLOBALS['profile'] = "../profile_pic";
}
// if page inside bloodBank directory
function bloodBank(){
        $GLOBALS['dashboard_link'] = "../patient_dashboard.php";
        $GLOBALS['doctor_link'] = "../show_doctor.php";
        $GLOBALS['pathlab_link'] = "../lab/lab.php";
        $GLOBALS['profile_settings'] = "../patient_profile.php";
        $GLOBALS['logout_link'] = "../logout.php";
        $GLOBALS['home_link'] = "../";
        $GLOBALS['nav_blood_bank'] = "../blood_bank.php";
        $GLOBALS['profile'] = "../profile_pic";
}


//----------------------------------

?>