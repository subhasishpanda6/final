<?php
$page_title = "Manage Donation - Blood Bank";
$active_page= "manage_donate";
require_once("../blood_bank/include/header.php");
require_once("../blood_bank/include/sidebar.php");
// **********************************
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
                                    <th scope="col">Request Status</th>
                                    <th scope="col">Donation Status</th>
                                    <th scope="col">Action</th>
                                    <!-- <th scope="col">Start Date</th> -->
                                </tr>
                            </thead>
                                <?php
                                $param = [
                                    'conn' =>$conn,
                                    'table' => 'blood_donate',
                                    'join' => [
                                        [
                                            'type'=> 'INNER JOIN',
                                            'table' => 'donar',
                                            'on'=> ['donar_id','donar_id']
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
                                    'where' => "blood_donate.status != 'pending' AND blood_donate.blood_bank = {$user_id} ",
                                    'order_by' => [
                                        'col' => 'donate_id',
                                        'order'=> 'DESC'
                                    ]
                                ];
                                $donation = getPaginationResults($param);
                                        if(count($donation['results'])){
                                     ?>
                                     
                            <tbody>
                            <?php  
                                        foreach($donation['results'] as $donation_row){
                                           
                                    ?>
                                <tr class="text-center">
                                    <td scope="row"><?= $donation_row['donate_id'] ?></td>
                                    <td><?= $donation_row['donar_name'] ?></td>
                                    <td><?= $donation_row['blood_group_name'] ?></td>
                                    <td><?= $donation_row['no_of_unit'] ?></td>
                                    <td><?php if(empty($donation_row['status'])){echo "<span class='badge rounded-pill bg-dark'>no action</span>";}else if($donation_row['status'] === 'accept'){ echo "<span class='badge bg-success'>{$donation_row['status']}</span>";}else if($donation_row['status'] === 'reject'){echo "<span class='badge bg-danger'>{$donation_row['status']}</span>";}else if($donation_row['status'] === 'cancel'){ echo "<span class='badge bg-secondary'>{$donation_row['status']}</span>";}?>
                                    </td>
                                    <td><span class="badge rounded-pill bg-dark"><?= $donation_row['donation_status'] ?></span></td>
                                    <td>
                                        <a href="view_request.php?id=<?php echo "{$donation_row['donate_id']}"?>"
                                            class="btn btn-primary btn-sm" title="view donation"><i
                                                class="bi bi-eye"></i></a>
                                    </td>


                                </tr>
                                <?php
                                        }
                                ?>
                                
                            </tbody>
                        <?php 
                                }else{
                             
                             echo "<td colspan='7'><p class='text-center'>No Record found</p></td>";
                        
                             }
                             ?>
                        </table>
                                   
                        
                        </div>
                        <?php 
                            $param = [
                                'page'=>'page',
                                'page_number' => $page_number,
                                'total_page'=>  $donation['total_pages']
                            ];
                            page($param);
                            ?>
                        <!-- End small tables -->
                    </div>
                </div>
            </div>
        </div>

    </section>

</main><!-- End #main -->
<?php 

    require_once("../blood_bank/include/footer.php");
       
    ?>