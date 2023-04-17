<?php 
$page = "blood_bank";
$path = __DIR__;
// define("page_access_permission",true);
include_once("../include/header.php");
?>
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php $get_blood_banks = $conn->query("SELECT * FROM blood_bank_registration");
                while($row = $get_blood_banks->fetch_assoc()){
                    // asort($row);
                    $blood_available_res = $conn->query("SELECT * FROM blood_bank_stock INNER JOIN blood_group ON blood_group.blood_group_id = blood_bank_stock.blood_group_id WHERE blood_bank_stock.user_id = {$row['blood_bank_id']}");
                    
            ?>
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="appointments">
                    <!-- Appointment List -->
                    <div class="appointment-list">
                        <div class="profile-info-widget">
                            <div class="profile-det-info">
                                <h3><a href="javascript:void(0);"><?= $row['blood_bank_name']  ?></a></h3>
                                <div class="patient-details">
                                    <h5><i class="fas fa-map-marker-alt"></i> <?= $row['city']  ?>, <?= $row['address']  ?></h5>
                                    <h5 class="" > <?= $row['pincode']  ?></h5>
                                    <h5 class="">
                                        <?php
                                            if($conn->affected_rows <=0){ ?>
                                               <em>OUT OF STOCK</em>
                                            <?php }else{ ?>
                                                Blood Group: <strong class=" text-primary"><?php  while($result = $blood_available_res->fetch_object()){
                                                    echo $result->blood_group_name.", " ;
                                                   
                                                }  ?></strong>
                                            <?php }    ?>
                                        
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="appointment-action">
                            <a href="request_blood.php?bank=<?= $row['blood_bank_id'] ?>" class="btn btn-sm btn-primary">
                                Need Blood
                            </a>
                        </div>
                    </div>
                    <!-- /Appointment List -->
                </div>
            </div>
           <?php } ?>
        </div>
    </div>
</div>
<!-- /Page Content -->
<?php include_once("../include/footer.php") ?>