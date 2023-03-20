<?php
	session_start();
?>


<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/checkout.html  30 Nov 2019 04:12:16 GMT -->
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
									<li class="breadcrumb-item active" aria-current="page">Checkout</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Checkout</h2>
							
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
								<?php
								
require_once("../db.php");
$patient_id=$_SESSION['patient_id'];
$lab_id=$_GET['lab_id'];
$row1=mysqli_query($conn,"select *from patient_registration where id='$patient_id'  ");
$row2=mysqli_fetch_assoc($row1);

$row3=mysqli_query($conn,"select l.lab_name,l.email,l.address,l.city,l.pincode,l.phone_no ,t.id,t.test_name,t.price from lab_registration l ,lab_test t where l.lab_id=t.lab_id ");
$row4=mysqli_fetch_assoc($row3);


?>
									<!-- Checkout Form -->
									
									
										<!-- Personal Information -->
										<div class="info-widget">
											<h4 class="card-title">Personal Information</h4>
											<div class="row">
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Patient Name</label>
														<input class="form-control" type="text" value="<?php echo $row2["name"]; ?>">
													</div>
												</div>
												
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Email</label>
														<input class="form-control" type="email" value="<?php echo $row2["email"]; ?>">
													</div>
												</div>
												<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Phone no</label>
														<input class="form-control" type="text" value="<?php echo $row2["phone_no"]; ?>">
													</div>
												</div>
											</div>
											<!--
											<div class="exist-customer">Existing Customer? <a href="#">Click here to login</a></div>
										-->
										</div>
										<!-- /Personal Information -->
										
										<div class="payment-widget">
											<h4 class="card-title">Booking Details</h4>

											<?php
											if(!empty($_SESSION["cart_item"])){
$item_total = 0;
$book=" ";

?>
											
											<!-- Credit Card Payment -->
											<div class="payment-list">
												<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Lab Name</strong></th>
<th><strong>Name</strong></th>

<th><strong>Price</strong></th>

</tr>

												<?php foreach ($_SESSION["cart_item"] as $item){?>
                                        
<tr>

<td><strong><?php echo $item["lab_name"]; ?></strong></td>
<td><strong><?php echo $item["test_name"]; ?></strong></td>

<td><?php echo $item["price"]; ?></td>

</tr>
											
												<?php
												
												$book.=("["."<b>Lab name:</b>".$item["lab_name"]." <b>Test Name:</b> ". $item["test_name"]."]"."<br>");
$item_total += ($item["price"]);
}
}
?>
</tbody>
</table>
</div>
<br>
												<form action="lab_paymentmode.php" method="post">
												<div class="row">
													<div class="col-md-6">
														
                                                   
                                                   <h4 class="card-title">Payment Mode</h4></div>

                                                <input type="hidden" name="lab_id" value=" <?php echo $lab_id; ?>">  	
                                                <input type="hidden" name="patient_name" value=" <?php echo $row2["name"]; ?>">
                                                <input type="hidden" name="patient_id" value=" <?php echo $row2["id"]; ?>">
                                                 <input type="hidden" name="patient_email" value=" <?php echo $row2["email"]; ?>">
                                                 <input type="hidden" name="patient_phno" value=" <?php echo $row2["phone_no"]; ?>">
                                                   <input type="hidden" name="patient_address" value=" <?php echo $row2["location"]; ?>">
                                                   <input type="hidden" name="book" value=" <?php echo $book ?>">


                                           
                                            <div class="col-md-6">
														<select name="payment_mode">
												
                                                  <option value="online">Online</option>
                                                  <option value="offline">Offline</option>
                                                     </select>

													</div>
												
											</div>
											
													
													<div class="form-group card-label">
															<label for="card_name">Total Amount</label>
															<input class="form-control" name="total" type="text" value="<?php echo $item_total ?>">
														</div>	
                                                   
													
													
													
											
											
									<!-- Submit Section -->
											<div class="col-md-6">
												<button type="submit" name="submit" class="btn btn-primary submit-btn">Confirm</button>
											</div>
											</form>
										</div>
											<!-- /Submit Section -->
											
										</div>
									</form>
									<!-- /Checkout Form -->
									
								</div>
							</div>
							
						</div>
						<!--
						<div class="col-md-5 col-lg-4 theiaStickySidebar">
						
							
								
									Booking Doctor Info 
									<div class="booking-doc-info">
										<a href="#" class="booking-doc-img">
											
											<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
										
										<?php 
											/*if(!$row4['image'])
											echo "<img src='../../Doctor/profile_pic/".'no_profile.png'."' >";
											else	

											echo "<img src='../../Doctor/profile_pic/".$row4['image']."' >"; 
											*/

											?>
												<?//php foreach ($_SESSION["cart_item"] as $item){?>

										</a>
										<div class="booking-info">
											<h4></h4>
											
											<div class="clinic-details">
												<p class="doc-location"><i class="fas fa-map-marker-alt"></i> &nbsp <?//php echo  $row4["address"];?> </p>
											</div>
										</div>
									</div>
									 Booking Doctor Info 
								
									<div class="booking-summary">
										<div class="booking-item-wrap">
											<ul class="booking-date">

												<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Lab Name</strong></th>
<th><strong>Name</strong></th>

<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>

                                        
<tr>
<td><strong><?//php echo $item["lab_name"]; ?></strong></td>
<td><strong><?//php echo $item["test_name"]; ?></strong></td>

<td><?//php echo $item["price"]; ?></td>
<td><a href="test_action.php?action=remove&id=<?//php echo $item["id"]; ?>" class="btnRemoveAction">Remove </a></td>
</tr>
</t
											
												<?//php
//$item_total += ($item["price"]);
}
}
?>
											</ul>
										
											<ul class="booking-fee">
												<li>Total Amount  <span><?//php echo $row4["doc_fees"];?></span></li>
												
											</ul>
											<div class="booking-total">
												<ul class="booking-total-list">
												
												</ul>
											
											</div>
										</div>
									</div>
								</div>
							</div>
-->
							<!-- /Booking Summary -->
							
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->

			<!-- Footer -->

		
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

<!-- doccure/checkout.html  30 Nov 2019 04:12:16 GMT -->
</html>