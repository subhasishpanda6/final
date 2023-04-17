<?php
$page_title = "View Request ";
require_once("../blood_bank/include/header.php");
require_once("../blood_bank/include/sidebar.php");
$get_request_id = $_GET['id'];
// require_once("../blood_bank/private/initialization.php");
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
                            <h5 class="card-title">Need Blood Request Details</h5>
                            <!-- List group with active and disabled items -->

                                <!-- <li class="list-group-item active" aria-current="true">An active item</li> 
                            -->
                                <?php
                                // to get all data about this user(blood bank) using session id
                                $need_blood_res = $conn->query("SELECT * FROM need_blood INNER JOIN patient_registration ON need_blood.patient_id = patient_registration.id  WHERE request_id  = $get_request_id");
                               
                                $data_row =   $need_blood_res->fetch_assoc();   
                                $blood_group = $conn->query("SELECT * FROM blood_group WHERE blood_group_id = {$data_row['blood_group']}");
                                $blood_gr_name = $blood_group->fetch_object()->blood_group_name;
                                // echo "<pre>";
                                // print_r($data_row);  
                            ?>
                            <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Patient Id</div>
                                    #<?= "{$data_row['id']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Patient Name</div>
                                    <?= "{$data_row['name']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Email</div>
                                    <?= "{$data_row['email']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Gender</div>
                                    <?= "{$data_row['gender']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Mobile No.</div>
                                    <?= "{$data_row['phone_no']}" ?>
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
                                    <div class="fw-bold">Reason</div>
                                    <?= "{$data_row['reason']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                   
                                    <div class="fw-bold">Blood Group</div>
                                    <?= "$blood_gr_name" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Location</div>
                                    <?= "{$data_row['location']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Address</div>
                                    <address><?= "{$data_row['address']}" ?></address>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Pincode</div>
                                    <?= "{$data_row['pincode']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Date</div>
                                    <?= "{$data_row['delivery_date']}" ?>
                                </div>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Request Status</div>
                                    <?php if(empty($data_row['request_status'])){echo "<span class='badge rounded-pill bg-dark'>no action</span>";}else if($data_row['request_status'] === 'accept'){ echo "<span class='badge bg-success'>{$data_row['request_status']}</span>";}else if($data_row['request_status'] === 'reject'){echo "<span class='badge bg-danger'>{$data_row['request_status']}</span>";}else if($data_row['request_status'] === 'cancel'){ echo "<span class='badge bg-secondary'>{$data_row['request_status']}</span>";}else{ echo "<span class='badge bg-warning'>{$data_row['request_status']}</span>";}?>
                                    
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