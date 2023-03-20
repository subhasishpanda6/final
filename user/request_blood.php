<?php $page = "blood_bank";

include_once("include/header.php");
?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="pb-4 text-center">Need Blood</h2>
                        <!-- Checkout Form -->

                        <form action="" method="POST">

                            <!-- Personal Information -->
                            <div class="info-widget">

                                <div class="row">

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>When do you want? <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date" name="date">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Location <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="location" placeholder="Enter Location">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>No of unit(in ml) <span class="text-danger">*</span></label>
                                            <input class="form-control" type="number" name="unit" placeholder="No of unit">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Pincode <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="pincode" placeholder="pincode">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Address <span class="text-danger">*</span></label>
                                            <textarea name="address" class="form-control" id="" cols="30" rows="5" placeholder="address...."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Reason <span class="text-danger">*</span></label>
                                            <textarea name="reason" class="form-control" id="" cols="30" rows="5" placeholder="message..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section mt-4">
                                    <?php if (isset($_SESSION) && isset($_SESSION['patient_id'])) { ?>
                                        <button type="submit" class="btn btn-primary submit-btn" name="request">Request</button>
                                    <?php } else { ?>
                                        <a href="login.php" class="btn btn-primary submit-btn">Request</a>
                                    <?php $_SESSION['req_page'] = "request_blood.php?bank={$_GET['bank']}&blood={$_GET['blood']}";
                                    } ?>
                                </div>
                            </div>
                            <!-- /Personal Information -->

                        </form>
                        <!-- /Checkout Form -->

                    </div>
                </div>
                <?php
                if (isset($_POST['request'])) {
                    if (!empty($_POST['date']) && !empty($_POST['location']) && !empty($_POST['pincode']) && !empty($_POST['address']) && !empty($_POST['unit']) && !empty($_POST['reason'])) {
                        $blood_group = $conn->query("SELECT * FROM blood_group WHERE blood_group_id = {$_GET['blood']}");
                        $blood_gr_name = $blood_group->fetch_object()->blood_group_name;
                        $request_insert = $conn->prepare("INSERT INTO need_blood SET patient_id = ?,blood_group=?,blood_bank=?,no_of_unit = ?,delivery_date=?,location=?,pincode=?,address=?,reason=?");
                        $request_insert->bind_param("isiisssss", $_SESSION['patient_id'],  $blood_gr_name,$_GET['bank'], $_POST['unit'], $_POST['date'], $_POST['location'], $_POST['pincode'], $_POST['address'], $_POST['reason']);
                        if ($request_insert->execute()) {
                            echo "<script>success('successfully requested')</script>";
                        } else {
                            echo "<script>error('failed to insert')</script>";
                        }
                    } else {
                        echo "<script>error('All fields are required')</script>";
                    }
                }

                ?>

            </div>
        </div>
    </div>
</div>
<?php include_once("include/footer.php") ?>