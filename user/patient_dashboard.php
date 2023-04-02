<?php
// session_start();
$path = __DIR__;
include_once("include/header.php");
if (!isset($_SESSION['patient_name'])) {
	echo "<script>window.location.href = './'</script>";
}
// require_once("db.php");
$patient_id = $_SESSION['patient_id'];

$row3 = mysqli_query($conn, "select  a.id,a.doc_name,a.booking_date,a.booking_time,a.doc_fees,a.doc_phno,d.payment_details,d.status,a.doc_img ,d.department,a.patient_status from appoinment_booking a, doctor_registration d  where  a.doc_id=d.id AND patient_id='$patient_id'");
$row4 = mysqli_num_rows($row3);

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
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
						<h2 class="breadcrumb-title">Dashboard</h2>
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
					<?php include_once("include/profile_sidebar.php") ?>
					<!-- / Profile Sidebar -->
					<div class="col-md-7 col-lg-8 col-xl-9">
						<div class="card">
							<div class="card-body pt-0">
								<!-- Tab Menu -->
								<nav class="user-tabs mb-4">
									<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
										<li class="nav-item">
											<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Doctor Appointments</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Lab Test</a>
										</li>
									</ul>
								</nav>
								<!-- /Tab Menu -->
								<!-- Tab Content -->
								<div class="tab-content pt-0">
									<!-- Appointment Tab -->
									<div id="pat_appointments" class="tab-pane fade show active">
										<div class="card card-table mb-0">
											<div class="card-body">
												<div class="table-responsive">
													<table class="table table-hover table-center mb-0">
														<thead>
															<tr>
																<th>Doctor</th>
																<th>Appt Date</th>
																<th>Appt Time</th>
																<th>Fees</th>
																<th>Doctor Phone no</th>
																<th>Payment Details</th>
																<th>Status</th>
																<th>Bill</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php
															if ($row3->num_rows > 0) {
																while ($row4 = $row3->fetch_assoc()) { ?>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																					<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
																				</a>
																				<a href="doctor-profile.html"><?php echo $row4["doc_name"]; ?> <span><?php echo $row4["department"]; ?></span></a>
																			</h2>
																		</td>
																		<td><?php echo $row4["booking_date"]; ?></td>
																		<td><?php echo $row4["booking_time"]; ?></td>
																		<td><?php echo $row4["doc_fees"]; ?></td>
																		<td><?php echo $row4["doc_phno"]; ?></td>
																		<td><?php echo $row4["payment_details"]; ?></td>
																		<td>
																			<?php
																			if ($row4["patient_status"] == "done" || $row4["patient_status"] == "accept")


																				echo "<span class='badge badge-pill bg-success-light'>" . $row4["patient_status"] . " </span>";

																			if ($row4["patient_status"] == "reject")
																				echo "<span class='badge badge-pill bg-danger-light'>" . $row4["patient_status"] . " </span>";

																			?>
																		</td>
																		<td>
																			<?php if ($row4["patient_status"] == "done") { ?>
																				<a href="doctor/bill.php?id=<?php echo $row4["id"]; ?>" class="btn btn-success">Bill</a>
																			<?php } else {
																				echo "INVOICE UPDATE";
																			} ?>
																		</td>
																		<td class="text-right">
																			<!--
                                                         <div class="table-action">
                                                         	<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                                                         		<i class="fas fa-print"></i> Print
                                                         	</a>
                                                         	badge badge-pill bg-danger-light
                                                         -->
																			<a href="doctor/doctor_fees_update.php?id=<?php echo $row4["id"]; ?>" class="btn btn-success">UPDATE</a>
																			<!--<a href="" class="btn btn-sm bg-info-light">
                                                         <i class="far fa-eye"></i> Update
                                                         </a>
                                                         -->
												</div>
												</td>
												</tr>
										<?php
																}
															}	?>
										</tbody>
										</table>
											</div>
										</div>
									</div>
								</div>
								<!-- /Appointment Tab -->
								<?php
								require_once("../db.php");
								$patient_id = $_SESSION['patient_id'];
								$row5 = mysqli_query($conn, "SELECT * from lab_booking WHERE patient_id='$patient_id'");
								// print_r($row5);
								// $row6 = mysqli_num_rows($row5);
								// echo $patient_id;

								?>
								<!-- Prescription Tab -->
								<div class="tab-pane fade" id="pat_prescriptions">
									<div class="card card-table mb-0">
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-hover table-center mb-0">
													<thead>
														<tr>
															<th>Lab Name & Test Name</th>
															<th>Booking Date</th>
															<th>Fees</th>
														</tr>
													</thead>
													<tbody>
														<?php
														if ($conn->affected_rows > 0) {
															while ($row6 = $row5->fetch_assoc()) { ?>
																<tr>
																	<td><?php echo $row6["booking"]; ?></td>
																	<td><?php echo $row6["booking_date"]; ?></td>
																	<td><?php echo $row6["total"]; ?></td>
																</tr>
														<?php
															}
														}	?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- /Prescription Tab -->
								<!-- Medical Records Tab -->
								<!--
                              <div id="pat_medical_records" class="tab-pane fade">
                              	<div class="card card-table mb-0">
                              		<div class="card-body">
                              			<div class="table-responsive">
                              				<table class="table table-hover table-center mb-0">
                              					<thead>
                              						<tr>
                              							<th>ID</th>
                              							<th>Date </th>
                              							<th>Description</th>
                              							<th>Attachment</th>
                              							<th>Created</th>
                              							<th></th>
                              						</tr>     
                              					</thead>
                              					<tbody>
                              						<tr>
                              							<td><a href="javascript:void(0);">#MR-0010</a></td>
                              							<td>14 Nov 2019</td>
                              							<td>Dental Filling</td>
                              							<td><a href="#">dental-test.pdf</a></td>
                              							<td>
                              								<h2 class="table-avatar">
                              									<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                              										<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                              									</a>
                              									<a href="doctor-profile.html">Dr. Ruby Perrin <span>Dental</span></a>
                              								</h2>
                              							</td>
                              							<td class="text-right">
                              								<div class="table-action">
                              									<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                              										<i class="far fa-eye"></i> View
                              									</a>
                              									<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                              										<i class="fas fa-print"></i> Print
                              									</a>
                              								</div>
                              							</td>
                              						</tr>
                              						<tr>
                              							<td><a href="javascript:void(0);">#MR-0009</a></td>
                              							<td>13 Nov 2019</td>
                              							<td>Teeth Cleaning</td>
                              							<td><a href="#">dental-test.pdf</a></td>
                              							<td>
                              								<h2 class="table-avatar">
                              									<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                              										<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                              									</a>
                              									<a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
                              								</h2>
                              							</td>
                              							<td class="text-right">
                              								<div class="table-action">
                              									<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                              										<i class="far fa-eye"></i> View
                              									</a>
                              									<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                              										<i class="fas fa-print"></i> Print
                              									</a>
                              								</div>
                              							</td>
                              						</tr>
                              						<tr>
                              							<td><a href="javascript:void(0);">#MR-0008</a></td>
                              							<td>12 Nov 2019</td>
                              							<td>General Checkup</td>
                              							<td><a href="#">cardio-test.pdf</a></td>
                              							<td>
                              								<h2 class="table-avatar">
                              									<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                              										<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
                              									</a>
                              									<a href="doctor-profile.html">Dr. Deborah Angel <span>Cardiology</span></a>
                              								</h2>
                              							</td>
                              							<td class="text-right">
                              								<div class="table-action">
                              									<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                              										<i class="far fa-eye"></i> View
                              									</a>
                              									<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                              										<i class="fas fa-print"></i> Print
                              									</a>
                              								</div>
                              							</td>
                              						</tr>
                              						<tr>
                              							<td><a href="javascript:void(0);">#MR-0007</a></td>
                              							<td>11 Nov 2019</td>
                              							<td>General Test</td>
                              							<td><a href="#">general-test.pdf</a></td>
                              							<td>
                              								<h2 class="table-avatar">
                              									<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                              										<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
                              									</a>
                              									<a href="doctor-profile.html">Dr. Sofia Brient <span>Urology</span></a>
                              								</h2>
                              							</td>
                              							<td class="text-right">
                              								<div class="table-action">
                              									<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                              										<i class="far fa-eye"></i> View
                              									</a>
                              									<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                              										<i class="fas fa-print"></i> Print
                              									</a>
                              								</div>
                              							</td>
                              						</tr>
                              						<tr>
                              							<td><a href="javascript:void(0);">#MR-0006</a></td>
                              							<td>10 Nov 2019</td>
                              							<td>Eye Test</td>
                              							<td><a href="#">eye-test.pdf</a></td>
                              							<td>
                              								<h2 class="table-avatar">
                              									<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                              										<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
                              									</a>
                              									<a href="doctor-profile.html">Dr. Marvin Campbell <span>Ophthalmology</span></a>
                              								</h2>
                              							</td>
                              							<td class="text-right">
                              								<div class="table-action">
                              									<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                              										<i class="far fa-eye"></i> View
                              									</a>
                              									<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                              										<i class="fas fa-print"></i> Print
                              									</a>
                              								</div>
                              							</td>
                              						</tr>
                              						<tr>
                              							<td><a href="javascript:void(0);">#MR-0005</a></td>
                              							<td>9 Nov 2019</td>
                              							<td>Leg Pain</td>
                              							<td><a href="#">ortho-test.pdf</a></td>
                              							<td>
                              								<h2 class="table-avatar">
                              									<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                              										<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
                              									</a>
                              									<a href="doctor-profile.html">Dr. Katharine Berthold <span>Orthopaedics</span></a>
                              								</h2>
                              							</td>
                              							<td class="text-right">
                              								<div class="table-action">
                              									<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                              										<i class="far fa-eye"></i> View
                              									</a>
                              									<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                              										<i class="fas fa-print"></i> Print
                              									</a>
                              								</div>
                              							</td>
                              						</tr>
                              						<tr>
                              							<td><a href="javascript:void(0);">#MR-0004</a></td>
                              							<td>8 Nov 2019</td>
                              							<td>Head pain</td>
                              							<td><a href="#">neuro-test.pdf</a></td>
                              							<td>
                              								<h2 class="table-avatar">
                              									<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                              										<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
                              									</a>
                              									<a href="doctor-profile.html">Dr. Linda Tobin <span>Neurology</span></a>
                              								</h2>
                              							</td>
                              							<td class="text-right">
                              								<div class="table-action">
                              									<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                              										<i class="far fa-eye"></i> View
                              									</a>
                              									<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                              										<i class="fas fa-print"></i> Print
                              									</a>
                              								</div>
                              							</td>
                              						</tr>
                              						<tr>
                              							<td><a href="javascript:void(0);">#MR-0003</a></td>
                              							<td>7 Nov 2019</td>
                              							<td>Skin Alergy</td>
                              							<td><a href="#">alergy-test.pdf</a></td>
                              							<td>
                              								<h2 class="table-avatar">
                              									<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                              										<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
                              									</a>
                              									<a href="doctor-profile.html">Dr. Paul Richard <span>Dermatology</span></a>
                              								</h2>
                              							</td>
                              							<td class="text-right">
                              								<div class="table-action">
                              									<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                              										<i class="far fa-eye"></i> View
                              									</a>
                              									<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                              										<i class="fas fa-print"></i> Print
                              									</a>
                              								</div>
                              							</td>
                              						</tr>
                              						<tr>
                              							<td><a href="javascript:void(0);">#MR-0002</a></td>
                              							<td>6 Nov 2019</td>
                              							<td>Dental Removing</td>
                              							<td><a href="#">dental-test.pdf</a></td>
                              							<td>
                              								<h2 class="table-avatar">
                              									<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                              										<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
                              									</a>
                              									<a href="doctor-profile.html">Dr. John Gibbs <span>Dental</span></a>
                              								</h2>
                              							</td>
                              							<td class="text-right">
                              								<div class="table-action">
                              									<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                              										<i class="far fa-eye"></i> View
                              									</a>
                              									<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                              										<i class="fas fa-print"></i> Print
                              									</a>
                              								</div>
                              							</td>
                              						</tr>
                              						<tr>
                              							<td><a href="javascript:void(0);">#MR-0001</a></td>
                              							<td>5 Nov 2019</td>
                              							<td>Dental Filling</td>
                              							<td><a href="#">dental-test.pdf</a></td>
                              							<td>
                              								<h2 class="table-avatar">
                              									<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
                              										<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-10.jpg" alt="User Image">
                              									</a>
                              									<a href="doctor-profile.html">Dr. Olga Barlow <span>Dental</span></a>
                              								</h2>
                              							</td>
                              							<td class="text-right">
                              								<div class="table-action">
                              									<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
                              										<i class="far fa-eye"></i> View
                              									</a>
                              									<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
                              										<i class="fas fa-print"></i> Print
                              									</a>
                              								</div>
                              							</td>
                              						</tr>
                              					</tbody>  	
                              				</table>
                              			</div>
                              		</div>
                              	</div>
                              </div>
                              -->
								<!-- /Medical Records Tab -->
								<!-- Billing Tab -->
								<div id="pat_billing" class="tab-pane fade">
									<div class="card card-table mb-0">
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-hover table-center mb-0">
													<thead>
														<tr>
															<th>Invoice No</th>
															<th>Doctor</th>
															<th>Amount</th>
															<th>Paid On</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<a href="invoice-view.html">#INV-0010</a>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																		<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Ruby Perrin <span>Dental</span></a>
																</h2>
															</td>
															<td>$450</td>
															<td>14 Nov 2019</td>
															<td class="text-right">
																<div class="table-action">
																	<a href="invoice-view.html" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																		<i class="fas fa-print"></i> Print
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="invoice-view.html">#INV-0009</a>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																		<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Dr. Darren Elder <span>Dental</span></a>
																</h2>
															</td>
															<td>$300</td>
															<td>13 Nov 2019</td>
															<td class="text-right">
																<div class="table-action">
																	<a href="invoice-view.html" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																		<i class="fas fa-print"></i> Print
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="invoice-view.html">#INV-0008</a>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																		<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Dr. Deborah Angel <span>Cardiology</span></a>
																</h2>
															</td>
															<td>$150</td>
															<td>12 Nov 2019</td>
															<td class="text-right">
																<div class="table-action">
																	<a href="invoice-view.html" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																		<i class="fas fa-print"></i> Print
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="invoice-view.html">#INV-0007</a>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																		<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-04.jpg" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Dr. Sofia Brient <span>Urology</span></a>
																</h2>
															</td>
															<td>$50</td>
															<td>11 Nov 2019</td>
															<td class="text-right">
																<div class="table-action">
																	<a href="invoice-view.html" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																		<i class="fas fa-print"></i> Print
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="invoice-view.html">#INV-0006</a>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																		<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Dr. Marvin Campbell <span>Ophthalmology</span></a>
																</h2>
															</td>
															<td>$600</td>
															<td>10 Nov 2019</td>
															<td class="text-right">
																<div class="table-action">
																	<a href="invoice-view.html" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																		<i class="fas fa-print"></i> Print
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="invoice-view.html">#INV-0005</a>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																		<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-06.jpg" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Dr. Katharine Berthold <span>Orthopaedics</span></a>
																</h2>
															</td>
															<td>$200</td>
															<td>9 Nov 2019</td>
															<td class="text-right">
																<div class="table-action">
																	<a href="invoice-view.html" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																		<i class="fas fa-print"></i> Print
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="invoice-view.html">#INV-0004</a>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																		<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-07.jpg" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Dr. Linda Tobin <span>Neurology</span></a>
																</h2>
															</td>
															<td>$100</td>
															<td>8 Nov 2019</td>
															<td class="text-right">
																<div class="table-action">
																	<a href="invoice-view.html" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																		<i class="fas fa-print"></i> Print
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="invoice-view.html">#INV-0003</a>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																		<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Dr. Paul Richard <span>Dermatology</span></a>
																</h2>
															</td>
															<td>$250</td>
															<td>7 Nov 2019</td>
															<td class="text-right">
																<div class="table-action">
																	<a href="invoice-view.html" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																		<i class="fas fa-print"></i> Print
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="invoice-view.html">#INV-0002</a>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																		<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-09.jpg" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Dr. John Gibbs <span>Dental</span></a>
																</h2>
															</td>
															<td>$175</td>
															<td>6 Nov 2019</td>
															<td class="text-right">
																<div class="table-action">
																	<a href="invoice-view.html" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																		<i class="fas fa-print"></i> Print
																	</a>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<a href="invoice-view.html">#INV-0001</a>
															</td>
															<td>
																<h2 class="table-avatar">
																	<a href="doctor-profile.html" class="avatar avatar-sm mr-2">
																		<img class="avatar-img rounded-circle" src="assets/img/doctors/doctor-thumb-10.jpg" alt="User Image">
																	</a>
																	<a href="doctor-profile.html">Dr. Olga Barlow <span>#0010</span></a>
																</h2>
															</td>
															<td>$550</td>
															<td>5 Nov 2019</td>
															<td class="text-right">
																<div class="table-action">
																	<a href="invoice-view.html" class="btn btn-sm bg-info-light">
																		<i class="far fa-eye"></i> View
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																		<i class="fas fa-print"></i> Print
																	</a>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- /Billing Tab -->
							</div>
							<!-- Tab Content -->
						</div>
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
									<p> 3556 Beech Street, San Francisco,<br> California, CA 94108 </p>
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
	<script src="assets/js/jquery.min.js"></script>
	<!-- Bootstrap Core JS -->
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Sticky Sidebar JS -->
	<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
	<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
</body>
<!-- doccure/patient-dashboard.html  30 Nov 2019 04:12:16 GMT -->

</html>