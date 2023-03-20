<?php
session_start();
$page_title = "View Blood Donation - Blood Bank";
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

                        <ul class="list-group row ">
                            <!-- <li class="list-group-item active" aria-current="true">An active item</li> 
                            -->
                            <?php
                                // to get all data about this user(blood bank) using session id
                                $donation_result = $conn->query("SELECT * FROM blood_donation INNER JOIN donar_registration ON blood_donation.donar_id = donar_registration.donar_id INNER JOIN blood_group ON blood_donation.blood_group = blood_group.blood_group_id WHERE donation_id = $get_donation_id");
                                       
                                $data_row =   $donation_result->fetch_assoc()      
                            ?>
                            <li class="list-group-item col-6">Donar Name: <?= $data_row['donar_name'] ?></li>
                            <li class="list-group-item col-6">Donar Email: <?= $data_row['donar_email'] ?></li>
                            <li class="list-group-item col-6">Donar Gender:<?= $data_row['donar_gender']; ?></li>
                            <li class="list-group-item col-6">Donar Mobile: <?= $data_row['donar_mobile']; ?></li>
                            <li class="list-group-item col-6">Donar Blood Group:
                                <?= $data_row['blood_group_name']; ?></li>
                            <li class="list-group-item col-6">Donar Age: <?= $data_row['age']; ?></li>
                            <li class="list-group-item col-6">Donar City: <?= $data_row['donar_city']; ?></li>
                            <li class="list-group-item col-6">Donar Pincode: <?= $data_row['donar_pincode']; ?></li>
                            <li class="list-group-item col-6">No Unit Blood:
                                <?= $data_row['no_unit']." ml"; ?>
                            </li>
                            <li class="list-group-item col-6">Donar's Disease: <?= $data_row['disease']; ?></li>
                            <li class="list-group-item col-6">Donation Request
                                Status: <?= $data_row['request_status']; ?></li>
                            <li class="list-group-item col-6">Donate
                                Status:
                                <?= (empty($data_row['donate_status'])) ? "no action" : $data_row['donate_status'] ?>
                            </li>
                            <!-- only for reason -->
                            <?php
                                if(!empty($data_row['reason']) && trim($data_row['reason']) !==""){
                                ?>
                            <li class="list-group-item col-6">Reson:
                                <?= $data_row['reason'] ?>
                            </li>
                            <?php
                                }
                                ?>

                            <li class="list-group-item col-6">Donation's Date: <?= $data_row['donation_date']; ?>
                            </li>
                            <li class="list-group-item col-6">Donation's Time: <?= $data_row['time_slot']; ?></li>

                            <!-- <li class="list-group-item disabled" aria-disabled="true">A disabled item</li> -->
                        </ul><!-- End ist group with active and disabled items -->

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