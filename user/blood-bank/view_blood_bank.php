<?php $page = "blood_bank";
$path = __DIR__;
include_once("../include/header.php");
?>
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php $get_blood_banks = $conn->query("SELECT * FROM blood_bank_registration");
                // blood_bank_name
                // address
                // city
                // pincode
                // blood_group_name
                while($row = $get_blood_banks->fetch_assoc()){
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
                                </div>
                            </div>
                        </div>
                        <div class="appointment-action">
                            <?php if($_GET['q'] ==="need_blood"){ ?>
                                <a href="need_blood.php?bank=<?= $row['blood_bank_id'] ?>" class="btn btn-sm btn-primary">
                               Need Blood
                            </a>
                            <?php }else if($_GET['q'] === "donate") {?>
                                <a href="blood_donate.php?bank=<?= $row['blood_bank_id'] ?>" class="btn btn-sm btn-primary">
                               Donate
                            </a>
                            <?php } ?>
                           
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