<?php $page = "blood_bank";
$path = __DIR__;
include_once("../include/header.php");
$get_donar_result = $conn->query("SELECT * FROM `donar` WHERE `register_id` = {$_SESSION['patient_id']}");
$donar_data = $get_donar_result->fetch_assoc();
if($conn->affected_rows <= 0){
    echo "<script>window.location.href = 'blood_bank.php'</script>";
}
?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="pb-4 text-center">Blood Donation</h2>
                        <!-- Checkout Form -->
                        <div class="row">
                        <form action="" method="POST" class="col-md-6 mx-auto">

                            <!-- Personal Information -->
                            <div class="info-widget">

                                <div class="row">

                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>When do you want? <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date" name="date">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>No of unit(in ml) <span class="text-danger">*</span></label>
                                            <input class="form-control" type="number" name="unit" placeholder="No of unit">

                                        </div>
                                    </div> -->
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>disease(if any) <span class="text-danger">*</span></label>
                                            <textarea name="disease" class="form-control" id="" cols="30" rows="5" placeholder="disease..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section mt-4">
                                    <?php if (isset($_SESSION) && isset($_SESSION['patient_id'])) { ?>
                                        <button type="submit" class="btn btn-primary submit-btn" name="request">Request</button>
                                    <?php } else { ?>
                                        <a href="login.php" class="btn btn-primary submit-btn">Request</a>
                                    <?php $_SESSION['req_page'] = "request_blood.php?bank={$_GET['bank']}";
                                    } ?>
                                </div>
                            </div>
                            <!-- /Personal Information -->

                        </form>
                        </div>
                        <!-- /Checkout Form -->

                    </div>
                </div>
                <?php
                if (isset($_POST['request'])) {
                    if (!empty($_POST['date']) && !empty($_POST['disease'])) {

                        // get donara details
                        $get_donar_result = $conn->query("SELECT * FROM `donar` WHERE `register_id` = {$_SESSION['patient_id']}");
                        $donar_data = $get_donar_result->fetch_assoc();
                        $request_insert = $conn->prepare("INSERT INTO blood_donate SET donar_id = ?,donate_date=?,blood_bank=?,blood_group=?,disease=?");
                        $request_insert->bind_param("isiis", $donar_data['donar_id'], $_POST['date'],$_GET['bank'], $donar_data['donar_blood_group_id'], $_POST['disease']);
                        if ($request_insert->execute()) {
                            echo "<script>success('successfully requested')</script>";
                        } else {
                            echo "<script>error('failed to insert')</script>";
                        }
                    } else {
                        echo "<script>error('All fields are required')</script>";
                        // echo "<pre>";
                        // print_r($conn);
                        // die;
                    }
                   
                }

                ?>

            </div>
        </div>
    </div>
</div>
<?php include_once("../include/footer.php") ?>