<?php
// session_start();
// require_once("../db.php");
function doctorLocation()
{
	$path = __DIR__;
	$startPoint = strpos($path, "\doctor");
	$endPoint = intval($startPoint) + 1;
	return substr($path, 0, $endPoint);
}

// ---------------------------------
// $page = "show-doctor";
$path = __DIR__;
include_once(doctorLocation() . "include\header.php");

$patient_id = $_SESSION['patient_id'];
$row1 = mysqli_query($conn, "select *from patient_registration where id='$patient_id' ");
$row2 = mysqli_fetch_assoc($row1);


?>

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

		<div class="row">
			<?php include_once(doctorLocation() . "include\profile_sidebar.php"); ?>
			<!-- /Profile Sidebar -->
			<?php
			// require_once("../db.php");

			$sql = "SELECT * FROM doctor_registration where status='active'";
			$result = $conn->query($sql);
			$conn->close();
			?>


			<div class="col-md-7 col-lg-8 col-xl-9">



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
														echo "<img src='../../Doctor/profile_pic/" . 'no_profile.png' . "' >";
													else

														echo "<img src='../../Doctor/profile_pic/" . $row['image'] . "' >";

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

										<a href="doctor_booking.php?id=<?php echo $row["id"]; ?>" class="btn btn-success">Book Appoinment</a>
									</div>
								</div>

							</div>
					<?php
						}
					}	?>


				</div>




			</div>


			<!-- /Page Content -->

			<?php include(doctorLocation() . "include\\footer.php"); ?>