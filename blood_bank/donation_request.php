<?php
$page_title = "Request Blood Donation - Blood Bank";
$active_page ='donate_req';
require_once("../blood_bank/include/header.php");
require_once("../blood_bank/include/sidebar.php");
//*********************** */
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
                            <h5 class="card-title">Donation Request List</h5>
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
                                    <th scope="col">Disease</th>
                                    <th scope="col">Request Status</th>
                                    <th scope="col">Donation Status</th>
                                    <th scope="col" colspan="2">Action</th>
                                    <th >view</th>
                                    <!-- <th scope="col">Start Date</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $donation_response = $conn->query("SELECT * FROM blood_donate INNER JOIN donar ON blood_donate.donar_id = donar.donar_id  WHERE blood_donate.status != 'accept' AND blood_donate.status != 'reject' AND blood_donate.status != 'cancel' AND blood_donate.donation_status != 'donated' AND blood_donate.donation_status != 'Not donated' ORDER BY blood_donate.donate_id DESC");
                                        // donation id
                                      
                                        if($conn->affected_rows > 0){
                                        $t = 1;
                                        while($donation_row = $donation_response->fetch_assoc()){
                                        //  if($donation_row['request_status'] !== "accept" && $donation_row['request_status'] !== "reject"){
                                           
                                            ?>

                                <tr class="text-center">
                                    <td scope="row"><?= $t; ?></td>
                                    <td><?= $donation_row['donar_name'] ?></td>
                                    <td><?= $donation_row['donar_phone']; ?></td>
                                    <td><?= $donation_row['donar_gender']; ?></td>
                                    <td><?= $donation_row['blood_group'] ?></td>
                                    <td><?= $donation_row['no_of_unit'] ?></td>
                                    <td><?= $donation_row['disease'] ?></td>
                                    <td>
                                        <span class="badge rounded-pill bg-warning"><?= $donation_row['status'] ?>
                                        </span>

                                    </td>
                                    <td>
                                        <span class="badge rounded-pill bg-dark"><?= $donation_row['donation_status'] ?>
                                        </span>

                                    </td>
                                    
                                    <td>
                                        <button class="btn btn-success btn-sm d-accept" title="accepte request" id=""
                                            data-donation_id=<?php echo "{$donation_row['donate_id']}"?>>Accepted</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm reject_button" title="reject request" id=""
                                            data-donation_id=<?php echo "{$donation_row['donate_id']}"?>>Rejected</button>
                                    </td>
                                    <td>
                                        <a href="view_request.php?id=<?php echo "{$donation_row['donate_id']}"?>"
                                            class="btn btn-primary btn-sm" title="view request"><i
                                                class="bi bi-eye"></i></a>
                                    </td>
                                    <!-- <td>2011-04-19</td> -->

                                </tr>
                                <?php
                                         $t++;
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