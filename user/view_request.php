<?php $page = "blood_bank_dashboard";
$path = __DIR__;
include_once("include/header.php");
$patient_id = $_SESSION['patient_id'];
if (!isset($_SESSION['patient_name'])) {
    echo "<script>window.location.href = './'</script>";
}
$row1 = mysqli_query($conn, "select * from patient_registration where id='$patient_id' ");
$row2 = mysqli_fetch_assoc($row1);

$row4 = $conn->query("SELECT * FROM donar WHERE register_id ='$patient_id' ");
$row5 = $row4->fetch_assoc();
$donar_id = null;
if ($conn->affected_rows > 0) {
    $donar_id = $row5['donar_id'];
}
// echo "<pre>";
// print_r($conn);
// die;

?>
<!-- /Header -->

<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h2 class="breadcrumb-title">Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<div class="content" >
    <div class="container-fluid" >

        <div class="row">

            <!-- Profile Sidebar -->
            <?php include_once("include/profile_sidebar.php") ?>
            <!-- / Profile Sidebar -->

            <div class="col-md-7 col-lg-8 col-xl-9" style="background:#fff;">
                <div class="card">
                    <div class="card-body pt-0">



                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include_once("include/footer.php") ?>