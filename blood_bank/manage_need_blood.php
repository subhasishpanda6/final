<?php
$page_title = "Manage Donation - Blood Bank";
$active_page= "manage_need_blood";
require_once("../blood_bank/include/header.php");
require_once("../blood_bank/include/sidebar.php");
// ******************
$user_id = $_SESSION['user_id'];
$page_number = 1;
if(isset($_GET['page'])){
    $page_number = $_GET['page'];
}
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

    <section class="section" style="min-height: 63vh;">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-sm-between align-items-center">
                            <h5 class="card-title">All Donation List</h5>
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#add_stock">
                                    Add stock
                                </button> -->
                            
                        </div>
                        <!-- Small tables -->
                        <div class="table-responsive">
                        <table class="table table-hover" style="cursor:pointer;">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Blood Group</th>
                                    <th scope="col">Unit(in ml)</th>
                                    <th scope="col">Donate Status</th>
                                    <th scope="col">Action</th>
                                    <!-- <th scope="col">Start Date</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $param = [
                                    'conn' =>$conn,
                                    'table' => 'need_blood',
                                    'join' => [
                                        [
                                            'type'=> 'INNER JOIN',
                                            'table' => 'patient_registration',
                                            'on'=> ['patient_id','id']
                                        ],
                                        [
                                            'type'=> 'INNER JOIN',
                                            'table' => 'blood_group',
                                            'on'=> ['blood_group','blood_group_id']
                                        ]
                                    ],
                                    'pagination' => [
                                        'limit' => 2,
                                        'page_number' => $page_number
                                    ],
                                    'where' => "need_blood.request_status != 'pending' AND need_blood.request_status != 'Pending' AND need_blood.blood_bank = {$user_id}",
                                    'order_by' => [
                                        'col' => 'request_id',
                                        'order'=> 'DESC'
                                    ]
                                ];
                                $need_blood_res = getPaginationResults($param);
                               
                                if(count( $need_blood_res['results'])){
                                
                                foreach($need_blood_res['results'] as $need_blood_row){
                                           
                                           
                                    ?>
                                <tr class="text-center">
                                    <td scope="row"><?= $need_blood_row['request_id'] ?></td>
                                    <td><?= $need_blood_row['name'] ?></td>
                                    <td><?= $need_blood_row['name'] ?></td>
                                    <td><?= $need_blood_row['blood_group_name'] ?></td>
                                    <td><?php if(empty($need_blood_row['request_status'])){echo "<span class='badge rounded-pill bg-dark'>no action</span>";}else if($need_blood_row['request_status'] === 'accept'){ echo "<span class='badge bg-success'>{$need_blood_row['request_status']}</span>";}else if($need_blood_row['request_status'] === 'reject'){echo "<span class='badge bg-danger'>{$need_blood_row['request_status']}</span>";}else if($need_blood_row['request_status'] === 'cancel'){ echo "<span class='badge bg-secondary'>{$need_blood_row['request_status']}</span>";}?>
                                    </td>
                                    <td>
                                        <a href="view_need_blood.php?id=<?php echo "{$need_blood_row['request_id']}"?>"
                                            class="btn btn-primary btn-sm" title="view donation"><i
                                                class="bi bi-eye"></i></a>
                                    </td>


                                </tr>
                                <?php
                                 
                                        }
                                       
                                    }else{
                                       ?>
                                <tr class="bg-light">
                                    <td colspan="6" class="text-center">No Record found</td>
                                </tr>
                                <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                        </div>
                        <!-- End small tables -->
                        <?php 
                            $param = [
                                'page'=>'page',
                                'page_number' => $page_number,
                                'total_page'=>  $need_blood_res['total_pages']
                            ];
                            page($param);
                            ?>
                    </div>
                </div>
            </div>
        </div>

    </section>

</main><!-- End #main -->
<?php 

    require_once("../blood_bank/include/footer.php");
       
    ?>