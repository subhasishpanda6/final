<?php $page = "blood_bank";
$path = __DIR__;
include_once("../include/header.php");
// calculatin age


function getAge($dob){
    $current_date = date("Y-m-d");
    $born_date = intval(date("d",strtotime($dob)));
    $born_month = intval(date("m",strtotime($dob)));
    $born_year = intval(date("Y",strtotime($dob)));
    $today_date = intval(date("d",strtotime($current_date)));
    $today_month = intval(date("m",strtotime($current_date)));
    $today_year = intval(date("Y",strtotime($current_date)));
    if($today_date >= $born_date && $today_month >= $born_month){
        return $today_year - $born_year;
    }
    return (($today_year - $born_year) - 1);
    
}

?>
<div class="content" >
    <div class="container-fluid" style="min-height: 80vh;">
        <!-- <div class="row"> -->
        <div class="row">
            <?php
            $get_donars = $conn->query("SELECT * FROM donar");
            if($get_donars->num_rows > 0){ 
                while($row_donar_data = $get_donars->fetch_object()){
                    $query_result = $conn->query("SELECT blood_group_name FROM blood_group WHERE blood_group_id = $row_donar_data->donar_blood_group_id");
                    $result = $query_result->fetch_object();
                ?>
              <div class="col-md-6 col-lg-3 col-xl-3">
                <div class="card widget-profile pat-widget-profile">
                    <div class="card-body">
                        <div class="pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="patient-profile.html" class="booking-doc-img">
                                    <img src="<?= $profile?>/no_profile.png" alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3><a href="patient-profile.html"><?= $row_donar_data->donar_name ?></a></h3>

                                    <div class="patient-details">
                                        <!-- <h5><b>Patient ID :</b> P0016</h5> -->
                                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> <?= ucfirst($row_donar_data->donar_location) ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="patient-info">
                            
                            <ul>
                                <li>Email <span><?= $row_donar_data->donar_email ?></span></li>
                                <li>Phone <span>+91 <?= $row_donar_data->donar_phone ?></span></li>
                                <li>Age <span><?= getAge($row_donar_data->donar_dob) ?> Years, <?= ucfirst($row_donar_data->donar_gender) ?></span></li>
                                <li>Pincode <span><?= $row_donar_data->donar_pincode ?></span></li>
                                <li>Address <span><address><?= $row_donar_data->donar_address ?></address></span></li>
                                <li >Blood Group <span class="text-primary"><strong><?= strtoupper($result->blood_group_name) ?></strong></span></li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                } 
        }else{
            ?>
            
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card widget-profile ">
                    <div class="card-body">
                        <div class="pro-widget-content" style="border:none">
                            <div class="profile-info-widget" style="min-height: 200px;display:flex;flex-direction:column;justify-content:center">
                               <div><em>No Result found</em></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- </div> -->
</div>
<?php include_once("../include/footer.php") ?>