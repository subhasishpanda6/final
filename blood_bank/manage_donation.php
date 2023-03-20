<?php
session_start();
$page_title = "Manage Donation - Blood Bank";
$active_page= "manage_donate";
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
                                    <th scope="col">request Status</th>
                                    <th scope="col">Action</th>
                                    <!-- <th scope="col">Start Date</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        // $donation_result = $conn->query("SELECT * FROM blood_donate INNER JOIN donar ON blood_donate.donar_id = donar.donar_id");
                                        $donation_result = $conn->query("SELECT * FROM blood_donate INNER JOIN donar ON blood_donate.donar_id = donar.donar_id WHERE blood_donate.status != 'pending' AND blood_donate.status != 'Pending' ORDER BY blood_donate.donate_id DESC");
                                        if($donation_result->num_rows > 0){
                                       
                                        while($donation_row = $donation_result->fetch_assoc()){
                                           
                                    ?>
                                <tr class="text-center">
                                    <td scope="row"><?= $donation_row['donate_id'] ?></td>
                                    <td><?= $donation_row['donar_name'] ?></td>
                                    <td><?= $donation_row['blood_group'] ?></td>
                                    <td><?= $donation_row['no_of_unit'] ?></td>
                                    <td><?php if(empty($donation_row['status'])){echo "<span class='badge rounded-pill bg-dark'>no action</span>";}else if($donation_row['status'] === 'accept'){ echo "<span class='badge bg-success'>{$donation_row['status']}</span>";}else if($donation_row['status'] === 'reject'){echo "<span class='badge bg-danger'>{$donation_row['status']}</span>";}else if($donation_row['status'] === 'cancel'){ echo "<span class='badge bg-secondary'>{$donation_row['status']}</span>";}?>
                                    </td>
                                    <td>
                                        <a href="view_request.php?id=<?php echo "{$donation_row['donate_id']}"?>"
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