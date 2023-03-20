<?php
session_start();

								
require_once("../db.php");
$id=$_GET["id"] ;
 $sql = $conn->prepare("SELECT * FROM appoinment_booking a,patient_registration p WHERE p.id=a.patient_id and a.id=$id  ");
 // $sql->bind_param("i",$_GET["id"]);      
  $sql->execute();
  $result = $sql->get_result();
  if ($result->num_rows > 0) {    
    $row = $result->fetch_assoc();
  }
  $conn->close();

?>		


<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/invoice-view.html  30 Nov 2019 04:12:19 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="../assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="../assets/css/style.css">
		
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
						<a href="index-2.html" class="navbar-brand logo">
							<img src="../assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index-2.html" class="menu-logo">
								<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="active">
								<a href="../index.php">Home</a>
							</li>
							<li class="has-submenu">
								<a href="../lab/index.php">Lab</a>
							</li>
							<li class="has-submenu">
								<a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
								
								<ul class="submenu">
									<li><a href="logout.php">Doctor </a></li>

								</ul>
							</li>	
							<li class="has-submenu">
								<a href="#">Patients <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<!--<li><a href="search.html">Search Doctor</a></li>-->

									<li><a href="../patient/patient_register.php">Patient Profile</a></li>
									
						<li><a href="../patient/index.php">Patient Login</a></li>
						            
								</ul>
							</li>
                                                      
							
							<li class="login-link">
								<a href="../patient/patient_register.php">Login / Signup</a>
							</li>
						</ul>		 
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header">9143560814</p>
							</div>
						</li>
						
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Invoice View</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Invoice View</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-lg-8 offset-lg-2">
							<div class="invoice-content">
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-6">
											<div class="invoice-logo">
												<img src="../assets/img/logo.png" alt="logo">
											</div>
										</div>
										<div class="col-md-6">
											<p class="invoice-details">
												
												<strong>Issued:</strong> <?php echo $row["patient_booking_time"]?>
											</p>
										</div>
									</div>
								</div>

						
								
								<!-- Invoice Item -->
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-6">
											<div class="invoice-info">
												<strong class="customer-text">Invoice From</strong>
												<p class="invoice-details invoice-details-two">
													Dr.<?php echo $row["doc_name"]?><br>
													Department:<?php echo $row["doc_department"]?><br>
													Phone: <?php echo $row["doc_phno"]?><br>
													Email: <?php echo $row["doc_mail"]?>
												</p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="invoice-info invoice-info2">
												<strong class="customer-text">Invoice To</strong>
												<p class="invoice-details">Name: <?php echo $row["patient_name"]?>
													 <br>Address: <?php echo $row["location"]?>
													 <br>
													 Pincode:<?php echo $row["pincode"]?>
													 <br>
												</p>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								<!-- Invoice Item -->
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-12">
											<div class="invoice-info">
												<strong class="customer-text">Payment Method</strong>
												<p class="invoice-details invoice-details-two">
													<?php echo $row["payment_mode"]?> <br>
													
												</p>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								<!-- Invoice Item -->
								<div class="invoice-item invoice-table-wrap">
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="invoice-table table table-bordered">
													<thead>
														<tr>
															<th>Description</th>
														
															<th class="text-right">Total</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															
															<td ><?php echo $row["medical_condition"]?></td>
															
														</tr>
														
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-md-6 col-xl-4 ml-auto">
											<div class="table-responsive">
												<table class="invoice-table-two table">
													<tbody>
													
													
													<tr>
														<th>Total Amount:</th>
														<td><span><?php echo $row["doc_fees"]?></span></td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								<!-- Invoice Information -->
								<div class="other-info">
									<h4>Information</h4>
									<p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
								</div>
								<!-- /Invoice Information -->
								
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="../assets/img/footer-logo.png" alt="logo">
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Patients</h2>
									<ul>
										<li><a href="search.html"><i class="fas fa-angle-double-right"></i> Search for Doctors</a></li>
										<li><a href="login.html"><i class="fas fa-angle-double-right"></i> Login</a></li>
										<li><a href="register.html"><i class="fas fa-angle-double-right"></i> Register</a></li>
										<li><a href="booking.html"><i class="fas fa-angle-double-right"></i> Booking</a></li>
										<li><a href="patient-dashboard.html"><i class="fas fa-angle-double-right"></i> Patient Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Doctors</h2>
									<ul>
										<li><a href="appointments.html"><i class="fas fa-angle-double-right"></i> Appointments</a></li>
										<li><a href="chat.html"><i class="fas fa-angle-double-right"></i> Chat</a></li>
										<li><a href="login.html"><i class="fas fa-angle-double-right"></i> Login</a></li>
										<li><a href="doctor-register.html"><i class="fas fa-angle-double-right"></i> Register</a></li>
										<li><a href="doctor-dashboard.html"><i class="fas fa-angle-double-right"></i> Doctor Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
											+1 315 369 5943
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											doccure@example.com
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0"><a href="templateshub.net">Templates Hub</a></p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.html">Terms and Conditions</a></li>
											<li><a href="privacy-policy.html">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="../assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="../assets/js/popper.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="../assets/js/script.js"></script>
		
	</body>

<!-- doccure/invoice-view.html  30 Nov 2019 04:12:20 GMT -->
</html>