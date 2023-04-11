<?php 
$path = __DIR__;
include_once("include/header.php");
// echo "<pre>";
// print_r($conn);
if (isset($_SESSION) && isset($_SESSION['patient_id'])) {
	echo "<script>window.location.href='./'</script>";
}
?>
<!-- /Header -->
<!-- ************************************************************************************************* -->
<!-- Page Content -->
<div class="account-page">
	<div class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-md-8 offset-md-2">

					<!-- Login Tab Content -->
					<div class="account-content">
						<div class="row align-items-center justify-content-center">
							<div class="col-md-7 col-lg-6 login-left">
								<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">
							</div>
							<div class="col-md-12 col-lg-6 login-right">
								<div class="login-header">
									<!-- <h3>Login <span>Doccure</span></h3> -->
								</div>
								<form action="" method="POST">
									<div class="form-group form-focus">
										<input type="email" class="form-control floating" name="email">
										<label class="focus-label">Email</label>
									</div>
									<div class="form-group form-focus">
										<input type="password" class="form-control floating" name="password">
										<label class="focus-label">Password</label>
									</div>
									<div class="text-right">
										<a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
									</div>
									<button class="btn btn-primary btn-block btn-lg login-btn" type="submit" name="submit">Login</button>
									<!-- <div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div>
											<div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
												</div>
												<div class="col-6">
													<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
												</div>
											</div> -->
									<div class="text-center dont-have">Don’t have an account? <a href="patient_register.php">Register</a></div>
								</form>
							</div>
						</div>
					</div>
					<!-- /Login Tab Content -->

				</div>
			</div>

		</div>

	</div>
</div>
<!-- /Page Content -->
<!-- ************************************************************************************************* -->
<!-- Page Content -->
<?php
if (isset($_POST["submit"])) {

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		//$con=mysql_connect('localhost','root','') or die(mysql_error());
		//mysql_select_db('user_registration') or die("cannot select DB");
		// $con= mysqli_connect("localhost","root","","hcm","3306");

		$query = $conn->query("SELECT * FROM patient_registration WHERE email= '$email'  AND password = '$password'");
		$numrows = mysqli_num_rows($query);
		if ($numrows != 0) {
			while ($row = mysqli_fetch_assoc($query)) {
				$dbemail = $row['email'];
				$dbpassword = $row['password'];
				$id = $row['id'];
				$name = $row['name'];
				$age = $row['age'];
			}
			if ($email == $dbemail && $password == $dbpassword) {
				$_SESSION['patient'] = $email;
				$_SESSION['patient_id'] = $id;
				$_SESSION['patient_name'] = $name;
				$_SESSION['patient_age'] = $age;
				$page;
				/* Redirect browser */
				if(isset($_SESSION['req_page'])){
					$page = $_SESSION['req_page'];
					unset($_SESSION['req_page']);
					echo "<script>window.location.href = '{$page}'</script>";
				}
				
				echo "<script>window.location.href = 'patient_dashboard.php'</script>";
			}
		} else {
			echo '<script>error("Invalid username or password!")</script>';
		}
		// echo "<script>window.location.href='login.php'</script>";

	} else {
		echo '<script>error("All fields are required!")</script>';
	}
}
?>

<!-- footer -->
<?php include_once("include/footer.php"); ?>