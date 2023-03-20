<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="assets/img/logo-white.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								
								<!-- Form -->
								<form action=" " method="post">
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Email" name="email">
									</div>
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Password" name="password">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
									</div>
								</form>
								<!-- /Form -->
								
								
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
if(isset($_POST["login"])){

if(!empty($_POST['email']) && !empty($_POST['password'])) {
    $email=$_POST['email'];
    $pass=$_POST['password'];

    //$con=mysql_connect('localhost','root','') or die(mysql_error());
    //mysql_select_db('user_registration') or die("cannot select DB");
    $con= mysqli_connect("localhost","root","","HCM","3306");

    $query=$con->query("SELECT * FROM doctor_registration WHERE email='".$email."' AND password='".$pass."'");
    $numrows=mysqli_num_rows($query);
    if($numrows!=0)
    {
    while($row=mysqli_fetch_assoc($query))
    {
    $dbemail=$row['email'];
    $dbpassword=$row['password'];
    $id=$row['id'];
    $name=$row['name'];
    }

    if($email == $dbemail && $pass == $dbpassword)
    {
    session_start();
    $_SESSION['sess_user']=$email;
    $_SESSION['doctor_id']=$id;
    $_SESSION['doctor_name']=$name;

    /* Redirect browser */
    header("Location: doctor_dashboard.php");
    }
    } else {
    echo "Invalid email or password!";
    }

} else {
    echo "All fields are required!";
}
}
?>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
</html>