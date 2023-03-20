<?php
session_start();
include_once("../app/db/db.php");
$res;
if(isset($_SESSION['patient_name'])){
	$get_patient_image = $conn->query("SELECT * FROM patient_registration WHERE id= {$_SESSION['patient_id']} ");
	$res = $get_patient_image->fetch_object();
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- doccure/  30 Nov 2019 04:11:34 GMT -->

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
	<title>Doccure</title>

	<!-- Favicons -->
	<link type="image/x-icon" href="assets/img/favicon.png" rel="icon" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css" />
	<link rel="stylesheet" href="../app/vendor/css/response.css" />
	<script src="../app/vendor/js/response.js"></script>
	

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
	  
    <![endif]-->

</head>

<body>
	<!-- Main Wrapper -->
	
	<div class="main-wrapper">
		<!-- Header -->
		<header class="header">
			<nav class="navbar navbar-expand-lg header-nav">
				<div class="navbar-header">
					<a id="mobile_btn" href="javascript:void(0);">
						<span class="bar-icon">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</a>
					<a href="./" class="navbar-brand logo">
						<img src="assets/img/logo.png" class="img-fluid" alt="Logo" />
					</a>
				</div>
				<div class="main-menu-wrapper">
					<div class="menu-header">
						<a href="./" class="menu-logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo" />
						</a>
						<!-- ************** -->
						<div class="user-header mobile-user-menu">
							<div class="avatar avatar-sm">
								<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<h6><?php if(isset($_SESSION['patient_name'])){
									echo ucfirst($_SESSION['patient_name']);
								}?></h6>
								<p class="text-muted mb-0">Patient</p>
							</div>
						</div>
						<!-- ************** -->

						<a id="menu_close" class="menu-close" href="javascript:void(0);">
							<i class="fas fa-times"></i>
						</a>
					</div>
					<ul class="main-nav">
						<li class="<?php if (isset($page) && $page === 'home') {
										echo "active";
									} ?>">
							<a href="./">Home</a>
						</li>
						<li class="has-submenu">
							<a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
							<ul class="submenu">
								<li><a href="../doctor/index.php">Doctor </a></li>

							</ul>
						</li>
						<li class="has-submenu">
							<a href="#">Patients <i class="fas fa-chevron-down"></i></a>
							<ul class="submenu">
								<!--<li><a href="search.html">Search Doctor</a></li>-->

								<li><a href="patient_register.php">Patient Profile</a></li>

								<li><a href="login.php">Patient Login</a></li>

							</ul>
						</li>

						<li>
							<a href="admin/index.html" target="_blank">Admin</a>
						</li>
						<li class="<?php if (isset($page) && $page === 'blood_bank') {
										echo "active";
									} ?>">
							<a href="blood_bank.php">Blood Bank</a>
						</li>

					</ul>
				</div>
				<ul class="nav header-navbar-rht">
					<?php if (isset($_SESSION) && isset($_SESSION['patient_id'])) { ?>
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<span class="mr-3 user-name"><?php echo "Welcome " . ucfirst($_SESSION['patient_name']); ?></span><img class="rounded-circle" src='<?php if($res->image){ echo "profile_pic/$res->image";}else{"profile_pic/no_profile.png";} ?>' width="31" alt="<?php echo  ucfirst($_SESSION['patient_name']); ?>">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="patient_dashboard.php">Dashboard</a>
								<a class="dropdown-item" href="profile-settings.html">Profile Settings</a>
								<a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link header-login" href="login.php">login / Signup </a>
						</li>
					<?php } ?>
					<!-- /User Menu -->
				</ul>
			</nav>
		</header>
		<!-- /Header -->