<?php 
// session_start();
// require_once("db.php");
$path = __DIR__;
include("include/header.php");
$patient_id=$_SESSION['patient_id'];
$row1=mysqli_query($conn,"select *from patient_registration where id='$patient_id' ");
$row2=mysqli_fetch_assoc($row1);

                                    
?>




			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
					
						<!-- Profile Sidebar -->
					<?php include_once("include/profile_sidebar.php"); ?>
						<!-- /Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
								
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<?php 
											if(!$row2['image'])
											echo "<img src='profile_pic/".'no_profile.png'."' >";
											else	

											echo "<img src='profile_pic/".$row2['image']."' >"; 

											?>
														</div>
													<form action="add_profile.php " method="post" enctype="multipart/form-data">
														<div class="upload-img" >

															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" class="upload" name="image">
															</div>
															<button type="submit" name="upload" style="position: relative;  border-radius: 50px; color: white; background-color:#20c0f3; width:150px ;padding: 10px 2px;text-align: center;font-size: 13px; height:35px;
                                                            font-weight: 550;cursor: pointer; box-sizing: border-box; border-color: transparent; margin-top: 5px;">Submit</button>
															
														</div>
													</form>

													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Name</label>
													<input type="text" class="form-control"  value="<?php echo $row2["name"]?>" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email</label>
													<input type="text" class="form-control" value="<?php echo $row2["email"]?>" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Gender</label>
													
														<input type="text" class="form-control" value="<?php echo $row2["gender"]?>" readonly>
													</div>
												</div>
											
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Age</label>
													<input type="text" class="form-control" value="<?php echo $row2["age"]?>" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Location</label>
													<input type="text" class="form-control" value="<?php echo $row2["location"]?>"readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Pincode</label>
													<input type="text" value="<?php echo $row2["pincode"]?>" class="form-control" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Phone No</label>
													<input type="text" value="<?php echo $row2["phone_no"]?>" class="form-control" readonly>
												</div>
											</div>
											
										<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Password</label>
													<input type="text" class="form-control" value="<?php echo $row2["password"]?>" readonly>
												</div>
											</div>
										</div>
										
											<!--
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>State</label>
													<input type="text" class="form-control" value="Newyork" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Zip Code</label>
													<input type="text" class="form-control" value="13420" readonly>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" class="form-control" value="United States" readonly>
												</div>
											</div>
										</div>
									-->
				<!--						
			<form action="add_phoneno.php" method="POST">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Change Phone Number</h4>
									<div class="registrations-info">
										<div class="row form-row reg-cont">
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Phone No</label>
													
													<input type="text" class="form-control" name="">

													<input type="submit" name="submit3" value="Add" style="position: relative;  border-radius: 10px; color: white; background-color:#09e5ab; width:150px ;padding: 7px 30px;text-align: center;font-size:17px;  font-weight:600;cursor: pointer; box-sizing: border-box; border-color: transparent; position: relative; top:20px;" >
														
												</div> 
											</div>
											
										</div>
									</div>
							
						</div>
					</div>

			</form>
		-->
								<form action="patient_change_info.php" method="post">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title"> Change Information</h4>
									<div class="registrations-info">
										<div class="row form-row reg-cont">
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Age</label>
													<input type="text" class="form-control" name="change_age" value="<?php echo $row2["age"]?>">
												</div> 
												<div class="form-group">
													<label>Location</label>
													<input type="text" class="form-control" name="change_location" value="<?php echo $row2["location"]?>">
												</div> 

												<div class="form-group">
													<label>Phone no</label>
													<input type="text" class="form-control" name="change_phone_no" value="<?php echo $row2["phone_no"]?>">
												</div>
											</div>
											
											
										</div>
									</div>
									
                                    
								
							<div class="submit-section submit-btn-bottom">
								<button  type="submit" class="btn btn-primary submit-btn" name="submit2">Save Changes</button>
							</div>
							
						</div>
					</div>
							
								</form>

			<form action="patient_change_password.php" method="post">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Change Password</h4>
									<div class="registrations-info">
										<div class="row form-row reg-cont">
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>New Password</label>
													<input type="text" class="form-control" name="change_password" value="<?php echo $row2["password"]?>">
												</div> 
											</div>
											</div>
				                            </div>
				                            <div class="submit-section submit-btn-bottom">
								<button  type="submit" class="btn btn-primary submit-btn" name="submit1">Save Changes</button>
							</div>
								</form>
							
                       
							
						</div>
					</div>

				</div>

			</div>
			
							
						</div>
					</div>
				</div>
			</div>
	
			<!-- /Page Content -->
   
			<!-- Footer -->
			<?php include_once("include/footer.php"); ?>
			