<?php
///****** to restrict the access file ******************
if(!defined("page_access_permission")){
    echo '<!DOCTYPE html>
    <html>
    <head>
    <title>Access Denied</title>
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
restrict_permission();
// ****************************** database configuration******************
define("HOST","localhost");
/* 
******************
host name of the database
****************
*/
define("USERNAME","root");

/* 
******************
username of the database 
****************
*/
define("PASS","");
/* 
******************
password of the database 
****************
*/
define("DBNAME","hcm");
/* 
******************
database name 
****************
*/
define("Project_Name","shms_final");
/* 
******************
this is the project name 
prject name using for root folder of the project
linke - Project_Name/
****************
*/
define("upload","");
/* 
******************
 upload location where we can upload any types of file like - img,pdf etc;
****************
*/
session_start();
/* 
******************
session variable will be start
****************
*/
session_regenerate_id(true);
/* 
******************
regenarat session id all times
****************
*/

define("BASE_URL","http://localhost/".Project_Name."/");

/* 
******************
Base url for assets file linking like - css,js etc
****************
*/
// ini_set('display_errors', 0);
/* 
******************
Hiding errors from users
****************
*/


?>