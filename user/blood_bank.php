<?php $page="blood_bank";
$path = __DIR__;
include_once("include/header.php"); ?>
<!-- Breadcrumb -->
<!-- <div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Booking</h2>
            </div>
        </div>
    </div>
</div> -->
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content" style="min-height: 90vh;">
    
<div class="container">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div id="demo" class="carousel slide" data-ride="carousel">

                            <!-- Indicators -->
                            <ul class="carousel-indicators shms-slider">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                            </ul>

                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/img/blood_bank/_107317099_blooddonor976.jpg" alt="image\_107317099_blooddonor976.jpg" width="100%" height="500">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/img/blood_bank/Blood-facts_10-illustration-graphics__canteen.png" alt="image\Blood-facts_10-illustration-graphics__canteen.png" width="100%" height="500">
                                </div>

                            </div>

                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ++++++++++++++++++++++++++++++++++++++ -->
                <div class="bg-white py-4 px-2 blood-bank-intro-text">
                    <h3 class="text-center pb-3">Welcome to BloodBank</h3>
                    <div class="row blood-bank-text-content">
                        <div class="col-12 col-md-6 col-lg-4 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header" style="background-color:#15558d">
                                    <h5 class="card-title mb-0 text-light">The need for blood</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">There are many reasons patients need blood. A common misunderstanding about blood usage is that accident victims are the patients who use the most blood. Actually, people needing the most blood include those:
                                    <ol>
                                        <li>Being treated for cancer</li>
                                        <li>Undergoing orthopedic surgeries</li>
                                        <li>Undergoing cardiovascular surgeries</li>
                                        <li>Being treated for inherited blood disorders</li>
                                    </ol>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header" style="background-color:#15558d">
                                    <h5 class="card-title mb-0 text-light">Blood Tips</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        1) You must be in good health.<br>
                                        2) Hydrate and eat a healthy meal before your donation.<br>
                                        3) You’re never too old to donate blood.<br>
                                        4) Rest and relaxed.<br>
                                        5) Don’t forget your FREE post-donation snack.<br>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header" style="background-color:#15558d">
                                    <h5 class="card-title mb-0 text-light">Who you could Help</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        Every 2 seconds, someone in the World needs blood. Donating blood can help: 1) People who go through disasters or emergency situations.
                                        2) People who lose blood during major surgeries.
                                        3) People who have lost blood because of a gastrointestinal bleed.
                                        4) Women who have serious complications during pregnancy or childbirth.
                                        5) People with cancer or severe anemia sometimes caused by thalassemia or sickle cell disease.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ++++++++++++++++++++++++++++++++++++++ -->
               <div>
               <div class="row my-5 px-4 pt-4 pb-2 blood-bank-feature" style="background-color:white;margin:unset">

                            <?php 
                                if(isset($_SESSION['patient_id'])){
                                    $check_donar = $conn->query("SELECT * FROM donar WHERE register_id = {$_SESSION['patient_id']}");
                                    if($check_donar->num_rows <= 0){
                                        include_once("section/donar_registration.php");
                                    }
                                }else{
                                    include_once("section/donar_registration.php");
                                }
                            ?>
                            <div class="col-12 col-lg-3 col-md-4 col-sm-6 ">
                                <a href="blood-bank/view_donar.php" class="blood-bank-item"> Donars List</a>
                            </div>
                            <div class="col-12 col-lg-3 col-md-4 col-sm-6 ">
                                <a href="blood-bank/view_blood_bank.php?q=need_blood" class="blood-bank-item">Need Blood</a>
                            </div>
                            <div class="col-12 col-lg-3 col-md-4 col-sm-6 ">
                                <a href="blood-bank/blood_available.php" class="blood-bank-item">Blood Avalability</a>
                            </div>
                            <?php
                            if(isset($_SESSION['patient_id'])){
                            $get_donar_result = $conn->query("SELECT * FROM `donar` WHERE `register_id` = {$_SESSION['patient_id']}");
                            $donar_data = $get_donar_result->fetch_assoc();
                            if($conn->affected_rows > 0){
                            ?>
                            <div class="col-12 col-lg-3 col-md-4 col-sm-6 ">
                                <a href="blood-bank/view_blood_bank.php?q=donate" class="blood-bank-item">Donate Blood</a>
                            </div>
                            <?php }
                            }
                            ?>
                        </div>
               </div>
                <div class="p-4" style="background-color:white">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2>BLOOD GROUPS</h2>
                            <p>
                                Blood group of any human being will mainly fall in any one of the following groups.
                            </p>
                            <ul class="ml-5">
                                <li> A positive or A negative</li>
                                <li> B positive or B negative</li>
                                <li> O positive or O negative</li>
                                <li> AB positive or AB negative.</li>
                            </ul>
                            <p>
                                Your blood group is determined by the genes you inherit from your parents.
                                A healthy diet helps ensure a successful blood donation, and also makes you feel better
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <img class="img-fluid rounded" src="assets/img/blood_bank/blood_donationcover.jpeg" alt="">
                        </div>
                    </div>
                </div>
            </div>
          <!-- ***************************** -->
          

        </div>
    </div>
</div>
<!-- /Page Content -->

<?php include_once("include/footer.php"); ?>