<?php $page = "blood_bank";

include_once("include/header.php");
?>
<!-- Page Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php $get_blood_banks = $conn->query("SELECT * FROM blood_bank_registration INNER JOIN blood_bank_stock ON blood_bank_registration.blood_bank_id = blood_bank_stock.user_id INNER JOIN blood_group ON blood_group.blood_group_id = blood_bank_stock.blood_group_id");
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
                                    <h5 class="" >Blood Group: <strong class=" text-primary"><?= $row['blood_group_name']  ?></strong></h5>
                                </div>
                            </div>
                        </div>
                        <div class="appointment-action">
                            <a href="request_blood.php?bank=<?= $row['blood_bank_id'] ?>&blood=<?= $row['blood_group_id'] ?>" class="btn btn-sm btn-primary">
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
<?php include_once("include/footer.php") ?>