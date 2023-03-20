

           
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
											<h3>Login <span>To Dashboard</span></h3>
										</div>

										<form action=" " method="post">
											<div class="form-group form-focus">
												<input type="email" class="form-control floating" name="email">
												<label class="focus-label"> Your Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating" name="password">
												<label class="focus-label"> Your Password</label>
											</div>
										
											
										
											<div class="form-group sign-in-btn">
									<input type="submit" class="submit"  name="submit">
								</div>
											
									
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
		


            	<!-- Popular Section -->
			<section class="section section-doctor">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-lg-4">
							<div class="section-header ">
								<h2>Book Our Doctor</h2>
								<p>Top Doctors Available 24X7 For You</p>
							</div>
							<div class="about-content">
								<p>Our clinic web portal can provide more than just a phone number for patients to call in order to schedule an appointment with a doctor. You can also set up a chat and/or video call with the doctor on a regular basis. This will reduce the need for at least some personal visits and improve the experience for busy patients.</p>

											
								<a href="patient/register.php">Book An Appoinment.</a>
							</div>
						</div>
						<?php 
                         require_once("db.php");

                         $sql = "SELECT * FROM doctor_registration";
                         $result = $conn->query($sql); 
                          $conn->close();   
                            ?>
						<div class="col-lg-8">
							<div class="doctor-slider slider">
								<?php
        						if ($result->num_rows > 0) {    
         					 while($row = $result->fetch_assoc()) {?>
							
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">

										<a href="#">
											<!--
											<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-01.jpg">
										-->

										<?php if(!$row['image'])
											echo "<img class='ppp' src='Doctor/profile_pic/".'no_profile.png'."'  height='200px' >";
											else	 echo "<img class='ppp' src='../Doctor/profile_pic/".$row["image"]."'  height='200px' >"; ?> 
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									

									<div class="pro-content">
										</div>
									

										<h4 class="title">
											<i class="fas fa-check-circle verified"></i>
											<a href="doctor-profile.html"><?php echo $row["name"]; ?></a> 
											
										</h4>
										<p class="speciality"><?php echo $row["department"]; ?></p>
										
										<ul class="available-info">
											<li>
												<i class="far fa-money-bill-alt"><?php echo $row["fees"]; ?></i>
											</li>
											<li>
												<i class="far fa-clock"></i><?php echo $row["phone_no"]; ?>
											</li>
											<li>
												<i class="fas fa-map-marker-alt"><?php echo $row["city"]; ?></i> 
												
											</li>   
										</ul>
										<!--
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
										-->
											<div class="col-6">
												<a href="patient/patient_register.php" class="btn book-btn">Book Now</a>
											</div>
											 
										</div>
									</div>
									<?php 
						}
					}?>
								</div>
								<!-- /Doctor Widget -->
						
								<!--
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-02.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Darren Elder</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(35)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Newyork, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $50 - $300 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								-->
						
								<!--
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-03.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Deborah Angel</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MBBS, MD - General Medicine, DNB - Cardiology</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(27)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Georgia, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $100 - $400 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
							-->
								<!-- /Doctor Widget -->
						
								<!-- Doctor Widget -->
								<!--
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-04.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Sofia Brient</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MBBS, MS - General Surgery, MCh - Urology</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(4)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Louisiana, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $150 - $250 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
							-->
								<!-- /Doctor Widget -->
								
								<!-- Doctor Widget -->
								<!--
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-05.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Marvin Campbell</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MBBS, MD - Ophthalmology, DNB - Ophthalmology</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(66)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Michigan, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $50 - $700 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
							-->
								<!-- /Doctor Widget -->
								
								<!-- Doctor Widget -->
								<!--
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-06.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Katharine Berthold</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MS - Orthopaedics, MBBS, M.Ch - Orthopaedics</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(52)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Texas, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $100 - $500 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
							-->
								<!-- /Doctor Widget -->
								
								<!-- Doctor Widget -->
								<!--
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-07.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Linda Tobin</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MBBS, MD - General Medicine, DM - Neurology</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(43)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> Kansas, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $100 - $1000 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
							-->
								<!-- /Doctor Widget -->
								
								<!-- Doctor Widget -->
								<!--
								<div class="profile-widget">
									<div class="doc-img">
										<a href="doctor-profile.html">
											<img class="img-fluid" alt="User Image" src="assets/img/doctors/doctor-08.jpg">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="doctor-profile.html">Paul Richard</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">MBBS, MD - Dermatology , Venereology & Lepros</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star"></i>
											<span class="d-inline-block average-rating">(49)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="fas fa-map-marker-alt"></i> California, USA
											</li>
											<li>
												<i class="far fa-clock"></i> Available on Fri, 22 Mar
											</li>
											<li>
												<i class="far fa-money-bill-alt"></i> $100 - $400 
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="doctor-profile.html" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="booking.html" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
							-->
								<!-- Doctor Widget -->
								
							</div>
							
						</div>
						
					</div>
					
				   </div>
				</div>
			</section>
			<!-- /Popular Section -->

            <!-- ++++++++++++++++++++++++++++++++++++++++ -->
            <style>


<style>

.header {
  overflow:hidden;
  background-color: #333;
  top: 0;
  width:100%;
  padding: 10px 5px;
  color:#FF0404  ;
}

/* Style the header links */
.header a {
  float: left;
  color: white;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
  font-weight:bold;
}

/* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
.header a.logo {
  font-size: 25px;
  font-weight: bold;
  color:#FF0404  ;
}

/* Change the background color on mouse-over */
.header a:hover {
  background-color: #ddd;
  color: black;
}




/* Float the link section to the right */
.header-right {
  float: right;
}

/* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}
/* Style the active/current link*/
a.act{
background: linear-gradient(to right, #fd746c 0%, #ff9068 100%);
color: white;
border-radius:30px;
}
a.logo2{
  background-color: #333;
}
            </style>
           






