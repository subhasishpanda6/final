<?php
$page_title = "Stock - Blood Bank";
$active_page= "stock";
require_once("../blood_bank/include/header.php");
require_once("../blood_bank/include/sidebar.php");
//*************************** */
// include the database
// require_once("db.php");
// require_once("../blood_bank/private/initialization.php");
$user_id = $_SESSION['user_id'];
// we restricted visite the page without login
// if user is not logged in then, we will redirect to the login page
// if(empty($_SESSION['user_type']) && $_SESSION['user_type'] !== 'blood_bank' && empty($_SESSION['user_id'])){
//     header("location:./");
//     die;
// }
// to geting stock data
$result = $conn->query("SELECT * FROM blood_bank_stock INNER JOIN blood_group ON blood_bank_stock.blood_group_id = blood_group.blood_group_id WHERE blood_bank_stock.user_id  = $user_id ");

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
                            <h5 class="card-title">Stock List Table</h5>
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#add_stock">
                                    Add stock
                                </button> -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#add_stock">
                                Add Stock
                            </button>
                        </div>
                        <!-- Small tables -->
                        <table class="table table-hover" style="cursor:pointer;">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Blood Group</th>
                                    <th scope="col">Unit (in ml)</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                    <!-- <th scope="col">Start Date</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    //collecting blood group id
                                    $stock_blood_group_id = [];

                                        if($result->num_rows > 0){
                                        $t = 1;
                                        while($row = $result->fetch_assoc()){
                                            $stock_blood_group_id[] = $row['blood_group_id'];
                                            $status['stauts_msg'] = "Available";
                                          if(intval($row['stock']) < 10 && intval($row['stock']) >0){
                                            $status['stauts_msg'] = "Warning! less amount";
                                          }elseif(intval($row['stock']) <= 0){
                                            $status['stauts_msg'] = "Not available";
                                          }
                                    ?>
                                <tr class="text-center">
                                    <td scope="row"><?= $t; ?></td>
                                    <td><?= $row['blood_group_name'] ?></td>
                                    <td><?= $row['stock'] ?></td>
                                    <td><?= $status['stauts_msg']; ?>
                                    </td>
                                    <td><a href="edit_stock.php?id=<?= $row['b_stock_id'] ?>" class="btn btn-sm bg-success-light">Edit</a></td>
                                    <!-- <td>2011-04-19</td> -->

                                </tr>
                                <?php
                                    $t++;
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
                                            $d_none = in_array($blood_group_row['blood_group_id'],$stock_blood_group_id) ? "d-none" : "";
                                        ?>
                                    <option value="<?= $blood_group_row['blood_group_id'] ?>"
                                        class="<?= "{$d_none}" ?>">
                                        <?=$blood_group_row['blood_group_name']  ?>
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

<!-- ======= Footer ======= -->
<?php 
        require_once("../blood_bank/include/footer.php");
    ?>