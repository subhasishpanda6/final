<?php
session_start();
$page_title = "Manage Donation - Blood Bank";
$active_page= "manage_need_blood";
// include the database
// require_once("db.php");
require_once("../blood_bank/private/initialization.php");
$user_id = $_SESSION['user_id'];
// we restricted visite the page without login
// if user is not logged in then, we will redirect to the login page
// if(empty($_SESSION['user_type']) && $_SESSION['user_type'] !== 'blood_bank' && empty($_SESSION['user_id'])){
//     header("location:./");
//     die;
// }
// to geting stock data
// echo date("d-m-Y");
// if("20-01-2023" === "20-01-2023"){echo "yes";}

// // echo "<pre>";
// // print_r($result->fetch_assoc());
// die;

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
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-sm-between align-items-center">
                            <h5 class="card-title">All Donation List</h5>
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
                                    <th scope="col">Blood Group</th>
                                    <th scope="col">Unit(in ml)</th>
                                    <th scope="col">Donate Status</th>
                                    <th scope="col">Action</th>
                                    <!-- <th scope="col">Start Date</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        // $donation_result = $conn->query("SELECT * FROM blood_donate INNER JOIN donar ON blood_donate.donar_id = donar.donar_id");
                                        $need_blood_res = $conn->query("SELECT * FROM need_blood INNER JOIN patient_registration ON need_blood.patient_id = patient_registration.id  WHERE need_blood.request_status != 'pending' AND need_blood.request_status != 'Pending' ORDER BY need_blood.request_id DESC");
                                        if($need_blood_res->num_rows > 0){
                                       
                                        while($need_blood_row = $need_blood_res->fetch_assoc()){
                                            $blood_group = $conn->query("SELECT * FROM blood_group WHERE blood_group_id = {$need_blood_row['blood_group']}");
                                            $blood_gr_name = $blood_group->fetch_object()->blood_group_name;
                                           
                                    ?>
                                <tr class="text-center">
                                    <td scope="row"><?= $need_blood_row['request_id'] ?></td>
                                    <td><?= $need_blood_row['name'] ?></td>
                                    <td><?= $blood_gr_name ?></td>
                                    <td><?= $need_blood_row['no_of_unit'] ?></td>
                                    <td><?php if(empty($need_blood_row['request_status'])){echo "<span class='badge rounded-pill bg-dark'>no action</span>";}else if($need_blood_row['request_status'] === 'accept'){ echo "<span class='badge bg-success'>{$need_blood_row['request_status']}</span>";}else if($need_blood_row['request_status'] === 'reject'){echo "<span class='badge bg-danger'>{$need_blood_row['request_status']}</span>";}else if($need_blood_row['request_status'] === 'cancel'){ echo "<span class='badge bg-secondary'>{$need_blood_row['request_status']}</span>";}?>
                                    </td>
                                    <td>
                                        <a href="view_need_blood.php?id=<?php echo "{$need_blood_row['request_id']}"?>"
                                            class="btn btn-primary btn-sm" title="view donation"><i
                                                class="bi bi-eye"></i></a>
                                    </td>


                                </tr>
                                <?php
                                 
                                        }
                                       
                                    }else{
                                       ?>
                                <tr class="bg-light">
                                    <td colspan="6" class="text-center">No Record found</td>
                                </tr>
                                <?php
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

    </section>

</main><!-- End #main -->
<?php 

    require_once("../blood_bank/include/footer.php");
       
    ?>