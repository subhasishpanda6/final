<?php
session_start();
$page_title = "Manage Donation - Blood Bank";
// include the database
// require_once("db.php");
require_once("../blood_bank/private/initialization.php");
$user_id = $_SESSION['user_id'];
// we restricted visite the page without login
// if user is not logged in then, we will redirect to the login page
// if(empty($_SESSION['user_type']) && $_SESSION['user_type'] !== 'blood_bank' && empty($_SESSION['user_id'])){
//     header("location:./");
//     die;
// }
// to geting stock data
// echo date("d-m-Y");
// if("20-01-2023" === "20-01-2023"){echo "yes";}

// // echo "<pre>";
// // print_r($result->fetch_assoc());
// die;

require_once("../blood_bank/include/header.php");
require_once("../blood_bank/include/sidebar.php");

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

    <section class="section" style="min-height: 90vh;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">
                                Add Time Sloat
                            </button>
                            <h5 class="my-3"><strong>Schedule Timining</strong></h5>
                        </div>

                        <div class="sloats-container d-flex flex-wrap">
                            <?php
                            $get_time_sloat = $conn->query("SELECT bb_time_sloats FROM blood_bank_time_sloat WHERE bb_user_id = $user_id");
                            if ($get_time_sloat->num_rows > 0) {
                                $get_data = $get_time_sloat->fetch_assoc();
                                $rows = explode(",", $get_data['bb_time_sloats']);
                                // echo $rows;
                                foreach ($rows as $row) {
                            ?>
                                    <div class="time text-center">
                                        <label class="time-label">
                                            <input type="checkbox" class="booked_timing" value="<?= $row ?>"><span><?= $row ?></span>
                                        </label>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <em> No Time Sloats found</em>
                            <?php
                            }
                            ?>


                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ExtralargeModal" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Time Sloats</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="sloats-container d-flex flex-wrap">
                                <div class="time text-center">
                                    <label class="time-label">
                                        <input type="checkbox" name="time_sloat[]" value="7:00 - 7:59AM" class="timining"><span>7:00 - 7:59 AM</span>
                                    </label>
                                </div>

                                <div class="time text-center">
                                    <label class="time-label">
                                        <input type="checkbox" name="time_sloat[]" value="8:00 - 8:59AM" class="timining"><span>8:00 - 8:59 AM</span>
                                    </label>
                                </div>

                                <div class="time text-center">
                                    <label class="time-label">
                                        <input type="checkbox" name="time_sloat[]" value="9:00 - 9:59AM" class="timining"><span>9:00 - 9:59 AM</span>
                                    </label>
                                </div>

                                <div class="time text-center">
                                    <label class="time-label">
                                        <input type="checkbox" name="time_sloat[]" value="10:00 - 10:59AM" class="timining"><span>10:00 - 10:59 AM</span>
                                    </label>
                                </div>

                                <div class="time text-center">
                                    <label class="time-label">
                                        <input type="checkbox" name="time_sloat[]" value="11:00 - 11:59AM" class="timining"><span>11:00 - 11:59 AM</span>
                                    </label>
                                </div>

                                <div class="time text-center">
                                    <label class="time-label">
                                        <input type="checkbox" name="time_sloat[]" value="12:00 - 12:59AM" class="timining"><span>12:00 - 12:59 AM</span>
                                    </label>
                                </div>
                                <div class="time text-center">
                                    <label class="time-label">
                                        <input type="checkbox" name="time_sloat[]" value="1:00 - 1:59PM" class="timining"><span>1:00 - 1:59 PM</span>
                                    </label>
                                </div>
                                <div class="time text-center">
                                    <label class="time-label">
                                        <input type="checkbox" name="time_sloat[]" value="2:00 - 2:59PM" class="timining"><span>2:00 - 2:59 PM</span>
                                    </label>
                                </div>
                                <div class="time text-center">
                                    <label class="time-label">
                                        <input type="checkbox" name="time_sloat[]" value="11:00 - 12:00AM" class="timining"><span>11:00 - 12:00 AM</span>
                                    </label>
                                </div>
                                <div class="time text-center">
                                    <label class="time-label">
                                        <input type="checkbox" name="time_sloat[]" value="11:00 - 12:00AM" class="timining"><span>11:00 - 12:00 AM</span>
                                    </label>
                                </div>

                            </div>
                            <input type="submit" class="btn btn-primary mt-4" value="submit" name="add_time_sloat">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div><!-- End Extra Large Modal-->
        <?php
        if (isset($_POST['add_time_sloat'])) {
            if (!empty($_POST['time_sloat'])) {
                $time_sloats = implode(",", $_POST['time_sloat']);
                $has_time_sloat = $conn->query("SELECT bb_time_sloats FROM blood_bank_time_sloat WHERE bb_user_id = $user_id");
                if ($has_time_sloat->num_rows > 0) {
                    $get_current_time_sloats =  $has_time_sloat->fetch_assoc();
                    $final_time_sloat = implode(",", array($get_current_time_sloats['bb_time_sloats'], $time_sloats));
                    $modified_time_sloat = $time_sloat = $conn->query("UPDATE blood_bank_time_sloat SET bb_time_sloats = '$final_time_sloat' WHERE bb_user_id = $user_id");
                } else {
                    $time_sloat_inserted = $conn->query("INSERT INTO blood_bank_time_sloat SET bb_time_sloats = '$time_sloats',bb_user_id = $user_id");
                }
            } else {
                redirect("time_sloat.php");
            }
        }
        ?>

    </section>

</main><!-- End #main -->




<?php

require_once("../blood_bank/include/footer.php");

?>