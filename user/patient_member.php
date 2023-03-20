<?php 
session_start();
if(!isset($_SESSION["patient"])){
	header("Location: patient_login.php");
} else {
?>
<!doctype html>
<html>
<head>
<title>Welcome</title>
</head>
<body>
<h2>Welcome, <?=$_SESSION['patient'];?>! <a href="logout.php">Logout</a></h2>
<p>
PBA INSTITUTE
</p>
</body>
</html>
<?php
}
?>


