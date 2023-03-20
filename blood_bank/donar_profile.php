<?php
session_start();
$page_title = "Donar Profile - Blood Bank";
// include the database
// require_once("db.php");
// we restricted visite the page without login
// if user is not logged in then, we will redirect to the login page
// if(empty($_SESSION['user_type']) && $_SESSION['user_type'] !== 'blood_bank' && empty($_SESSION['user_id'])){
//     header("location:./");
//     die;
// }

require_once("../blood_bank/private/initialization.php");
$get_donnar_id = $_GET['id'];
// to get all data about this user(blood bank) using session id
$result = $conn->query("SELECT * FROM donar WHERE donar_id = $get_donnar_id");
$data = $result->fetch_assoc();
require_once("../blood_bank/include/header.php");
require_once("../blood_bank/include/sidebar.php");
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Elements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Elements</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <!-- for donar profile -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Donar Information</h5>

                        <!-- List group with custom content -->
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Donar Id</div>
                                    #<?= "{$data['donar_id']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Name</div>
                                    <?= "{$data['donar_name']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Email</div>
                                    <?= "{$data['donar_email']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Gender</div>
                                    <?= "{$data['donar_gender']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Mobile No.</div>
                                    <?= "{$data['donar_phone']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Age</div>
                                    Cras justo odio
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <?php
                                    $blood_grp_res = $conn->query("SELECT blood_group_name FROM blood_group WHERE blood_group_name = {$data['donar_blood_group']}");
                                    $blood_group = "None";
                                    if ($conn->affected_rows > 0) {
                                        $blood_group_row = $blood_grp_res->fetch_assoc();
                                        $blood_group = $blood_group_row['blood_group_name'];
                                    }
                                    ?>
                                    <div class="fw-bold">Blood Group</div>
                                    <?= "{$blood_group}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Location</div>
                                    <?= "{$data['donar_location']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Address</div>
                                    <address><?= "{$data['donar_address']}" ?></address>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Pincode</div>
                                    <?= "{$data['donar_pincode']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Joining Date</div>
                                    <?= "{$data['created_at']}" ?>
                                </div>

                            </li>
                        </ul><!-- End with custom content -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->


<?php
require_once("../blood_bank/include/footer.php");
?>