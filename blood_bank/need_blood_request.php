<?php

$page_title = "Request Need Blood - Blood Bank";
$active_page ='need_blood';
require_once("../blood_bank/include/header.php");
require_once("../blood_bank/include/sidebar.php");
//*********************************** */
$user_id = $_SESSION['user_id'];

// we restricted visite the page without login
// if user is not logged in then, we will redirect to the login page
// if(empty($_SESSION['user_type']) && $_SESSION['user_type'] !== 'blood_bank' && empty($_SESSION['user_id'])){
//     header("location:./");
//     die;
// }
// to geting stock data


// echo "<pre>";
// print_r($result->fetch_assoc());
// die;

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

    <section class="section" style="min-height: 63vh;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-sm-between align-items-center">
                            <h5 class="card-title">Need Blood Request List</h5>
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#add_stock">
                                    Add stock
                                </button> -->
                           
                        </div>
                        <!-- Small tables -->
                        <div class="table-responsive">
                        <table class="table table-hover" style="cursor:pointer;">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Blood Group</th>
                                    <th scope="col">Unit(in ml)</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Request Status</th>
                                    <th scope="col" colspan="3">Action</th>
                                    <!-- <th scope="col">Start Date</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $need_blood_response = $conn->query("SELECT * FROM need_blood INNER JOIN patient_registration ON need_blood.patient_id = patient_registration.id  WHERE need_blood.request_status != 'accept' AND need_blood.request_status != 'reject' AND need_blood.request_status != 'cancel' AND need_blood.blood_bank = {$user_id} ORDER BY need_blood.request_id DESC");
                                        // donation id
                                      
                                        if($conn->affected_rows > 0){
                                       
                                        while($need_blood_row = $need_blood_response->fetch_assoc()){
                                        //  if($need_blood_row['request_status'] !== "accept" && $need_blood_row['request_status'] !== "reject"){
                                            $blood_group = $conn->query("SELECT * FROM blood_group WHERE blood_group_id = {$need_blood_row['blood_group']}");
                                            $blood_gr_name = $blood_group->fetch_object()->blood_group_name;
                                            ?>

                                <tr class="text-center">
                                    <td scope="row">#<?= $need_blood_row['request_id'] ?></td>
                                    <td><?= $need_blood_row['name'] ?></td>
                                    <td><?= $need_blood_row['phone_no']; ?></td>
                                    <td><?= $need_blood_row['gender']; ?></td>
                                    <td><?= $blood_gr_name ?></td>
                                    <td><?= $need_blood_row['no_of_unit'] ?></td>
                                    <td><?= $need_blood_row['reason'] ?></td>
                                    <td>
                                        <span class="badge rounded-pill bg-warning"><?= $need_blood_row['request_status'] ?>
                                        </span>

                                    </td>
                                    <td>
                                        <a href="view_need_blood.php?id=<?php echo "{$need_blood_row['request_id']}"?>"
                                            class="btn btn-primary btn-sm" title="view request"><i
                                                class="bi bi-eye"></i></a>
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm r-accept" title="accepte request" id=""
                                            data-request_id=<?php echo "{$need_blood_row['request_id']}"?> data-bg="<?php echo "{$need_blood_row['blood_group']}"?>" data-bb="<?php echo "{$need_blood_row['blood_bank']}"?>" data-unit="<?php echo "{$need_blood_row['no_of_unit']}"?>">Accepted</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm r-reject" title="reject request" id=""
                                            data-request_id=<?php echo "{$need_blood_row['request_id']}"?>>Rejected</button>
                                    </td>
                                    <!-- <td>2011-04-19</td> -->

                                </tr>
                                <?php
                                        
                                        }
                                    }else{
                                        echo "<tr><td colspan='11' class='text-center text-dark'>No new request </td></tr>";
                                    }
                                       ?>


                            </tbody>
                        </table>
                        </div>
                        <!-- End small tables -->
                    </div>
                </div>
            </div>
        </div>
        <!-- start stock Modal-->
        <div class="modal fade" id="reject" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Reason for Donation Rejected</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Vertical Form -->
                        <form class="row g-3" action="" method="POST" id="reason_form">
                            <div class="col-12">
                                <input type="hidden" id="reason_id" name="reason_id">
                                <label for="inputReason" class="form-label">Reason</label>
                                <textarea type="text" class="form-control" id="inputReason" placeholder="Enter Reason"
                                    name="reject_reason"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="add_reason">
                                    Submit
                                </button>
                            </div>
                        </form>
                        <!-- Vertical Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End stock Modal-->
    </section>
    <?php
        // <!-- rason of rejection for donation request-->
        if(isset($_POST['add_reason'])){
            require_once("db.php");
            // get reason from form
            if(!empty( $_POST['reject_reason'])){
                $reason = trim($_POST['reject_reason']);
                $donation_id = intval($_POST['reason_id']);
                $status= "reject";
                $response = $conn->prepare("UPDATE blood_donation SET reason = ?,request_status=? WHERE donation_id = ?");
                $response->bind_param("ssi",$reason,$status,$donation_id);
                if($response->execute()){
                    $_SESSION['page']= "donation_request.php";
                }else{
                    $_SESSION['msg'] = "failed";
                    $_SESSION['page']= "donation_request.php";
                }
                $response->close();
                $conn->close();
                
            }
        }
        

        ?>

</main><!-- End #main --> 


<?php 

    require_once("../blood_bank/include/footer.php");
       
    ?>