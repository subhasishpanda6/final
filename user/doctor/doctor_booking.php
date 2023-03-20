<?php 
session_start();
?>



<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/booking.html  30 Nov 2019 04:12:16 GMT -->
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
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
				
					<div class="row">
						<div class="col-12">
						<?php
require_once("../db.php");
$doc_id=$_GET['id'];
$_SESSION['doc_id']=$doc_id;
$row3=mysqli_query($conn,"select *from doctor_registration where id='$doc_id' ");
$row4=mysqli_fetch_assoc($row3);

                                    
?>
						
							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
										<a href="doctor-profile.html" class="booking-doc-img">
											<?php 
											if(!$row4['image'])
											echo "<img src='../../Doctor/profile_pic/".'no_profile.png'."' >";
											else	

											echo "<img src='../../Doctor/profile_pic/".$row4['image']."' >"; 

											?>
											
										</a>
										<div class="booking-info">
											<h4><a href="doctor-profile.html"><?php echo $row4["name"]; ?></a></h4>
											<p class="text-muted mb-0"><i class='fas fa-phone' ><?php echo $row4["department"]; ?></i></p>
											
											<p class="text-muted mb-0"><i class="fas fa-map-marker-alt"><?php echo $row4["city"]; ?></i></p>
										</div>
									</div>
								</div>
							</div>
							
							<!-- Schedule Widget -->

							<div class="card booking-schedule schedule-widget">
							
								<!-- Schedule Header -->
								<!--
								<div class="schedule-header">
									<div class="row">
										<div class="col-md-12">
										-->
											
											<!--
											<div class="day-slot">
												<ul>
													<li class="left-arrow">
														<a href="#">
															<i class="fa fa-chevron-left"></i>
														</a>
													</li>
													<li>
														<span>Mon</span>
														<span class="slot-date">11 Nov <small class="slot-year">2019</small></span>
													</li>
													<li>
														<span>Tue</span>
														<span class="slot-date">12 Nov <small class="slot-year">2019</small></span>
													</li>
													<li>
														<span>Wed</span>
														<span class="slot-date">13 Nov <small class="slot-year">2019</small></span>
													</li>
													<li>
														<span>Thu</span>
														<span class="slot-date">14 Nov <small class="slot-year">2019</small></span>
													</li>
													<li>
														<span>Fri</span>
														<span class="slot-date">15 Nov <small class="slot-year">2019</small></span>
													</li>
													<li>
														<span>Sat</span>
														<span class="slot-date">16 Nov <small class="slot-year">2019</small></span>
													</li>
													<li>
														<span>Sun</span>
														<span class="slot-date">17 Nov <small class="slot-year">2019</small></span>
													</li>
													<li class="right-arrow">
														<a href="#">
															<i class="fa fa-chevron-right"></i>
														</a>
													</li>
												</ul>
											</div>
											
											-->
											<!--
										</div>
									</div>
								</div>
							-->
								<!-- /Schedule Header -->
								
								<!-- Schedule Content -->
<?php
require_once("../db.php");
$patient_id=$_SESSION['patient_id'];
$row1=mysqli_query($conn,"select *from patient_registration where id='$patient_id' ");
$row2=mysqli_fetch_assoc($row1);

                                    
?>
								
								<div class="schedule-cont">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
						<div class="col-md-12">
							<div class="card">
								
								<div class="card-header">
									<h4 class="card-title">Appoinment Form</h4>
								</div>
								<div class="card-body">
									<form action="appoinment_booking.php" method="post">
										<h4 class="card-title">Patient Information</h4>
										<div class="row">
											<div class="col-md-6">
												
												
													<input type="hidden" class="form-control" name="doc_name" value="<?php echo $row4["name"]; ?>" readonly>

													<input type="hidden" class="form-control" name="doc_id" value="<?php echo $row4["id"]; ?>" readonly>
													<input type="hidden" class="form-control" name="patient_id" value="<?php echo $row2["id"]; ?>" readonly>
													<input type="hidden" class="form-control" name="patient_mail" value="<?php echo $row2["email"]; ?>" readonly>
													<input type="hidden" class="form-control" name="doc_mail" value="<?php echo $row4["email"]; ?>" readonly>
													<input type="hidden" class="form-control" name="doc_phno" value="<?php echo $row4["phone_no"]; ?>" readonly>
													<input type="hidden" class="form-control" name="doc_img" value="<?php echo $row4["image"]; ?>" readonly>
													<input type="hidden" class="form-control" name="patient_img" value="<?php echo $row4["image"]; ?>" readonly>
													<input type="hidden" class="form-control" name="doc_department" value="<?php echo $row4["department"]; ?>" readonly>
													<input type="hidden" class="form-control" name="doc_fees" value="<?php echo $row4["fees"]; ?>" readonly>


												
												<div class="form-group">
													<label>Patient Name</label>
													<input type="text" class="form-control" name="patient_name" value="<?php echo $row2["name"]; ?>" readonly>
												</div>
												<div class="form-group">
													<label> Patient Age</label>
													<input type="text" class="form-control" name="patient_age"value="<?php echo $row2["age"]; ?>" readonly>
												</div>
												<div class="form-group" >
													<label> Patient Blood Group</label>
													<select class="select" name="patient_blood_group" required>
														
														<option value="A+" >A+</option>
														<option value="O+" >O+</option>
														<option value="B+">B+</option>
														<option value="AB+">AB+</option>
														<option value="A-">A-</option>
														<option value="B-">B-</option>
														<option value="AB-">AB-</option>
														<option value="O-">O-</option>

													</select>
												</div>
												<div class="form-group">
													<label class="d-block"> Patient Gender:</label>
													<input type="text" class="form-control" name="patient_gender" value="<?php echo $row2["gender"]; ?>" readonly>
													
												</div>
												<div class="form-group">
													
													<label> Patient Medical Condition</label>
													<input type="text" class="form-control" name="medical_condition" required>
													
												</div>

											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label> Patient Phone No</label>
													<input type="text" class="form-control" name="patient_phoneno" value="<?php echo $row2["phone_no"]; ?>" readonly>
												</div>
												<div class="form-group">
													<label> Appoinment Date</label>
													<input type="date" class="form-control"  name="booking_date" required>
												</div>

												<div class="form-group">
													<label> Appoinment Time</label>
													<input type="time" class="form-control" name="booking_time" required>
												</div>
												
											</div>
										</div>

										
										<!--
										<h4 class="card-title">Postal Address</h4>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Address Line 1</label>
													<input type="text" class="form-control">
												</div>
												<div class="form-group">
													<label>Address Line 2</label>
													<input type="text" class="form-control">
												</div>
												<div class="form-group">
													<label>State</label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" class="form-control">
												</div>
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control">
												</div>
												<div class="form-group">
													<label>Postal Code</label>
													<input type="text" class="form-control">
												</div>
											</div>
										</div>
									-->
									<div class="text-right">
											<button type="submit" name="submit"  class="btn btn-primary">Submit</button>
										</div>
										
									</form>
									
								</div>
							</div>
						</div>
					</div>
										
											<!-- Time Slot -->
											<!--
											<div class="time-slot">
												<ul class="clearfix">
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing selected" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
													<li>
														<a class="timing" href="#">
															<span>9:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>10:00</span> <span>AM</span>
														</a>
														<a class="timing" href="#">
															<span>11:00</span> <span>AM</span>
														</a>
													</li>
												</ul>
											</div>
											
											-->
										</div>
									</div>
								</div>
								<!-- /Schedule Content -->
								
							</div>
							<!-- /Schedule Widget -->
							
							<!-- Submit Section -->
							<!--
							<div class="submit-section proceed-btn text-right">
								<a href="checkout.html" class="btn btn-primary submit-btn">Proceed to Pay</a>
							</div>
						-->
							<!-- /Submit Section -->
							
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
										<img src="assets/img/footer-logo.png" alt="logo">
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

<!-- doccure/booking.html  30 Nov 2019 04:12:16 GMT -->
</html>