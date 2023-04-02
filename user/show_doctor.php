<?php
// session_start();
// require_once("db.php");
// ----------------------------------------------------
$page = "show-doctor";
$path = __DIR__;
include_once("include/header.php");
// -----------------------------------
$patient_id = $_SESSION['patient_id'];
$row1 = mysqli_query($conn, "select *from patient_registration where id='$patient_id' ");
$row2 = mysqli_fetch_assoc($row1);
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
						<li class="breadcrumb-item active" aria-current="page">My Patients</li>
					</ol>
				</nav>
				<h2 class="breadcrumb-title">My Patients</h2>
			</div>
		</div>
	</div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
	<div class="container-fluid">

		<!-- <div class="row"> -->
			<!-- profile side bar stat -->

			<!-- /Profile Sidebar -->
			<?php
			//  require_once("db.php");

			$sql = "SELECT * FROM doctor_registration";
			$result = $conn->query($sql);
			$conn->close();
			?>


			<!-- <div class="col-md-12 col-lg-12 col-xl-12"> -->



				<div class="row row-grid">

					<?php
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) { ?>


							<div class="col-md-6 col-lg-4 col-xl-3">

								<div class="card widget-profile pat-widget-profile">

									<div class="card-body">


										<div class="pro-widget-content">
											<div class="profile-info-widget">
												<a href="patient-profile.html" class="booking-doc-img">
													<?php
													if (!$row['image'])
														echo "<img src='../Doctor/profile_pic/" . 'no_profile.png' . "' >";
													else

														echo "<img src='../Doctor/profile_pic/" . $row['image'] . "' >";

													?>
												</a>
												<div class="profile-det-info">
													<h3><a href="patient-profile.html"><?php echo $row["name"]; ?></a></h3>

													<div class="patient-details">
														<h5></h5>
														<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i><?php echo $row["city"]; ?></h5>
													</div>
												</div>
											</div>
										</div>
										<div class="Doctor-info">
											<ul>
												<li style="font-weight: bold;"><span><?php echo $row["department"]; ?></span></li>
												<li>Gender:<span> <?php echo $row["gender"]; ?></span></li>
												<li>Designation:<span><?php echo $row["education"]; ?></span></li>
											</ul>



										</div>
										<button type="submit" name="submit" style="position: relative;  border-radius: 50px; color: white; background-color:#20c0f3; border-color: transparent; width:200px;height:40px; font-weight: 400;">Book Appoinment</button>

									</div>
								</div>

							</div>
					<?php
						}
					}	?>


				</div>




			<!-- </div>

		</div> -->
	</div>
</div>


<!-- /Page Content -->
<?php include_once("include/footer.php");    ?>