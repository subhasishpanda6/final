<?php $page = "blood_bank_dashboard";
$path = __DIR__;
include_once("../include/header.php");
$patient_id = $_SESSION['patient_id'];
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
            <?php include_once("../include/profile_sidebar.php") ?>
            <!-- / Profile Sidebar -->

            <div class="col-md-7 col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body pt-0">

                        <!-- Tab Menu -->
                        <nav class="user-tabs mb-4">
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#summeryDashboard" data-toggle="tab" >Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#need_blood" data-toggle="tab" >Need Blood</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#blood_donation" data-toggle="tab" >Blood Donation</a>
                                </li>


                            </ul>
                        </nav>
                        <!-- /Tab Menu -->

                        <!-- Tab Content -->
                        <div class="tab-content pt-0">
                             <!-- dashboard summery -->
                             <div class="tab-pane fade active" id="summeryDashboard">
                                <div class="card  mb-0">
                                    <div class="card-body">
                                        <h6>Blood Donation</h6>
                                       <div class="row">
                                        <div class="col-md-3 col-xl-3">
                                            dfds
                                        </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        
                        <!-- dashboard summery end-->
                            <!-- need_blood Tab -->
                            <div id="need_blood" class="tab-pane fade show">
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <?php
                                        $query1 = $conn->query("SELECT * FROM need_blood WHERE patient_id = $patient_id ORDER BY request_id DESC");
                                        if ($query1->num_rows > 0) {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0 text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>Req. No</th>
                                                            <th>Blood Group</th>
                                                            <th>No of Unit(in ml)</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($row3 = $query1->fetch_assoc()) {
                                                            // blood_group 
                                                            $get_res = $conn->query("SELECT blood_group_name FROM blood_group WHERE blood_group_id = {$row3['blood_group']}");
                                                            $blood_group = $get_res->fetch_object();
                                                        ?>
                                                            <tr>
                                                                <td><?= $row3['request_id']; ?></td>
                                                                <td><?= $blood_group->blood_group_name; ?></td>
                                                                <td><?= $row3['no_of_unit']; ?></td>
                                                                <td><?= $row3['delivery_date']; ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($row3['request_status'] === "pending") {
                                                                        echo "<a href='javascript:void(0);' class='btn btn-sm bg-warning text-dark'>
                                                                {$row3['request_status']}
                                                        </a>";
                                                                    } else if ($row3['request_status'] === "cancel" || $row3['request_status'] === "reject") {
                                                                        echo "<a href='javascript:void(0);' class='btn btn-sm bg-danger-light'>
                                                                {$row3['request_status']}
                                                        </a>";
                                                                    } else {
                                                                        echo "<a href='javascript:void(0);' class='btn btn-sm bg-success'>
                                                                {$row3['request_status']}
                                                        </a>";
                                                                    }

                                                                    ?>

                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <?php if ($row3['request_status'] === "pending") { ?>
                                                                            <button class="btn btn-sm bg-danger-light need_blood_cancel_req" data-request_id=<?php echo "{$row3['request_id']}" ?>>
                                                                                Cancel
                                                                            </button>
                                                                        <?php } ?>
                                                                        <a href="view_request.php?request='need_blood'&id=<?=  $row3['request_id']?>" class="btn btn-sm bg-info-light">
                                                                            <i class="far fa-eye"></i> 
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <p>No record found</p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /need_blood Tab -->



                            <!-- blood_donation Tab -->
                            <div class="tab-pane fade" id="blood_donation">

                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <?php
                                        $query5 = $conn->query("SELECT * FROM blood_donate WHERE donar_id = $donar_id ORDER BY donate_id DESC");
                                        if ($conn->affected_rows > 0) {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0 text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>Request Id</th>
                                                            <th>Blood Group</th>
                                                            <th>No of Unit(in ml)</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($row6 = $query5->fetch_assoc()) {
                                                            $get_res = $conn->query("SELECT blood_group_name FROM blood_group WHERE blood_group_id = {$row6['blood_group']}");
                                                            $blood_group = $get_res->fetch_object();
                                                        ?>
                                                            <tr>
                                                                <td><?= $row6['donate_id']; ?></td>
                                                                <td><?= $blood_group->blood_group_name; ?></td>
                                                                <td><?php if($row6['no_of_unit'] === "0" || empty($row6['no_of_unit'])){ echo "<span class='text-light bg-dark rounded-pill px-1'>Not Calculated</span>";}else{echo $row6['no_of_unit'];} ?></td>
                                                                <td><?= $row6['donate_date']; ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($row6['status'] === "pending" || $row6['status'] === "Pending") {
                                                                        echo "<a href='javascript:void(0);' class='btn btn-sm bg-warning'>
                                                                {$row6['status']}
                                                        </a>";
                                                                    } else if ($row6['status'] === "cancel" || $row6['status'] === "rejected") {
                                                                        echo "<a href='javascript:void(0);' class='btn btn-sm bg-danger-light'>
                                                                {$row6['status']}
                                                        </a>";
                                                                    } else {
                                                                        echo "<a href='javascript:void(0);' class='btn btn-sm bg-success'>
                                                                {$row6['status']}
                                                        </a>";
                                                                    }

                                                                    ?>

                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="table-action">
                                                                        <?php if ($row6['status'] === 'pending' || $row6['status'] === "Pending") { ?>
                                                                            <button class="btn btn-sm bg-danger-light cancel_req" data-donation_id=<?php echo "{$row6['donate_id']}" ?>>
                                                                                Cancel
                                                                            </button>
                                                                        <?php } ?>
                                                                        <a href="view_request.php?request='blood_donation'&id=<?=  $row6['donate_id']?>" class="btn btn-sm bg-info-light" >
                                                                            <i class="far fa-eye"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <p>No record found</p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                          

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
<!-- Appointment Details Modal -->
<div class="modal fade custom-modal" id="appt_details">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Appointment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="info-details">
                    <li>
                        <div class="details-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="title">#APT0001</span>
                                    <span class="text">21 Oct 2019 10:00 AM</span>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right">
                                        <button type="button" class="btn bg-success-light btn-sm" id="topup_status">Completed</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="title">Status:</span>
                        <span class="text">Completed</span>
                    </li>
                    <li>
                        <span class="title">Confirm Date:</span>
                        <span class="text">29 Jun 2019</span>
                    </li>
                    <li>
                        <span class="title">Paid Amount</span>
                        <span class="text">$450</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Appointment Details Modal -->

<?php include_once("../include/footer.php") ?>