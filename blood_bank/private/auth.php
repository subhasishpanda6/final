<?php

// if user is not logged in then, we will redirect to the login page
if(empty($_SESSION['user_type']) && $_SESSION['user_type'] !== 'blood_bank' && empty($_SESSION['user_id'])){
    header("location:./");
    die;
}

//if user already logged in, if they want to access login page we will not give the access, we will redirect to the dashboard page
// if($_SERVER['REQUEST_URI'] === "/shms_final/blood_bank/" ||  $_SERVER['PHP_SELF'] === "shms_final/blood_bank/index.php"){
//     if(isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'blood_bank'){
        
//         header("location:blood_bank_dashboard.php");
//                 die;
//     }
// }
 



?>