<?php
session_start();
$page_title = "View Request ";
// include the database
// require_once("db.php");
// we restricted visite the page without login
// if user is not logged in then, we will redirect to the login page
// if(empty($_SESSION['user_type']) && $_SESSION['user_type'] !== 'blood_bank' && empty($_SESSION['user_id'])){
//     header("location:./");
//     die;
// }

$get_donation_id = $_GET['id'];

// $data_row = $donation_result->fetch_assoc();
// echo "<pre>";
// print_r($data_row);
// die;
require_once("../blood_bank/private/initialization.php");
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

        <section class="section" style="min-height: 63vh;">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card pt-3">
                        <div class="card-body">
                            <h5 class="card-title">Donation's Details</h5>
                            <!-- List group with active and disabled items -->

                                <!-- <li class="list-group-item active" aria-current="true">An active item</li> 
                            -->
                                <?php
                                // to get all data about this user(blood bank) using session id
                                $donation_result = $conn->query("SELECT * FROM blood_donate INNER JOIN donar ON blood_donate.donar_id = donar.donar_id  WHERE donate_id = $get_donation_id");
                                       
                                $data_row =   $donation_result->fetch_assoc()      
                            ?>
                               
                            <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Donar Id</div>
                                    #<?= "{$data_row['donar_id']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Name</div>
                                    <?= "{$data_row['donar_name']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Email</div>
                                    <?= "{$data_row['donar_email']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Gender</div>
                                    <?= "{$data_row['donar_gender']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Mobile No.</div>
                                    <?= "{$data_row['donar_phone']}" ?>
                                </div>

                            </li>
                           
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">No of unit(in ml)</div>
                                    <?= "{$data_row['no_of_unit']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Disease</div>
                                    <?= "{$data_row['disease']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                   
                                    <div class="fw-bold">Blood Group</div>
                                    <?= "{$data_row['blood_group']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Location</div>
                                    <?= "{$data_row['donar_location']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Address</div>
                                    <address><?= "{$data_row['donar_address']}" ?></address>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Pincode</div>
                                    <?= "{$data_row['donar_pincode']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Blood Donate Date</div>
                                    <?= "{$data_row['donate_date']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Request Status</div>
                                    <?php if(empty($data_row['status'])){echo "<span class='badge rounded-pill bg-dark'>no action</span>";}else if($data_row['status'] === 'accept'){ echo "<span class='badge bg-success'>{$data_row['status']}</span>";}else if($data_row['status'] === 'reject'){echo "<span class='badge bg-danger'>{$data_row['status']}</span>";}else if($data_row['status'] === 'cancel'){ echo "<span class='badge bg-secondary'>{$data_row['status']}</span>";}else{ echo "<span class='badge bg-warning'>{$data_row['status']}</span>";}?>
                                </div>

                            </li>
                        </ul><!-- End with custom content -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- start stock Modal-->
            <div class="modal fade" id="add_stock" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Stock</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Vertical Form -->
                            <form class="row g-3" action="add_stock.php" method="POST">
                                <div class="col-12">
                                    <select id="inputStock" class="form-select" name="blood_group">
                                        <option selected>Select</option>
                                        <?php
                                        // getton blood bank stock from db
                                        $blood_group = $conn->query("SELECT * FROM blood_group"); 
                                        while($blood_group_row = $blood_group->fetch_assoc()){
                                            //stock_blood_group_id is coming from blood_bank_stock
                                            // if blood group already exits then will not show this blood group in add stock page
                                            $d_none = in_array($blood_group_row['id'],$stock_blood_group_id) ? "d-none" : "";
                                        ?>
                                        <option value="<?= $blood_group_row['id'] ?>" class="<?= "{$d_none}" ?>">
                                            <?=$blood_group_row['blood_group']  ?>
                                        </option>
                                        <?php 

                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="inputUnit" class="form-label">Unit</label>
                                    <input type="text" class="form-control" id="inputUnit" placeholder="Enter unit"
                                        name="blood_unit" pattern="[1-9]\d*" title="Zero not allowed" />
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="add_stock_sub">
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


    </main><!-- End #main -->

    <?php 

require_once("../blood_bank/include/footer.php");
   
?>