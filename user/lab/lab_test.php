<?php 
session_start();
require_once("../db.php");
$patient_id=$_SESSION['patient_id'];
$row1=mysqli_query($conn,"select *from patient_registration where id='$patient_id' ");
$row2=mysqli_fetch_assoc($row1);

                                    
?>


<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/my-patients.html  30 Nov 2019 04:12:09 GMT -->
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


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

			
	
	</head>

	<body>

<div class="container">
	<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">My Cart</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
       <?php 
      include("cart.php");
      ?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

           <a href="lab_checkout.php?lab_id=<?php echo $_GET['lab_id']; ?>"   class="btn btn-danger"> Checkout</a>
          
        </div>
        
      </div>
    </div>
  </div>

</div>


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
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
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
								<a href="lab_dashboard.php">Lab</a>
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
									<li class="breadcrumb-item active" aria-current="page">My Patients</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">My Patients</h2>
							<button style="position: absolute;bottom: 8px;right: 16px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 								View Cart
							</button>

							


						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->



			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<?php 
											if(!$row2['image'])
											echo "<img src='../../profile_pic/".'no_profile.png'."' >";
											else	

											echo "<img src='../../profile_pic/".$row2['image']."' >"; 

											?>
										</a>
										<div class="profile-det-info">
								<h3> <?=$_SESSION['patient_name'];?></h3>
											
											<div class="patient-details">
												<h5 class="mb-0"><?=$_SESSION['patient'];?></h5>
											</div>
											<div class="patient-details">
												<h5>Age:<?=$_SESSION['patient_age'];?></h5>
										</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li>
												<a href="../patient_dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<!--
											<li>
												<a href="appointments.html">
													<i class="fas fa-calendar-check"></i>
													<span>Appointments</span>
												</a>
											</li>
											<li class="active">
												<a href="my-patients.html">
													<i class="fas fa-user-injured"></i>
													<span>My Patients</span>
												</a>
											</li>
											<li>
												<a href="schedule-timings.html">
													<i class="fas fa-hourglass-start"></i>
													<span>Schedule Timings</span>
												</a>
											</li>
											<li>
												<a href="invoices.html">
													<i class="fas fa-file-invoice"></i>
													<span>Invoices</span>
												</a>
											</li>
											<li>
												<a href="reviews.html">
													<i class="fas fa-star"></i>
													<span>Reviews</span>
												</a>
											</li>
											<li>
												<a href="chat-doctor.html">
													<i class="fas fa-comments"></i>
													<span>Message</span>
													<small class="unread-msg">23</small>
												</a>
											</li>
										-->
											<li>
												<a href="doctor-profile-settings.html">
													<i class="fas fa-user-cog"></i>
													<span> Patient Profile </span>
												</a>
											</li>
											<!--
											<li>
												<a href="social-media.html">
													<i class="fas fa-share-alt"></i>
													<span>Social Media</span>
												</a>
											</li>
											<li>
												<a href="doctor-change-password.html">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
										-->
											<li>
												<a href="index-2.html">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
							</div>
							<!-- /Profile Sidebar -->
							<?php
require_once("../db.php");
$lab_id=$_GET['lab_id'];
//$_SESSION['lab_id']=$lab_id;
//$row3=mysqli_query($conn,"select *from lab_test where lab_id='$lab_id' ");
//$row4=mysqli_fetch_assoc($row3);
   $sql = "select *from lab_test where lab_id='$lab_id'";
     $result = $conn->query($sql); 
                                    
?>
							
						
						<div class="col-md-7 col-lg-8 col-xl-9">
						
						

							<div class="row row-grid">

                            <?php

                           
        						if ($result->num_rows > 0) {    
         					 while($row = $result->fetch_assoc()) {?>


								<div class="col-md-6 col-lg-4 col-xl-3">

									<div class="card widget-profile pat-widget-profile" style="background-color:whitesmoke; border-radius: 12px; border-color:transparent; box-shadow: 5px 10px 8px #888888;">
<form method="post" action="test_action.php?action=add&id=<?php echo $row['id']; ?>">
										
										<div class="card-body">

								
											<div class="pro-widget-content" >
												<div class="profile-info-widget">
													<a href="patient-profile.html" class="booking-doc-img">
														<img src="../../lab/profile_pic/LOGO.svg" style="height: 40px; width:40px; "alt="">
													</a>
													<div class="profile-det-info">
														<h3 style="color:#10847e;"><?php echo $row["test_name"]; ?></h3>
														
														<div class="patient-details">
															
															<h5 class="mb-0"><span>&#8377;</span><?php echo $row["price"]; ?><span style="color: #8897a2;">&nbsp;onwards</span></h5>
														</div>
													</div>
												</div>
											</div>
											
						
                             <input type="submit" value="Add To Cart" style="margin-left: 40px;"  class="btn btn-warning">										
                   </div>
									</div>
									
								</div>
							</form>
                              <?php		
										}
										}	?>


							</div>


							

						</div>
						

								
								<!--
									style="position: relative;  border-radius: 50px; color: white; background-color:#20c0f3; border-color: transparent; width:200px;height:40px; font-weight: 400;"

									<button type="submit" name="submit" onclick="window.location.href='doctor_booking.php'"; >Book Appoinment</button>


								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="patient-profile.html" class="booking-doc-img">
														<img src="assets/img/patients/patient1.jpg" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3><a href="patient-profile.html">Charlene Reed</a></h3>
														
														<div class="patient-details">
															<h5><b>Patient ID :</b> P0001</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> North Carolina, USA</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>+1 828 632 9170</span></li>
													<li>Age <span>29 Years, Female</span></li>
													<li>Blood Group <span>O+</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="#" class="booking-doc-img">
														<img src="assets/img/patients/patient2.jpg" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3>Travis Trimble </h3>
														<div class="patient-details">
															<h5><b>Patient ID :</b> PT0002</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Maine, USA</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>+1 207 729 9974</span></li>
													<li>Age <span>23 Years, Male</span></li>
													<li>Blood Group <span>B+</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="#" class="booking-doc-img">
														<img src="assets/img/patients/patient3.jpg" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3>Carl Kelly</h3>
														<div class="patient-details">
															<h5><b>Patient ID :</b> PT0003</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Indiana, USA</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>+1 260 724 7769</span></li>
													<li>Age <span>32 Years, Male</span></li>
													<li>Blood Group <span>A+</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="#" class="booking-doc-img">
														<img src="assets/img/patients/patient4.jpg" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3>Michelle Fairfax</h3>
														<div class="patient-details">
															<h5><b>Patient ID :</b> PT0004</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Indiana, USA</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>+1 504 368 6874</span></li>
													<li>Age <span>25 Years, Female</span></li>
													<li>Blood Group <span>B+</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="#" class="booking-doc-img">
														<img src="assets/img/patients/patient5.jpg" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3>Gina Moore</h3>
														<div class="patient-details">
															<h5><b>Patient ID :</b> PT0005</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Florida, USA</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>+1 954 820 7887</span></li>
													<li>Age <span>25 Years, Female</span></li>
													<li>Blood Group <span>AB-</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="#" class="booking-doc-img">
														<img src="assets/img/patients/patient6.jpg" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3>Elsie Gilley</h3>
														<div class="patient-details">
															<h5><b>Patient ID :</b> PT0006</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Kentucky, USA</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>+1 315 384 4562</span></li>
													<li>Age <span>14 Years, Female</span></li>
													<li>Blood Group <span>O-</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="#" class="booking-doc-img">
														<img src="assets/img/patients/patient7.jpg" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3>Joan Gardner</h3>
														<div class="patient-details">
															<h5><b>Patient ID :</b> PT0007</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> California, USA</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>+1 707 2202 603</span></li>
													<li>Age <span>25 Years, Female</span></li>
													<li>Blood Group <span>A-</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="#" class="booking-doc-img">
														<img src="assets/img/patients/patient8.jpg" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3>Daniel Griffing</h3>
														<div class="patient-details">
															<h5><b>Patient ID :</b> PT0007</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> New Jersey, USA</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>+1 973 773 9497</span></li>
													<li>Age <span>28 Years, Male</span></li>
													<li>Blood Group <span>O+</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="#" class="booking-doc-img">
														<img src="assets/img/patients/patient9.jpg" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3>Walter Roberson</h3>
														<div class="patient-details">
															<h5><b>Patient ID :</b> PT0009</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Florida, USA</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>+1 850 358 4445</span></li>
													<li>Age <span>28 Years, Male</span></li>
													<li>Blood Group <span>A+</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="#" class="booking-doc-img">
														<img src="assets/img/patients/patient10.jpg" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3>Robert Rhodes</h3>
														<div class="patient-details">
															<h5><b>Patient ID :</b> PT0010</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> California, USA</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>+1 858 259 5285</span></li>
													<li>Age <span>19 Years, Male</span></li>
													<li>Blood Group <span>B+</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="#" class="booking-doc-img">
														<img src="assets/img/patients/patient11.jpg" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3>Harry Williams</h3>
														<div class="patient-details">
															<h5><b>Patient ID :</b> PT0011</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Colorado, USA</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<ul>
													<li>Phone <span>+1 303 607 7075</span></li>
													<li>Age <span>9 Years, Male</span></li>
													<li>Blood Group <span>A-</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								-->
								<!--
							</div>

						</div>
					</div>

				</div>

			</div>
			-->		
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
		
		<!-- Sticky Sidebar JS -->
        <script src="../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="../assets/js/script.js"></script>
		
	</body>

<!-- doccure/my-patients.html  30 Nov 2019 04:12:09 GMT -->
</html>