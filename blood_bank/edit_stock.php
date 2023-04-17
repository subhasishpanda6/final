<?php
$page_title = "Edit Stock - Blood Bank";
$active_page = "stock";
require_once("../blood_bank/include/header.php");
require_once("../blood_bank/include/sidebar.php");
//***************************** */
$id = intval($_GET['id']);
$_SESSION['stock_id'] = $id;
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Stock</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Elements</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section" style="min-height: 72vh;background:#fff;">
        <div class="row pt-5">
            <div class="col-6 mx-auto">
                <div class="card" style="box-shadow: unset;">
                    <div class="card-body">
                        <?php
                        $get_stock = $conn->query("SELECT * FROM blood_bank_stock WHERE b_stock_id = $id");
                        $stock_res = $get_stock->fetch_object();
                        $get_blood_group = $conn->query("SELECT blood_group_name FROM blood_group WHERE blood_group_id = $stock_res->blood_group_id");
                        $blood_group_res = $get_blood_group->fetch_object();
                       
                        ?>
                        <!-- Vertical Form -->
                        <form class="row g-3 mb-4" method="POST">
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label" style="color:green">Blood Group- (<?= $blood_group_res->blood_group_name ?>)</label>
                                <br>
                                <label for="inputNanme4" class="form-label" style="color:green">Current Stock - <?= $stock_res->stock ?> unit(in ml)</label>
                                <!-- <div id="stock"></div> -->
                             
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="unit" class="form-label">Add Unit(in ml)</label>
                                    <input type="number" class="form-control" id="unit" name="add_unit">
                                </div>
                                <button type="submit" class="btn btn-primary" name="add_stock">Add Stock</button>
                            </div>
                        </form><!-- Vertical Form -->
                        <!-- <form class="row g-3" method="POST">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="unit" class="form-label">Add Unit(in ml)</label>
                                    <input type="number" class="form-control" id="unit" name="remove_unit">
                                </div>
                                <button type="submit" class="btn btn-primary" name="remove_stock">Remove Stock</button>
                            </div>
                        </form> -->
                        <!-- remove_unit -->
                    </div>
                    <?php
                    //update stock
                    // add stock
                    if (isset($_POST['add_stock'])) {
                        $unit = intval($_POST['add_unit']);
                        if ($unit < 0) {
                            echo "<script>error('stock should not be negative')</script>";
                        } else if(empty($unit)){
                            echo "<script>error('should not be empty')</script>";
                        }else {
                            $current_unit = intval($stock_res->stock);
                            $total_stock = $current_unit + $unit;
                            $update_stock = $conn->query("UPDATE blood_bank_stock SET stock = $total_stock WHERE b_stock_id= $id");
                            if($update_stock){
                             $_SESSION['msg'] = true;
                                echo "<script>window.location.replace('edit_stock.php?id={$id}')</script>";  
                               
                            }
                        }
                    }
                    // remove stock
                    // if (isset($_POST['remove_stock'])) {
                    //     $unit = intval($_POST['remove_unit']);
                    //     if ($unit < 0) {
                    //         echo "<script>error('stock should not be negative')</script>";
                    //     } else if (empty($unit)) {
                    //         echo "<script>error('should not be empty')</script>";
                    //     } else {
                    //         $current_unit = intval($stock_res->stock);
                    //         $total_stock = $current_unit + $unit;
                    //     }
                    // }

                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
    if(isset($_SESSION['msg'])){
        echo "<script>success('successfully Added')</script>";
        unset($$_SESSION['msg']);
    }
?>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php
require_once("../blood_bank/include/footer.php");
?>