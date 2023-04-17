<?php
$page_title = "Donar";
$active_page = "donar";
require_once("../blood_bank/include/header.php");
require_once("../blood_bank/include/sidebar.php");
// ****************************
$user_id = $_SESSION['user_id'];
// get page number
$page_number = 1;
if (isset($_GET['page'])) {
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
                            <h5 class="card-title">Donar Lists</h5>
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
                                        <th scope="col">Donar Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Blood Group</th>
                                        <th scope="col">Action</th>
                                        <!-- <th scope="col">Start Date</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $donar_data = getPaginationResults([
                                        'conn' => $conn,
                                        'table' => 'donar',
                                        'join' => [
                                            'type' => "INNER JOIN",
                                            'table' => 'blood_group',
                                            'on' => ['donar_blood_group_id', 'blood_group_id'],
                                        ],
                                        'order_by' => [
                                            'order' => "DESC",
                                            'col' => 'donar_id'
                                        ],

                                        'pagination' => [
                                            'limit' => 3,
                                            'page_number' => $page_number,
                                        ]
                                    ]);
                       
                                    if (count($donar_data['results'])) {

                                        foreach ($donar_data['results'] as $donar_row) {

                                    ?>
                                            <tr class="text-center">

                                                <td>#<?= $donar_row['donar_id'] ?></td>
                                                <td><?= $donar_row['donar_name'] ?></td>
                                                <td><?= $donar_row['donar_email'] ?></td>
                                                <td><?= $donar_row['donar_gender']; ?>
                                                <td><?= $donar_row['donar_phone']; ?>
                                                <td><?= $donar_row['blood_group_name']; ?>
                                                </td>
                                                <td>
                                                    <a href="donar_profile.php?id=<?php echo "{$donar_row['donar_id']}" ?>" class="btn btn-success btn-sm">view</a>
                                                </td>
                                                <!-- <td>2011-04-19</td> -->

                                            </tr>
                                        <?php

                                        }
                                    } else {
                                        ?>
                                        <tr class="bg-light">
                                            <td colspan="4" class="text-center">Not found</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End small tables -->



                        <!-- Pagination with icons -->
                        <div class="mt-4">
                            <?php 
                            $param = [
                                'page'=>'page',
                                'page_number' => $page_number,
                                'total_page'=> $donar_data['total_pages']
                            ];
                            page($param);
                            ?>
                            <!-- <nav aria-label="Page navigation example ">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav> -->
                        </div>
                        <!-- End Pagination with icons -->

                    </div>
                </div>
            </div>
        </div>
        <!-- start stock Modal-->

        <!-- End stock Modal-->
    </section>

</main><!-- End #main -->

<?php
require_once("../blood_bank/include/footer.php");
?>