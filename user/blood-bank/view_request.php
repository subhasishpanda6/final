<?php $page = "blood_bank_dashboard";
$path = __DIR__;
include_once("../include/header.php");
$patient_id = $_SESSION['patient_id'];
$req_id = intval($_GET['id']);
if (!isset($_SESSION['patient_name'])) {
    echo "<script>window.location.href = './'</script>";
}
$row1 = mysqli_query($conn, "select * from patient_registration where id='$patient_id' ");
$row2 = mysqli_fetch_assoc($row1);

$row4 = $conn->query("SELECT * FROM donar WHERE register_id ='$patient_id' ");
$row5 = $row4->fetch_assoc();
$donar_id = null;
if ($conn->affected_rows > 0) {
    $donar_id = $row5['donar_id'];
}
// echo "<pre>";
// print_r($conn);
// die;

?>
<!-- /Header -->

<!-- Breadcrumb -->
<!-- <div class="breadcrumb-bar">
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
</div> -->
<!-- /Breadcrumb -->

<!-- ************* -->



<!-- ************* -->
<div class="content">
    <div class="container-fluid">

        <div class="row">

            <!-- Profile Sidebar -->
            <?php include_once("../include/profile_sidebar.php") ?>
            <!-- / Profile Sidebar -->

            <div class="col-md-7 col-lg-8 col-xl-9" style="background:#fff;">
                <div class="row">
                    <?php
                    if (!empty($_GET['request']) && $_GET['request'] === "need_blood") {
                        $info_res = $conn->query("SELECT * FROM need_blood INNER JOIN patient_registration ON need_blood.patient_id = patient_registration.id INNER JOIN blood_group ON blood_group.blood_group_id = need_blood.blood_group INNER JOIN blood_bank_registration ON blood_bank_registration.blood_bank_id  = need_blood.blood_bank  WHERE need_blood.request_id = {$req_id}");
                        $result = $info_res->fetch_object();
                        // echo "<pre>";
                        // print_r($result);

                    ?>
                        <div class="col-lg-12">
                            <div class="invoice-content border-0">
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-info">
                                                <strong class="customer-text">Personal Information</strong>
                                                <p class="invoice-details invoice-details-two">
                                                    <?= ucfirst($result->name) ?>, <br>
                                                    <?= $result->email ?>,<br>
                                                    <?= ucfirst($result->gender) ?> <br>
                                                    <?= $result->phone ?> <br>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="invoice-details">
                                                <strong>Request No:</strong> #<?= $result->request_id ?> <br>
                                                <strong>Date:</strong> <?= $result->created_at ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Invoice Item -->
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-info">
                                                <strong class="customer-text">Blood Bank </strong>
                                                <p class="invoice-details invoice-details-two">
                                                    <?= ucfirst($result->blood_bank_name) ?> <br>
                                                    <?= ucfirst($result->city) ?><br>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /Invoice Item -->
                                <!-- Invoice Item -->
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-info">
                                                <strong class="customer-text">Request Information</strong>
                                                <p class="invoice-details invoice-details-two">
                                                <p>Blood Group: <?= $result->blood_group_name ?></p>
                                                <p>No of Unit(ml): <?= $result->no_of_unit ?></p>
                                                <p>
                                                    Requested Date: <?= $result->delivery_date ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="invoice-info invoice-info2">
                                                <strong class="customer-text">Status</strong>
                                                <p class="invoice-details">
                                                    <?= $result->request_status ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Invoice Item -->

                                <!-- Invoice Information -->
                                <div class="other-info">
                                    <h4>Reason</h4>
                                    <p class="text-muted mb-0"><?= $result->reason ?></p>
                                </div>
                                <!-- /Invoice Information -->
                                <div class="mt-4">
                                    <a href="blood_bank_dashboard.php">Previous</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    } else if (!empty($_GET['request']) && $_GET['request'] === "blood_donation") {
                        $info_res = $conn->query("SELECT * FROM blood_donate INNER JOIN donar ON blood_donate.donar_id = donar.donar_id INNER JOIN blood_group ON blood_group.blood_group_id = blood_donate.blood_group INNER JOIN blood_bank_registration ON blood_bank_registration.blood_bank_id  = blood_donate.blood_bank  WHERE blood_donate.donate_id = {$req_id}");
                        $result = $info_res->fetch_object();
                    ?>

                        <div class="col-lg-12">
                            <div class="invoice-content border-0">
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-info">
                                                <strong class="customer-text">Personal Information</strong>
                                                <p class="invoice-details invoice-details-two">
                                                    <?= ucfirst($result->donar_name) ?>, <br>
                                                    <?= $result->donar_email ?>,<br>
                                                    <?= ucfirst($result->donar_gender) ?> <br>
                                                    
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="invoice-details">
                                                <strong>Donate Id:</strong> #<?= $result->donate_id ?> <br>
                                                <strong>Date:</strong> <?= $result->created_at ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Invoice Item -->
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-info">
                                                <strong class="customer-text">Blood Bank </strong>
                                                <p class="invoice-details invoice-details-two">
                                                    <?= ucfirst($result->blood_bank_name) ?> <br>
                                                    <?= ucfirst($result->city) ?><br>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /Invoice Item -->
                                <!-- Invoice Item -->
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-info">
                                                <strong class="customer-text">Request Information</strong>
                                                <p class="invoice-details invoice-details-two">
                                                <p>Blood Group: <?= $result->blood_group_name ?></p>
                                                <p>No of Unit(ml): <?= $result->no_of_unit ?></p>
                                                <p>
                                                    Requested Date: <?= $result->donate_date ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="invoice-info invoice-info2">
                                                <strong class="customer-text">Request Status</strong>
                                                <p class="invoice-details">
                                                    <?= $result->status ?>
                                                </p>
                                            </div>
                                            <div class="invoice-info invoice-info2">
                                                <strong class="customer-text">Blood Donation Status</strong>
                                                <p class="invoice-details">
                                                    <?= $result->donation_status ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Invoice Item -->

                                <!-- Invoice Information -->
                                <div class="other-info">
                                    <h4>Disease</h4>
                                    <p class="text-muted mb-0"><?= $result->disease ?></p>
                                </div>
                                <!-- /Invoice Information -->
                                <div class="mt-4">
                                    <a href="blood_bank_dashboard.php">Previous</a>
                                </div>
                            </div>
                        </div>
                    <?php


                    }

                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include_once("../include/footer.php") ?>