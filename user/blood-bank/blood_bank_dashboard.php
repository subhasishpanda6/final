<?php $page = "blood_bank_dashboard";
$path = __DIR__;
include_once("../include/header.php");
// if (!isset($_SESSION['patient_name'])) {
//     echo "<script>window.location.href = '../'</script>";
// }
$patient_id = $_SESSION['patient_id'];
$row1 = mysqli_query($conn, "select * from patient_registration where id='$patient_id' ");
$row2 = mysqli_fetch_assoc($row1);

$row4 = $conn->query("SELECT * FROM donar WHERE register_id ='$patient_id' ");
$row5 = $row4->fetch_assoc();
$donar_id = null;
if ($conn->affected_rows > 0) {
    $donar_id = $row5['donar_id'];
}
// get page for pagination for need_blood
$need_blood_page_number=1;
if(!empty($_GET['need_page'])){
    $need_blood_page_number=$_GET['need_page'];
}
// get page for pagination for blood donation
$donation_page_number=1;
if(!empty($_GET['donation_page'])){
    $donation_page_number=$_GET['donation_page'];
}
// for tab 
$active_tab = null;
$need_blood_tab = null;
$blood_donation_tab = null;
$tab_data = [];
$param = [
    'conn'=>$conn,
    'id'=>$patient_id,
    'where' => "patient_id = {$patient_id}",
];
if (empty($_GET['tab'])) {
    $need_blood_tab = "active";
    $active_tab = "need_blood";
    $tab_data = tab_option_need_blood_request_count($param);
    // $tab_data = tab_option_need_blood($conn, $patient_id);
} else if ($_GET['tab'] === "need_blood") {
    $active_tab = "need_blood";
    $need_blood_tab = "active";
    $tab_data = tab_option_need_blood_request_count($param);
    // $tab_data = tab_option_need_blood(['conn'=>$conn,'id'=>$patient_id,'where' => "patient_id = {$patient_id}"]);
    // $tab_data = tab_option_need_blood($conn, $patient_id);
} else if ($_GET['tab'] === "blood_donation") {
    $blood_donation_tab = "active";
    $active_tab = "blood_donation";
    $tab_data = tab_option_blood_donation_request_count(['conn'=>$conn,'id'=>$patient_id]);
    // $tab_data = tab_option_blood_donation($conn, $patient_id);
   
}
// echo "<pre>";
// print_r(need_blood_result([
//     'conn'=>$conn,
//     'where' => "patient_id = {$patient_id}"
// ]));
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

                <!--start   -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card dash-card">
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-12 col-lg-2 sumery">
                                        <div class="dash-widget ">
                                            <div class="dash-widget-info">
                                                <h6>Total Requests</h6>
                                                <h3 class="total"><?= $tab_data['total_request'] ?></h3>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-2 sumery">
                                        <div class="dash-widget">
                                            <div class="dash-widget-info">
                                                <h6>Pending Requests</h6>
                                                <h3 class="pending"><?= $tab_data['pending'] ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-2 sumery">
                                        <div class="dash-widget">

                                            <div class="dash-widget-info">
                                                <h6>Cancel Requests</h6>
                                                <h3 class="cancel"><?= $tab_data['cancel'] ?></h3>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-2 summery">
                                        <div class="dash-widget">

                                            <div class="dash-widget-info">
                                                <h6>Reject Requests</h6>
                                                <h3 class="reject"><?= $tab_data['reject'] ?></h3>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-2 sumery">
                                        <div class="dash-widget">

                                            <div class="dash-widget-info">
                                                <h6>Accept Requests</h6>
                                                <h3 class="accept"><?= $tab_data['accept'] ?></h3>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="appointment-tab">
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                                <li class="nav-item mr-2">
                                    <a class="nav-link tab-menu <?= ($need_blood_tab !== null) ? "active" : $need_blood_tab ?>" href="#need_blood" data-toggle="tab" data-tab_option="need_blood">Need Blood</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tab-menu <?= ($blood_donation_tab !== null) ? $blood_donation_tab : "" ?>" href="#blood_donation" data-toggle="tab" data-tab_option="blood_donation">Blood Donation</a>
                                </li>
                            </ul>
                            <!-- /Tab Menu -->
                            <div class="tab-content">

                                <!-- Need Blood Tab -->
                                <div class="tab-pane  <?= ($need_blood_tab !== null) ? "active" : $need_blood_tab ?>" id="need_blood">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <!-- ******************** -->
                                                <?php
                                                $need_blood_data = getPaginationResults([
                                                    'conn'=>$conn,
                                                    'table'=>"need_blood",
                                                    'join' => [
                                                        'table'=>'blood_group',
                                                        'type'=>"INNER JOIN",
                                                        'on' => ['blood_group','blood_group_id']
                                                    ],
                                                    'where' => "patient_id = {$patient_id}",
                                                    'order_by' => [
                                                        'col' => 'request_id ',
                                                        'order' => 'desc'
                                                    ],
                                                    'pagination'=>[
                                                        'limit'=>3,
                                                        'page_number'=>$need_blood_page_number
                                                    ]
                                                ]);
                                                if (count($need_blood_data['results'])) {
                                                ?>
                                                    <!-- ******************** -->
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead class="text-center">
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
                                                            <!-- ********************* -->
                                                            <?php 
                                                            // while ($row3 = $query1->fetch_assoc()) {
                                                                foreach ($need_blood_data['results'] as $row3) {
                                                                // blood_group 
                                                                $get_res = $conn->query("SELECT blood_group_name FROM blood_group WHERE blood_group_id = {$row3['blood_group']}");
                                                                $blood_group = $get_res->fetch_object();
                                                            ?>
                                                                <!-- ********************* -->
                                                                <tr class="text-center">
                                                                    <td><?= $row3['request_id']; ?></td>
                                                                    
                                                                    <td><?= $row3['blood_group_name']; ?></td>
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
                                                                            <a href="view_request.php?request=need_blood&id=<?= $row3['request_id'] ?>" class="btn btn-sm bg-info-light">
                                                                                <i class="far fa-eye"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                <?php } else { ?>
                                                    <p class="text-center py-3"><em>Not Found</em></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- pagination -->
                                    <section class="comp-section ">
                                        <div class="card">
                                            <div class="card-body mx-auto">
                                                <div>
                                                    <ul class="pagination">
                                                       <?php
                                                    // //  need_page
                                                            $need_current_page_no = isset($_GET['need_page']) ? $_GET['need_page'] : 1;
                                                            $need_prev = $need_current_page_no > 1 ? "" : "disabled";
                                                            $need_next = $need_current_page_no < $need_blood_data['total_pages'] ? "" : "disabled";
                                                            $need_prev_page = $need_current_page_no - 1;
                                                            $need_next_page = $need_current_page_no + 1;
                                                            // prev page
                                                        echo " <li class='page-item {$need_prev}'>
                                                        <a class='page-link'  href='?tab={$active_tab}&need_page={$need_prev_page}'>Prev</a>
                                                    </li>";
                                                     
                                                        for($page_no=1;$page_no<=$need_blood_data['total_pages'];$page_no++){
                                                            // echo $_GET['page'];
                                                            $active = (intval($need_blood_page_number) === $page_no) ? "active" : "";
                                                        
                                                       echo "<li class='page-item $active page-no' data-page='$page_no'><a class='page-link' href='?tab={$active_tab}&need_page=$page_no'>$page_no</a></li>";
                                                       };
                                                        // next page
                                                       echo " <li class='page-item {$need_next}'>
                                                        <a class='page-link'  href='?tab={$active_tab}&need_page={$need_next_page}'>Next</a>
                                                        </li>";
                                                    
                                                       ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                     <!-- end pagination -->
                                </div>
                                <!-- /need blood Tab -->

                                <!-- blood donation Tab -->
                                <div class="tab-pane <?= ($blood_donation_tab !== null) ? $blood_donation_tab : "" ?>" id="blood_donation">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <?php
                                                    $getDonar = get_data_by_id([
                                                        'conn' =>$conn,
                                                        'table'=> 'donar',
                                                        'where' => "register_id = {$patient_id}"
                                                    ]);
                                                  $blood_donation_data = getPaginationResults([
                                                    'conn'=>$conn,
                                                    'table'=>"blood_donate",
                                                    'join' => [
                                                        'table'=>'blood_group',
                                                        'type'=>"INNER JOIN",
                                                        'on' => ['blood_group','blood_group_id']
                                                    ],
                                                    'where' => "donar_id = {$getDonar['donar_id']}",
                                                    'order_by' => [
                                                        'col' => 'donate_id ',
                                                        'order' => 'desc'
                                                    ],
                                                    'pagination'=>[
                                                        'limit'=>5,
                                                        'page_number'=>$donation_page_number
                                                    ]
                                                ]);
                                                // test($blood_donation_data);
                                                
                                                // $query5 = $conn->query("SELECT * FROM blood_donate WHERE donar_id = $donar_id ORDER BY donate_id DESC");
                                                if ($blood_donation_data['results']) {
                                                ?>
                                                    <table class="table table-hover table-center mb-0 text-center">
                                                        <thead>

                                                            <tr>
                                                                <th>Request Id</th>
                                                                <th>Blood Group</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th class="text-center">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($blood_donation_data['results'] as $row6 ) {
                                                                // $get_res = $conn->query("SELECT blood_group_name FROM blood_group WHERE blood_group_id = {$row6['blood_group']}");
                                                                // $blood_group = $get_res->fetch_object();
                                                            ?>
                                                                <tr>
                                                                    <td><?= $row6['donate_id']; ?></td>
                                                                    <td><?= $row6['blood_group_name']; ?></td>

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
                                                                        <div class="table-action text-center">
                                                                            <?php if ($row6['status'] === 'pending' || $row6['status'] === "Pending") { ?>
                                                                                <button class="btn btn-sm bg-danger-light cancel_req" data-donation_id=<?php echo "{$row6['donate_id']}" ?>>
                                                                                    Cancel
                                                                                </button>
                                                                            <?php } ?>
                                                                            <a href="view_request.php?request=blood_donation&id=<?= $row6['donate_id'] ?>" class="btn btn-sm bg-info-light">
                                                                                <i class="far fa-eye"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                <?php } else { ?>
                                                    <p class="text-center py-3"><em>Not Found</em></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                     <!-- pagination -->
                        
                                     <section class="comp-section ">
                                        <div class="card">
                                            <div class="card-body mx-auto">
                                                <div>
                                                    <ul class="pagination">
                                                       <?php
                                                        $donation_current_page_no = isset($_GET['donation_page']) ? $_GET['donation_page'] : 1;
                                                        $donation_prev = $donation_current_page_no > 1 ? "" : "disabled";
                                                        $donation_next = $donation_current_page_no < $blood_donation_data['total_pages'] ? "" : "disabled";
                                                        $donation_prev_page = $donation_current_page_no - 1;
                                                        $donation_next_page = $donation_current_page_no + 1;
                                                        // prev page
                                                    echo " <li class='page-item {$donation_prev}'>
                                                    <a class='page-link'  href='?tab={$active_tab}&donation_page={$donation_prev_page}'>Prev</a>
                                                </li>";
                                                 
                                                    for($page_no=1;$page_no<=$blood_donation_data['total_pages'];$page_no++){
                                                        // echo $_GET['page'];
                                                        $active = (intval($donation_page_number) === $page_no) ? "active" : "";
                                                    
                                                   echo "<li class='page-item $active page-no' data-page='$page_no'><a class='page-link' href='?tab={$active_tab}&donation_page=$page_no'>$page_no</a></li>";
                                                   };
                                                    // next page
                                                   echo " <li class='page-item {$donation_next}'>
                                                    <a class='page-link'  href='?tab={$active_tab}&donation_page={$donation_next_page}'>Next</a>
                                                    </li>";
                                                    
                                                       ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                     <!-- end pagination -->
                                </div>
                                <!-- /blood donation Tab -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- /Page Content -->


<?php include_once("../include/footer.php") ?>