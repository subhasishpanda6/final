<?php
// function getActualFilePath(){
// 	$path = __DIR__;
//     $startPoint = strpos($path,"\user");
//     $endPoint = intval($startPoint)+1;
//     return substr($path,0,$endPoint);
// }
function restrict_permission()
{
    if (!defined("page_access_permission")) {
        echo '<!DOCTYPE html>
        <html>
        <head>
        <title>Access Denied </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        </head>
        <body style="background-color: black;color: white">
        <div class="w3-display-middle">
        <h1 class="w3-jumbo w3-animate-top w3-center" style="color: red;"><code>Access Denied</code></h1>
        <hr class="w3-border-white w3-animate-left" style="margin:auto;width:50%">
        <h3 class="w3-center w3-animate-right">You dont have permission to view this site.</h3>
        <h3 class="w3-center w3-animate-zoom">🚫🚫🚫🚫</h3>
        <h6 class="w3-center w3-animate-zoom" stye="color: red;text-decoration: underline;">error code:403 forbidden</h6>
        </div>
        </body>
        </html>';
    }
}
// restrict permission
restrict_permission();
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// it accept ony numeric values
function only_integer($param)
{
    if (preg_match("/^[0-9]+$/", $param)) {
        return $param;
    }
    return preg_match("/^[0-9]+$/", $param);
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


// redirect page to another page
function redirect($page)
{
?>
    <script>
        window.location.href = <?= $page ?>
    </script>
<?php
}
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
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
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// get file path
function getPath($path)
{
    $convertArr = explode("\\", $path);
    $length = intval(count($convertArr));
    if ($convertArr[$length - 1] === "doctor") {
        dorctoryDir();
    } else if ($convertArr[$length - 1] === "blood-bank") {
        bloodBank();
    } else if ($convertArr[$length - 1] === "lab") {
        labtest();
    }
}
// if page inside doctor directory
function dorctoryDir()
{
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
function labtest()
{
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
function bloodBank()
{
    $GLOBALS['dashboard_link'] = "../patient_dashboard.php";
    $GLOBALS['doctor_link'] = "../show_doctor.php";
    $GLOBALS['pathlab_link'] = "../lab/lab.php";
    $GLOBALS['profile_settings'] = "../patient_profile.php";
    $GLOBALS['logout_link'] = "../logout.php";
    $GLOBALS['home_link'] = "../";
    $GLOBALS['nav_blood_bank'] = "../blood_bank.php";
    $GLOBALS['profile'] = "../profile_pic";
    $GLOBALS['blood_bank_link'] = "blood_bank_dashboard.php";
}


// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

function shutdownHandler()
{
    $error = error_get_last();
    if ($error['type'] == E_ERROR) {
    }
}
// register_shutdown_function('shutdownHandler');
// Basicaly, you can't "catch" fatal errors because they stop program execution. But there is one method to handle them. Register your own shutdown handler and check if last error was fatal.

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
function page($query){
    $page_title = $query['page'];
    $current_page = $query['page_number'];
    // $page_no = $query['page_number'];
    $total_page = $query['total_page'];
    $prev = $current_page > 1 ? intval($current_page - 1) : "";
    $prev_page = $current_page > 1 ? "" : "disabled";
    $next = $current_page < $total_page ? intval($current_page + 1) : "";
    $next_page = $current_page < $total_page ? "" : "disabled";
    $html = "
    <nav aria-label='Page navigation example '>
        <ul class='pagination justify-content-center'>";
       $html.=   "<li class='page-item {$prev_page}'>
                        <a class='page-link' href='?{$page_title}={$prev}' aria-label='Previous'>
                            <span aria-hidden='true'>&laquo;</span>
                        </a>
                    </li>";
                    for($i=1;$i<=$total_page;$i++){
                        $active = (intval($current_page) === intval($i)) ? "active" : "";
                    
                    $html.= "<li class='page-item {$active}'><a class='page-link' href='?{$page_title}={$i}'>{$i}</a></li>";
                }
                   $html.=" <li class='page-item {$next_page}'>
                        <a class='page-link' href='?{$page_title}={$next}' aria-label='Next'>
                            <span aria-hidden='true'>&raquo;</span>
                        </a>
                    </li>
        </ul>
    </nav>
    ";
    echo $html;
}
?>