<?php
//************************* */
$page_title = "Dashboard ";
$active_page = "dashboard";
require_once("../blood_bank/include/header.php");
require_once("../blood_bank/include/sidebar.php");
$bb_id = $_SESSION["user_id"];
//***************************** */

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- stock Card -->
            <?php 
            // select([
            //     'table'=>"donar",
            //     'join'=>[
            //         'type'=>"INNER JOIN",
            //         'table' => 'blood_group',
            //         'on' => ['blood_gruop_id','blood_group_id']
            //     ],
            //     'where' => ['blood_bank_id = blood_bank']
            // ]);
            $stock = $conn->query("SELECT * FROM blood_bank_stock INNER JOIN blood_group ON blood_bank_stock.blood_group_id = blood_group.blood_group_id WHERE blood_bank_stock.user_id = $bb_id");
           while( $result = $stock->fetch_object()){
             ?>
            <div class="col-xxl-4 col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title"><?= ucfirst($result->blood_group_name) ?></h5>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <?php if($result->stock >=10){ ?>
                                <h6><?php echo $result->stock; ?></h6>
                                <?php }else{ ?>
                                    <h6 class="text-danger"><?php echo $result->stock; ?></h6>
                                    
                                <?php } ?>
                                <span class="text-success small pt-1 fw-bold">unit</span> <span class="text-muted small pt-2 ps-1">(in ml)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- stock Card -->
            <?php } ?>
        </div>
        <div class="row">
            <!-- <h5>Donation</h5> -->
            <div class="col-xxl-4 col-md-3">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Donar Count</h5>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <?php
                                $donar = 0;
                                $count_donars = $conn->query("SELECT * FROM donar");
                                if($conn->affected_rows){
                                    $donar = $count_donars->num_rows;
                                }
                                 ?>
                                <h6><?= $donar?></h6>
                                <span class="text-success small pt-1 fw-bold">donars</span> <span class="text-muted small pt-2 ps-1"><a href="donar.php">(view)</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- donar count -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Blood Donation Request</h5>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <?php
                                $donation_request = 0;
                                $count_request = $conn->query("SELECT * FROM blood_donate");
                                if($conn->affected_rows){
                                    $donation_request = $count_request->num_rows;
                                }
                                 ?>
                                <h6><?= $donation_request?></h6>
                                <span class="text-success small pt-1 fw-bold">times</span> <span class="text-muted small pt-2 ps-1"><a href="manage_donation.php">(view)</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- blood donation request count -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Need Blood Request</h5>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <?php
                                $need_blood_request = 0;
                                $count_need_blood_request = $conn->query("SELECT * FROM need_blood");
                                if($conn->affected_rows){
                                    $need_blood_request = $count_need_blood_request->num_rows;
                                }
                                 ?>
                                <h6><?= $need_blood_request?></h6>
                                <span class="text-success small pt-1 fw-bold">times</span> <span class="text-muted small pt-2 ps-1"><a href="manage_need_blood.php">(view)</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- need blood request count -->
        </div>
    </section>

</main><!-- End #main -->
<?php
require_once("../blood_bank/include/footer.php");
?>