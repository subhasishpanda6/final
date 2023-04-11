<?php $page = "blood_bank";
$path = __DIR__;
include_once("../include/header.php");
 $check_donar = $conn->query("SELECT * FROM donar WHERE register_id = {$_SESSION['patient_id']}");
 if($conn->affected_rows > 0){
    echo "<script>window.location.href='../blood_bank.php'</script>";
 }
?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="pb-4 text-center">Donar Registration</h2>
                        <!-- Checkout Form -->
                        <?php
                        $get_info = $conn->query("SELECT * FROM patient_registration WHERE id={$_SESSION['patient_id']}");
                        $row_data = $get_info->fetch_object();
                        ?>
                        <form action="" method="POST">

                            <!-- Personal Information -->
                            <div class="info-widget">
                                <h4 class="card-title">Personal Information</h4>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label> Name <span class="text-danger">*</span> </label>
                                            <input class="form-control" type="text" name="donar_name" value="<?= $row_data->name?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="donar_email" value="<?= $row_data->email?>"  readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="donar_phone" value="<?= $row_data->phone_no?>" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-12">
                                        <label for="">Gender <span class="text-danger">*</span></label>
                                        <label class="payment-radio credit-card-option">
                                            <input type="radio" name="gender" value="male" <?php if($row_data->gender === "male") echo "checked"; ?>>
                                            <span class="checkmark"></span>
                                            Male
                                         </label>
                                        <label class="payment-radio credit-card-option">
                                            <input type="radio" name="gender" value="female" <?php if($row_data->gender === "female") echo "checked"; ?>>
                                            <span class="checkmark"></span>
                                            Female
                                        </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>DOB <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date" name="donar_dob">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Location <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="donar_location" value="<?= $row_data->location ?>">
                                          
                                        </div>
                                    </div> -->
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Pincode <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="donar_pincode" value="<?= $row_data->pincode ?>">
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Blood Group <span class="text-danger">*</span></label>
                                            <select name="donar_blood_group" id="" class="form-control">
                                                <option value="">Select Blood Group</option>
                                                <?php $get_blood_group = $conn->query("SELECT * FROM blood_group");
                                                    
                                                    while($row = $get_blood_group->fetch_assoc()){
                                                ?>
                                                <option value="<?= $row['blood_group_id']?>"><?= $row['blood_group_name']?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group card-label">
                                            <label>Address <span class="text-danger">*</span></label>
                                           <textarea name="donar_address" class="form-control" id="" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section mt-4">
                                    <button type="submit" class="btn btn-primary submit-btn" name="register">Register</button>
                                </div>
                            </div>
                            <!-- /Personal Information -->

                        </form>
                        <!-- /Checkout Form -->

                    </div>
                </div>
                <?php
                if(isset($_POST['register'])){
                    if(!empty($_POST['donar_name']) &&  !empty($_POST['gender']) && !empty($_POST['donar_dob'])  && !empty($_POST['donar_pincode']) && !empty($_POST['donar_blood_group']) && !empty($_POST['donar_address'])){
                        // $blood_group = $conn->query("SELECT blood_group_name FROM blood_group WHERE blood_group_id = {$_POST['donar_blood_group']}");
                        // $blood_gr_name = $blood_group->fetch_object()->blood_group_name;
                        $register_donar = $conn->prepare("INSERT INTO donar SET register_id = ?, donar_name = ?,donar_email=?,donar_gender=?,donar_dob=?,donar_phone=?,donar_pincode=?,donar_address=?,donar_blood_group_id=?");
                        $register_donar->bind_param("isssssssi",$_SESSION['patient_id'],$_POST['donar_name'],$_POST['donar_email'],$_POST['gender'],$_POST['donar_dob'],$_POST['donar_phone'],$_POST['donar_pincode'],$_POST['donar_address'],$_POST['donar_blood_group']);
                        if($register_donar->execute()){
                            echo "<script>success('success')</script>";
                        }else{
                            echo "<script>error('failed to insert')</script>";
                        }
                       
                    }else{
                        echo "<script>error('All Fields are Required')</script>";
                    }
                }

                ?>

            </div>
        </div>
    </div>
</div>
<?php include_once("../include/footer.php") ?>