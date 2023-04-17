<?php
$page_title = "Profile - Blood Bank";
 $active_page ="profile";
require_once("../blood_bank/include/header.php");
require_once("../blood_bank/include/sidebar.php");
// ********************************************************************
$result = $conn->query("SELECT * FROM blood_bank_registration WHERE blood_bank_id = {$_SESSION['user_id']}");
$data = $result->fetch_assoc();
?>
<!--  -->

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

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Profile</h5>
                        <!-- this form is for upload profile -->
                        <form class="row g-3" action="profile.php" method="POST" enctype="multipart/form-data">
                            <div class="col-12 d-flex gap-4 align-items-center">
                                <div style="width: 200px;height:200px;overflow:hidden;border-radius:50%">
                                    <img src="<?= "upload/{$data['img']}";?>" alt="Profile" class="" name="profile_pic"
                                        style="width:200px;height:200px;border-radius:50%;object-fit:cover;object-position:center">
                                </div>
                                <div class="d-flex flex-column gap-3">
                                    <label class="btn btn-primary d-inline-block mt-2">Upload
                                        Profile
                                        <input type="file" style="display: none;" name="profile_pic">
                                    </label>
                                    <button type="submit" name="profile" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        <!-- end -->
                        <!-- for basic detail -->
                        <form class="row g-3 pt-5">
                            <h5 class="card-title">Information</h5>
                            <div class="col-6">
                                <label for="inputNanme4" class="form-label">Blood Bank Name</label>
                                <input type="text" class="form-control" id="inputNanme4"
                                    value="<?= "{$data['blood_bank_name']}" ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4"
                                    value="<?= "{$data['email']}" ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="inputCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="inputCity" value="<?= "{$data['city']}" ?>"
                                    disabled>
                            </div>
                            <div class="col-6">
                                <label for="inputPhone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="inputPassword4"
                                    value="<?= "{$data['phone']}" ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="inputPincode" class="form-label">Pincode</label>
                                <input type="text" class="form-control" id="inputPincode"
                                    value="<?= "{$data['pincode']}" ?>" disabled>
                            </div>

                            <div class="col-6">
                                <label for="inputJoinin" class="form-label">Joinin Date</label>
                                <input type="text" class="form-control" id="inputJoinin" placeholder="1234 Main St"
                                    value="<?= "{$data['joining_date']}" ?>" disabled>

                            </div>
                            <div class="col-6">
                                <label for="inputAddress" class="form-label">Address</label>
                                <textarea type="text" class="form-control" id="inputAddress" rows="5"
                                    disabled><?= "{$data['address']}" ?></textarea>
                            </div>
                        </form>
                        <!-- UPDATE PHONE FORM -->
                        <form class="row g-3 pt-5" action="profile.php" method="POST">
                            <h5 class="card-title">Update Phone No</h5>
                            <div class="col-6">
                                <label for="inputPhone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="inputPassword4" name="phone"
                                    pattern="[0-9]{10}" title="Enter 10 digit modbile no">
                                <button type="submit" name="change_ph" class="btn btn-primary mt-3">Save
                                    Changes</button>
                            </div>
                        </form>
                        <!-- CHANGE PASSWORD FORM -->
                        <form class="row g-3 pt-5" action="profile.php" method="POST">
                            <h5 class="card-title">Change Password</h5>
                            <div class="col-6">
                                <label for="inputPhone" class="form-label">Change Password</label>
                                <input type="text" class="form-control" id="inputPassword4" name="password">
                                <button type="submit" name="change_pass" class="btn btn-primary mt-3">Save
                                    Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php
require_once("../blood_bank/include/footer.php");

?>