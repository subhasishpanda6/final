<?php
session_start();
$page_title = "Donar - Blood Bank";
$active_page= "donar";
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

// echo "<pre>";
// print_r($result->fetch_assoc());
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
                            <h5 class="card-title">Donar Lists</h5>
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
                                    <th scope="col">Donar Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Blood Group</th>
                                    <th scope="col">Action</th>
                                    <!-- <th scope="col">Start Date</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $donar_result = $conn->query("SELECT * FROM donar ORDER BY donar_id DESC");
                                        if($donar_result->num_rows > 0){
                                      
                                        while($donar_row = $donar_result->fetch_assoc()){
                                           
                                    ?>
                                <tr class="text-center">
                                   
                                    <td>#<?= $donar_row['donar_id'] ?></td>
                                    <td><?= $donar_row['donar_name'] ?></td>
                                    <td><?= $donar_row['donar_email'] ?></td>
                                    <td><?= $donar_row['donar_gender']; ?>
                                    <td><?= $donar_row['donar_phone']; ?>
                                    <td><?= $donar_row['donar_blood_group']; ?>
                                    </td>
                                    <td>
                                        <a href="donar_profile.php?id=<?php echo "{$donar_row['donar_id']}"?>"
                                            class="btn btn-success btn-sm">view</a>
                                    </td>
                                    <!-- <td>2011-04-19</td> -->

                                </tr>
                                <?php
                                    
                                        }
                                       
                                    }else{
                                       ?>
                                <tr class="bg-light">
                                    <td colspan="4" class="text-center">Not found</td>
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