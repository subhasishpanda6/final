<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
						<div class="profile-sidebar">

							<div class="widget-profile pro-widget-content">
								<div class="profile-info-widget">
									<a href="#" class="booking-doc-img">
										<?php
										if (!$row2['image'])
											echo "<img src='profile_pic/" . 'no_profile.png' . "' >";
										else

											echo "<img src='profile_pic/" . $row2['image'] . "' >";

										?>
									</a>
									<div class="profile-det-info">
										<h3> <?= $_SESSION['patient_name']; ?></h3>

										<div class="patient-details">
											<h5 class="mb-0"><?= $_SESSION['patient']; ?></h5>
										</div>
										<div class="patient-details">
											<h5>Age:<?= $_SESSION['patient_age']; ?></h5>
											<!--<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i></h5>-->
										</div>
									</div>
								</div>
							</div>
							<div class="dashboard-widget">
								<nav class="dashboard-menu">
									<ul>
										<li class="">
											<a href="patient-dashboard.html">
												<i class="fas fa-columns"></i>
												<span>Dashboard</span>
											</a>
										</li>
										<li>
											<a href="doctor/show_doctor.php">
												<i class="fas fa-bookmark"></i>
												<span>Doctors</span>
											</a>
										</li>
										<li class="<?php if (isset($page) && $page === 'blood_bank_dashboard') {
										echo "active";
									} ?>">
											<a href="blood_bank_dashboard.php">
												<i class="fas fa-bookmark"></i>
												<span>Blood Bank</span>
											</a>
										</li>
										<li>
											<a href="lab/lab.php">
												<i class="fas fa-comments"></i>
												<span>PathLab</span>
												<small class="unread-msg">23</small>
											</a>
										</li>
										<li>
											<a href="patient_profile.php">
												<i class="fas fa-user-cog"></i>
												<span>Profile Settings</span>
											</a>
										</li>

										<li>
											<a href="logout.php">
												<i class="fas fa-sign-out-alt"></i>
												<span>Logout</span>
											</a>
										</li>
									</ul>
								</nav>
							</div>

						</div>
					</div>